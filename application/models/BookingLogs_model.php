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
			$this->db->order_by("clientbookingslogs.Id", "desc");
			$this->db->join('users a', 'a.id=clientbookingslogs.created_by', 'inner');
			$query=$this->db->get_where('clientbookingslogs', array('clientbookings_id= '=>$bookingId));
			return $query->result_array();
		}

		public function delete_logs_by_booking_id($bookingId){
			$logs = $this->get_logs_by_booking_id($bookingId);
			foreach ($logs as $log) {
				$this->db->where('Id', $log['Id']);
				$this->db->delete('clientbookingslogs');
			}
		}

	}
