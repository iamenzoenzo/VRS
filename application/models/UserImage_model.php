<?php
	class UserImage_model extends CI_Model{
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
			$this->db->where('Id', $id);
			$this->db->delete('clientsphotos');
			return true;
		}
	}
