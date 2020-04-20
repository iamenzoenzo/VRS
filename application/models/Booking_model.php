<?php
	class Booking_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_bookings($id){
			if(isset($id)){
				$this->db->join('status a', 'a.Id=clientbookings.statusId', 'inner');
				$this->db->join('cars b', 'b.Id=clientbookings.carId', 'inner');
				$this->db->join('clients c', 'c.Id=clientbookings.clientId', 'inner');
        $query=$this->db->get_where('clientbookings', array('clientbookings.BookingId' => $id));
        return $query->row_array();
      }else {
				$this->db->join('status a', 'a.Id=clientbookings.statusId', 'inner');
				$this->db->join('cars b', 'b.Id=clientbookings.carId', 'inner');
				$this->db->join('clients c', 'c.Id=clientbookings.clientId', 'inner');
				$query=$this->db->get_where('clientbookings', array('start_date >= '=>'2020-04-01'));
  			return $query->result_array();
      }
		}

		public function create_booking($filesdata){
			$timestamp=time();
			$carid = $this->input->post('carId');
			$startDate = $this->input->post('start_date');
			$NumberOfDays = $this->input->post('number_of_days');
			$selectedCar = $this->Car_model->get_cars($carid);
			$driverFee = $this->Setting_model->get_settings(null,'Driver_Per_Day');
			$data = array(
				'clientId' => $this->input->post('clientId'),
        'carId' => $carid,
        'start_date' => $startDate,
				'end_date' => date('Y-m-d', strtotime($startDate. ' + '.$NumberOfDays.' days')),
        'number_of_days' => $NumberOfDays,
				'add_driver' => (($this->input->post('add_driver')=='on') ? 1 : 0),
				'driver_name' => $this->input->post('driver_name'),
				'driver_fee_current' => $driverFee['value'],
				'rental_fee_current' => $selectedCar['RentPerDay'],
				'rental_discount' => $this->input->post('discount'),
				'reference_number' => 'VRS-'.date('ym',$timestamp).$this->generateRandomString(5),
        'statusId' => 1
			);
			$this->db->insert('clientbookings', $data);
			$BookingId=$this->db->insert_id();
			$this->BookingImage_model->create_booking_photos($BookingId,$filesdata);
			$this->BookingLogs_model->create_log($BookingId,'added this booking',$this->session->userdata('user_id'));
			return true;
		}

    public function update_status(){
      $data = array(
				'label' => $this->input->post('label'),
				'Is_Active' => (($this->input->post('is_active_checkbox')=='on') ? 1 : 0)
      );

      $this->db->where('Id', $this->input->post('id'));
      return $this->db->update('status', $data);
    }

		public function delete_client($id){
			$userImages=$this->ClientImage_model->get_images(null,$id);
			foreach ($userImages as $key) {
				$path_to_file = './assets/images/client_images/'.$key['file_name'];
				$this->File_model->delete_photo_from_directory($path_to_file);
				if(unlink($path_to_file)) {
				     $this->ClientImage_model->delete_client_photo($key['Id']);
				}
			}
			$this->db->where('id', $id);
			$this->db->delete('clients');
			return true;
		}

		function generateRandomString($length = 5) {
    $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	}
