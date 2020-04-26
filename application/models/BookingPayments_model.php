<?php
	class BookingPayments_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_payment($bookingId,$amount,$remarks,$user_id,$payment_image){
			$data = array(
				'booking_id' => $bookingId,
				'amount' => $amount,
				'payment_remarks' => $remarks,
				'attachment_path' => $payment_image,
        'created_by' => $user_id
			);

			$this->db->insert('clientbookingspayments', $data);
			return $this->db->insert_id();
		}

		public function get_payments_by_booking_id($bookingId){
			$this->db->order_by("clientbookingspayments.PaymentId", "desc");
			$this->db->join('users a', 'a.id=clientbookingspayments.created_by', 'inner');
			$query=$this->db->get_where('clientbookingspayments', array('booking_id= '=>$bookingId));
			return $query->result_array();
		}

public function get_payments_sum_by_booking_id($bookingId){
			$this->db->select_sum('amount');
			$this->db->from('clientbookingspayments');
			$this->db->where('Booking_Id',$bookingId);
			$query = $this->db->get();
			return $query->row()->amount;
		}


	}
