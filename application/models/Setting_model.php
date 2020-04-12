<?php
	class Setting_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_cars(){
      $this->db->join('images', 'cars.image_id = images.id', 'left');
			$this->db->order_by('name');
			$query = $this->db->get('cars');
			return $query->result_array();
		}

		public function create_setting(){
			$data = array(
				'name' => $this->input->post('name'),
        'value' => $this->input->post('value'),
				'Is_Active' => 1

			);
			return $this->db->insert('settings', $data);
		}

    public function update_setting(){
      $data = array(
        'name' => $this->input->post('name'),
        'value' => $this->input->post('value'),
        'Is_Active' => (($this->input->post('is_active_checkbox')=='on') ? 1 : 0)
      );

      $this->db->where('id', $this->input->post('id'));
      return $this->db->update('settings', $data);
    }

		public function get_settings($id){
      if(isset($id)){
        $query=$this->db->get_where('settings', array('id' => $id));
        return $query->row_array();
      }else {
        $query = $this->db->get('settings');
  			return $query->result_array();
      }

		}

		public function delete_setting($id){
			$this->db->where('id', $id);
			$this->db->delete('settings');
			return true;
		}
	}
