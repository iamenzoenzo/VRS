<?php
	class Client_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_clients($id){
			if(isset($id)){
        $query=$this->db->get_where('clients', array('Id' => $id));
        return $query->row_array();
      }else {
        $query = $this->db->get('clients');
  			return $query->result_array();
      }
		}

		public function create_client($filesdata){
			$data = array(
				'name' => $this->input->post('name'),
        'email_address' => $this->input->post('email'),
        'contact_number' => $this->input->post('contact_number'),
        'address' => $this->input->post('address'),
        'address' => $this->input->post('address'),
        'government_id_1_path' => '',
        'government_id_2_path' => '',
        'attachment_1_path' => '',
        'attachment_2_path' => '',
				'Is_Active' => 1
			);
			$this->db->insert('clients', $data);
			$id=$this->db->insert_id();
			$this->UserImage_model->create_client_photos($id,$filesdata);
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
			$userImages=$this->UserImage_model->get_images(null,$id);
			foreach ($userImages as $key) {
				$path_to_file = './assets/images/client_images/'.$key['file_name'];
				if(unlink($path_to_file)) {
				     $this->UserImage_model->delete_client_photo($key['Id']);
				}
			}
			$this->db->where('id', $id);
			$this->db->delete('clients');
			return true;
		}
	}
