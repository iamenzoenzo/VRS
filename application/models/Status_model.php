<?php
	class Status_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_status($id){
			if(isset($id)){
        $query=$this->db->get_where('status', array('Id' => $id));
        return $query->row_array();
      }else {
        $query = $this->db->get('status');
  			return $query->result_array();
      }
		}

		public function create_status(){
			$data = array(
				'label' => $this->input->post('label'),
				'Is_Active' => 1

			);
			return $this->db->insert('status', $data);
		}

    public function update_status(){
      $data = array(
				'label' => $this->input->post('label'),
				'Is_Active' => (($this->input->post('is_active_checkbox')=='on') ? 1 : 0)
      );

      $this->db->where('Id', $this->input->post('id'));
      return $this->db->update('status', $data);
    }

		public function delete_status($id){
			$this->db->where('id', $id);
			$this->db->delete('status');
			return true;
		}
	}
