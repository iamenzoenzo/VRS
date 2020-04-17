<?php
	class BookingImage_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_images($id,$bookingid){
			if(isset($id) && !isset($bookingid)){
        $query=$this->db->get_where('clientbookingsphotos', array('Id' => $id));
        return $query->row_array();
      }else if(!isset($id)&&isset($bookingid)){
        $query=$this->db->get_where('clientbookingsphotos', array('booking_id'=>$bookingid));
  			return $query->result_array();
      }else if(isset($id)&&isset($bookingid)){
        $query=$this->db->get_where('clientbookingsphotos', array('Id' => $id,'booking_id'=>$bookingid));
  			return $query->result_array();
      }
		}

		public function create_booking_photos($BookingId,$filesdata){
			foreach ($filesdata as $fd) {
				$data = array(
					'booking_id' => $BookingId,
					'file_name' => $fd,
					'Is_Active' => 1
				);
				$this->db->insert('clientbookingsphotos', $data);
			}
		}

		public function delete_booking_photo($id){
			$bookingImage = $this->BookingImage_model->get_images($id,null);
			$path_to_file = './assets/images/client_bookings_images/'.$bookingImage['file_name'];
			$this->db->where('Id', $id);
			$this->db->delete('clientbookingsphotos');
			$affectedRows=$this->db->affected_rows();
			if($affectedRows>0){
				$this->File_model->delete_photo_from_directory($path_to_file);
				return true;
			}else {
				return false;
			}
		}
	}
