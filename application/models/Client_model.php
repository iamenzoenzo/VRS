<?php
	class Client_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_clients($id){
			if(isset($id)){
				$this->db->order_by('name');
        $query=$this->db->get_where('clients', array('Id' => $id));
        return $query->row_array();
      }else {
				$this->db->order_by('name');
				$query=$this->db->get_where('clients', array('name LIKE '=>'%'.$this->input->post('name_filter').'%'));
  			return $query->result_array();
      }
		}

		public function create_client($filesdata){
			$data = array(
				'name' => $this->input->post('name'),
        'email_address' => $this->input->post('email'),
        'contact_number' => $this->input->post('contact_number'),
        'address' => $this->input->post('address'),
				'Is_Active' => 1
			);
			$this->db->insert('clients', $data);
			$id=$this->db->insert_id();
			$this->ClientImage_model->create_client_photos($id,$filesdata);
			return true;
		}

    public function update_client($filesdata){
      $data = array(
				'name' => $this->input->post('name'),
        'email_address' => $this->input->post('email'),
        'contact_number' => $this->input->post('contact_number'),
        'address' => $this->input->post('address')
      );

      $this->db->where('Id', $this->input->post('id'));
      $this->db->update('clients', $data);
			$this->ClientImage_model->create_client_photos($this->input->post('id'),$filesdata);
			return $this->input->post('id');
    }

		public function delete_client($id){
			$userImages=$this->ClientImage_model->get_images(null,$id);
			foreach ($userImages as $key) {
				$path_to_file = './assets/images/client_images/'.$key['file_name'];
				$this->File_model->delete_photo_from_directory($path_to_file);
				if(unlink($path_to_file)) {
					if($key['file_name']!='noimage'){
						$this->ClientImage_model->delete_client_photo($key['Id']);
					}
				}
			}
			$this->db->where('id', $id);
			$this->db->delete('clients');
			return true;
		}
	}
