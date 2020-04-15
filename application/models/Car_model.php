<?php
	class Car_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_cars($id){
			if(isset($id)){
				$this->db->order_by('name');
				$query=$this->db->get_where('cars', array('Id' => $id));
				return $query->row_array();
			}else {
				$this->db->order_by('name');
				$query = $this->db->get('cars');
				return $query->result_array();
			}
		}

		public function get_distinct_cars(){
			$this->db->join('images', 'cars.image_id = images.id', 'left');
			$this->db->order_by('name');
			$this->db->group_by(array("cars.model", "cars.manufacturer"));
			$query = $this->db->get('cars');
			return $query->result_array();
		}

		public function create_car($car_image){
			$data = array(
				'name' => $this->input->post('car-name'),
        'code_name' => $this->input->post('car-code-name'),
				'model' => $this->input->post('car-model-name'),
        'manufacturer' => $this->input->post('car-manufacturer'),
        'year' => $this->input->post('car-model-year'),
        'plate_number' => $this->input->post('car-plate-number'),
        'RentPerDay' => $this->input->post('car-rent-per-day'),
        'Capacity' => $this->input->post('car-capacity'),
				'car_image_path' => $car_image,
				'Is_Active' => 1

			);

			return $this->db->insert('cars', $data);
		}

		public function update_car(){
			$data = array(
				'name' => $this->input->post('car-name'),
				'code_name' => $this->input->post('car-code-name'),
				'model' => $this->input->post('car-model-name'),
				'manufacturer' => $this->input->post('car-manufacturer'),
				'year' => $this->input->post('car-model-year'),
				'plate_number' => $this->input->post('car-plate-number'),
				'RentPerDay' => $this->input->post('car-rent-per-day'),
				'Capacity' => $this->input->post('car-capacity'),
				//'car_image_path' => $car_image,
				'Is_Active' => 1
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('cars', $data);
		}

		public function get_category($id){
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row();
		}

		public function delete_category($id){
			$this->db->where('id', $id);
			$this->db->delete('categories');
			return true;
		}
	}
