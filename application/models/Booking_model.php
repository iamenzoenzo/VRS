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
				$this->db->order_by("clientbookings.BookingId", "asc");
        $query=$this->db->get_where('clientbookings', array('clientbookings.BookingId' => $id));
        return $query->row_array();
      }else {
				$this->db->join('status a', 'a.Id=clientbookings.statusId', 'inner');
				$this->db->join('cars b', 'b.Id=clientbookings.carId', 'inner');
				$this->db->join('clients c', 'c.Id=clientbookings.clientId', 'inner');
				$this->db->order_by("clientbookings.BookingId", "asc");
				$query=$this->db->get_where('clientbookings', array('start_date >= '=>'2020-04-01'));
  			return $query->result_array();
      }
		}

		public function create_booking($filesdata){
			$timestamp=time();
			$carid = $this->input->post('carId');
			$Date = $this->input->post('start_date');
			$startDate = date("Y-m-d", strtotime($Date));
			$NumberOfDays = $this->input->post('number_of_days');
			$remarks = $this->input->post('remarks');
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
				'created_by' => $this->session->userdata('user_id'),
				'reference_number' => 'VRS-'.date('ym',$timestamp).$this->generateRandomString(5),
        'statusId' => 1
			);
			$this->db->insert('clientbookings', $data);
			$BookingId=$this->db->insert_id();
			$this->BookingImage_model->create_booking_photos($BookingId,$filesdata);
			$this->BookingLogs_model->create_log($BookingId,'Created this booking',$this->session->userdata('user_id'));
			if(!empty($remarks)){
				$this->BookingLogs_model->create_log($BookingId,$remarks,$this->session->userdata('user_id'));
			}

			if(!empty($this->input->post('discount'))){
				$this->BookingLogs_model->create_log($BookingId,'applied a discount amount of '.$this->input->post('discount'),$this->session->userdata('user_id'));
			}

			if(!empty($this->input->post('downpayment'))){
				$this->BookingPayments_model->create_payment($BookingId,$this->input->post('downpayment'),$this->input->post('remarks'),$this->session->userdata('user_id'),'');
			}

			return $BookingId;
		}

    public function update_booking(){

			$startDate = $this->input->post('start_date');
			$BookingId = $this->input->post('bookingid');

      $data = array(
        //'carId' => $startDate,
        //'start_date' => $this->input->post('start_date'),
				//'end_date' => date('Y-m-d', strtotime($startDate. ' + '.$NumberOfDays.' days')),
        //'number_of_days' => $NumberOfDays,
				'add_driver' => (($this->input->post('add_driver')=='on') ? 1 : 0),
				'driver_name' => $this->input->post('driver_name'),
				//'rental_discount' => $this->input->post('discount'),
        'statusId' => $this->input->post('status_id')
      );

      $this->db->where('BookingId', $BookingId);
			$this->db->update('clientbookings', $data);
			$this->BookingLogs_model->create_log($BookingId,'updated this booking',$this->session->userdata('user_id'));
      return true;
    }

		public function delete_booking($id){
			$images=$this->BookingImage_model->get_images(null,$id);
			foreach ($images as $key) {
				$path_to_file = './assets/images/client_bookings_images/'.$key['file_name'];
				$this->File_model->delete_photo_from_directory($path_to_file);
				if(unlink($path_to_file)) {
				     $this->BookingImage_model->delete_booking_photo($key['Id']);
				}
			}
			$this->db->where('bookingid', $id);
			$this->db->delete('clientbookings');
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
