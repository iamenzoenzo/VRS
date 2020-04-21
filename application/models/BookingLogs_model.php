<?php
	class BookingLogs_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_log($bookingId,$remarks,$user_id){
			$data = array(
				'clientbookings_id' => $bookingId,
				'remarks' => $remarks,
        'created_by' => $user_id
			);
			return $this->db->insert('clientbookingslogs', $data);
		}

		public function get_logs_by_booking_id($bookingId){
			$this->db->order_by("clientbookingslogs.Id", "asc");
			$this->db->join('users a', 'a.id=clientbookingslogs.created_by', 'inner');
			$query=$this->db->get_where('clientbookingslogs', array('clientbookings_id= '=>$bookingId));
			return $query->result_array();
		}

	}
