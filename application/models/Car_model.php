<?php
	class Car_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_cars(){
      $this->db->join('images', 'cars.image_id = images.id', 'left');
			$this->db->order_by('name');
			$query = $this->db->get('cars');
			return $query->result_array();
		}

		public function create_car(){
			$data = array(
				'name' => $this->input->post('car-name'),
        'code_name' => $this->input->post('car-code-name'),
				'model' => $this->input->post('car-model-name'),
        'manufacturer' => $this->input->post('car-manufacturer'),
        'year' => $this->input->post('car-model-year'),
        'plate_number' => $this->input->post('car-plate-number'),
        'RentPerDay' => $this->input->post('car-rent-per-day'),
        'Capacity' => $this->input->post('car-capacity')
        //'code_name' => $this->input->post('car-photo')
			);

			return $this->db->insert('cars', $data);
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
