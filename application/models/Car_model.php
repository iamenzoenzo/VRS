<?php
	class Car_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_cars($id){
			if(isset($id)){
				$this->db->order_by('car_description');
				$query=$this->db->get_where('cars', array('Id' => $id));
				return $query->row_array();
			}else {
				$this->db->order_by('car_description');
				$query = $this->db->get('cars');
				return $query->result_array();
			}
		}

		public function get_available_cars_on_date($start_date,$end_date,$BookingId=0){
			//$this->db->order_by('name');
			$this->db->where('Is_Active',1);
			if($BookingId!=0){
				$where = "cars.id NOT IN (SELECT DISTINCT clientbookings.carId from clientbookings WHERE ((clientbookings.start_date BETWEEN '".$start_date."' AND '".$end_date."') OR (clientbookings.end_date BETWEEN '".$start_date."' AND '".$end_date."')) AND clientbookings.BookingId<>".$BookingId.")";
			}else{
				$where = "cars.id NOT IN (SELECT DISTINCT clientbookings.carId from clientbookings WHERE (clientbookings.start_date BETWEEN '".$start_date."' AND '".$end_date."') OR (clientbookings.end_date BETWEEN '".$start_date."' AND '".$end_date."'))";
			}
			$this->db->where($where);
			$query=$this->db->get('cars');
			return $query->result_array();
		}

		public function get_distinct_cars(){
			$this->db->order_by('car_description');
			$this->db->group_by(array("cars.model", "cars.manufacturer"));
			$query = $this->db->get('cars');
			return $query->result_array();
		}

		public function create_car($car_image){
			$data = array(
				'car_description' => $this->input->post('car-name'),
        'code_name' => $this->input->post('car-code-name'),
				'model' => $this->input->post('car-model-name'),
        'manufacturer' => $this->input->post('car-manufacturer'),
        'year' => $this->input->post('car-model-year'),
        'plate_number' => $this->input->post('car-plate-number'),
        'RentPerDay' => $this->input->post('car-rent-per-day'),
        'Capacity' => $this->input->post('car-capacity'),
				'file_name' => $car_image,
				'Is_Active' => 1

			);

			return $this->db->insert('cars', $data);
		}

		public function update_car($car_image){
			$data = array(
				'car_description' => $this->input->post('car-name'),
				'code_name' => $this->input->post('car-code-name'),
				'model' => $this->input->post('car-model-name'),
				'manufacturer' => $this->input->post('car-manufacturer'),
				'year' => $this->input->post('car-model-year'),
				'plate_number' => $this->input->post('car-plate-number'),
				'RentPerDay' => $this->input->post('car-rent-per-day'),
				'Capacity' => $this->input->post('car-capacity'),
				'file_name' => (!empty($car_image)?$car_image:$this->input->post('old_file_name')),
				'Is_Active' => 1
			);

			if(!empty($car_image)){
				$path_to_file = './assets/images/cars_images/'.$this->input->post('old_file_name');
				unlink($path_to_file);
			}

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('cars', $data);
		}

		public function get_category($id){
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row();
		}

		public function delete_car($id){
			$car = $this->Car_model->get_cars($id);
			$this->db->where('id', $id);
			$this->db->delete('cars');
			$rowsAffected = $this->db->affected_rows();
			$path_to_file="./assets/images/cars_images/".$car['file_name'];
			if($rowsAffected>0){
				if($car['file_name']!='noimage.jpg'){
					$this->File_model->delete_photo_from_directory($path_to_file);
				}

			}
			return true;
		}
	}
