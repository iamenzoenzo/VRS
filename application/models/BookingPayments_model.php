<?php
	class BookingPayments_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_payment($bookingId,$amount,$remarks,$user_id){
			$data = array(
				'booking_id' => $bookingId,
				'amount' => $amount,
				'payment_remarks' => $remarks,
        'created_by' => $user_id
			);
			return $this->db->insert('clientbookingspayments', $data);
		}

		public function get_payments_by_booking_id($bookingId){
			$this->db->order_by("clientbookingspayments.PaymentId", "desc");
			$this->db->join('users a', 'a.id=clientbookingspayments.created_by', 'inner');
			$query=$this->db->get_where('clientbookingspayments', array('booking_id= '=>$bookingId));
			return $query->result_array();
		}

	}
