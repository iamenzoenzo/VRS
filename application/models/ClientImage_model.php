<?php
	class ClientImage_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_images($id,$clientid){
			if(isset($id) && !isset($clientid)){
        $query=$this->db->get_where('clientsphotos', array('Id' => $id));
        return $query->row_array();
      }else if(!isset($id)&&isset($clientid)){
        $query=$this->db->get_where('clientsphotos', array('client_id'=>$clientid));
  			return $query->result_array();
      }else if(isset($id)&&isset($clientid)){
        $query=$this->db->get_where('clientsphotos', array('Id' => $id,'client_id'=>$clientid));
  			return $query->result_array();
      }
		}

    public function create_client_photos($ClientId,$filesdata){
			foreach ($filesdata as $fd) {
				$data = array(
					'client_id' => $ClientId,
					'file_name' => $fd,
					'Is_Active' => 1
				);
				$this->db->insert('clientsphotos', $data);
			}
		}

		public function delete_client_photo($id){
			$clientImage = $this->ClientImage_model->get_images($id,null);
			$path_to_file = './assets/images/client_images/'.$clientImage['file_name'];
			$this->db->where('Id', $id);
			$this->db->delete('clientsphotos');
			$affectedRows=$this->db->affected_rows();
			if($affectedRows>0){
				$this->File_model->dete_photo_from_directory($path_to_file);
				return true;
			}else {
				return false;
			}
		}
	}
