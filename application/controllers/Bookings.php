<?php
date_default_timezone_set('Asia/Manila');
	class Bookings extends CI_Controller{

		public function index(){
			$data['title'] = 'Bookings';
			$data['bookings'] = $this->Booking_model->get_bookings(null);
			$data['filter'] = $this->input->post('name_filter');

			$this->load->view('templates/header');
			$this->load->view('bookings/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id){
			$data['title'] = 'View Booking';
			$data['bookings'] = $this->Booking_model->get_bookings($id);
			$data['images'] = $this->BookingImage_model->get_images(null,$id);
			$data['logs'] = $this->BookingLogs_model->get_logs_by_booking_id($id);
			$data['payments'] = $this->BookingPayments_model->get_payments_by_booking_id($id);
			$data['total_payments'] = $this->BookingPayments_model->get_payments_sum_by_booking_id($id);

			if(empty($data['bookings'])){
				show_404();
			}
				$this->load->view('templates/header');
				$this->load->view('bookings/view', $data);
				$this->load->view('templates/footer');

		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Add New Booking';

			$user_data = array(
				'booking_client_id' => $this->input->post('clientId'),
				'booking_start_date' => (!empty($this->input->post('start_date'))?$this->input->post('start_date'):date("Y-m-d")),
				'booking_days' => (!empty($this->input->post('number_of_days'))?$this->input->post('number_of_days'):1),
				'booking_add_driver'=> ($this->input->post('add_driver')=='on'?true:false)
			);

			$this->session->set_userdata($user_data);

			$startDate = $this->session->userdata('booking_start_date');
			if(!isset($startDate)){
				$startDate = date("Y-m-d");
			}

			$numberofdays = $this->session->userdata('booking_days');
			if(!isset($numberofdays)){
				$numberofdays = 1;
			}
			$end_date = date('Y-m-d', strtotime($startDate. ' + '.$numberofdays.' days'));

			$data['cars'] = $this->Car_model->get_available_cars_on_date($startDate,$end_date);
			$data['driver_pay'] = $this->Setting_model->get_settings(null,'Driver_Per_Day');
			$data['clients'] = $this->Client_model->get_clients(null);

			$this->form_validation->set_rules('clientId', 'Client', 'required|is_natural_no_zero');
			$this->form_validation->set_rules('carId', 'Vehicle', 'required|is_natural_no_zero');
			$this->form_validation->set_rules('start_date', 'Start date', 'required');
			$this->form_validation->set_rules('number_of_days', 'Number of days', 'required|greater_than[0]');

      if($this->form_validation->run() === FALSE){

				$this->load->view('templates/header');
				$this->load->view('bookings/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image

				$fileNames = array();
				$files = $_FILES;
				$timeStamp=time();

				$count = count($_FILES['multiplefiles']['name']);

				for($i=0;$i<$count;$i++){
					if(!empty($files['multiplefiles']['name'][$i])){

						$_FILES['multiplefiles']['name'] = $files['multiplefiles']['name'][$i];
						$_FILES['multiplefiles']['type'] = $files['multiplefiles']['type'][$i];
						$_FILES['multiplefiles']['tmp_name'] = $files['multiplefiles']['tmp_name'][$i];
						$_FILES['multiplefiles']['error'] = $files['multiplefiles']['error'][$i];
						$_FILES['multiplefiles']['size'] = $files['multiplefiles']['size'][$i];

						$config['upload_path'] = './assets/images/client_bookings_images';
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['max_size'] = '0';
						$config['max_width'] = '0';
						$config['max_height'] = '0';
						$config['overwrite'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$config['file_name'] = $timeStamp.'-'.$files['multiplefiles']['name'][$i];

						$this->upload->initialize($config);

						if(!$this->upload->do_upload('multiplefiles')){
							$error = array('error' => $this->upload->display_errors());
							//array_push($fileName,'no-image.jpg');
						}else{
							$uploadData = $this->upload->data();
							array_push($fileNames,$filename = $uploadData['file_name']);
						}
					}
				}


				$BookingId = $this->Booking_model->create_booking($fileNames);

				// Set message
				$this->session->set_flashdata('booking_created', 'You have added a new booking');

				redirect('bookings/edit/'.$BookingId);
			}
		}

    public function edit($id){
      $data['title'] = 'Edit Client Information';
      $data['clients'] = $this->Client_model->get_clients($id);

      if(empty($data['clients'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('clients/edit', $data);
        $this->load->view('templates/footer');

    }


		public function initiatecreate(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Add New Booking';

			$user_data = array(
				'booking_client_id' => $this->input->post('clientId'),
				'booking_start_date' => $this->input->post('start_date'),
				'booking_days' => $this->input->post('number_of_days'),
				'booking_add_driver'=> ($this->input->post('add_driver')=='on'?true:false)
			);

			$this->session->set_userdata($user_data);

			$startDate = $this->session->userdata('booking_start_date');
			if(!isset($startDate)){
				$startDate = date("Y-m-d");
			}

			$numberofdays = $this->session->userdata('booking_days');
			if(!isset($numberofdays)){
				$numberofdays = 1;
			}
			$end_date = date('Y-m-d', strtotime($startDate. ' + '.$numberofdays.' days'));

			$data['cars'] = $this->Car_model->get_available_cars_on_date($startDate,$end_date);
			$data['driver_pay'] = $this->Setting_model->get_settings(null,'Driver_Per_Day');
			$data['clients'] = $this->Client_model->get_clients(null);

			$this->load->view('templates/header');
			$this->load->view('bookings/create',$data);
			$this->load->view('templates/footer');


		}

		public function addPayement(){
			$timestamp = time();
			// Upload Image
			$config['upload_path'] = './assets/images/client_bookings_payments';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $timestamp.'-'.$_FILES['paymentAttachment']['name'];

			$this->upload->initialize($config);

			if(!$this->upload->do_upload('paymentAttachment')){
				$this->session->set_flashdata('global_error', 'Error encountered: '.$this->upload->display_errors());
				redirect('bookings/view/'.$this->input->post('BookingId'));
			} else {
				$data = $this->upload->data();
				$payment_image = $data['file_name'];
			}

			$paymentId = $this->BookingPayments_model->create_payment($this->input->post('BookingId'),$this->input->post('payment_amount'),$this->input->post('payment_remarks'),$this->session->userdata('user_id'),$payment_image);
			if(!$paymentId>0){
				// Set message
				$this->session->set_flashdata('global_error', 'Error encountered while saving the payment.');

			}else{
				// Set message
				$this->session->set_flashdata('payment_created', 'You have added a new payment for this booking');
			}

			redirect('bookings/view/'.$this->input->post('BookingId'));

		}

		public function get_available_vehicles($today=null)
		{
			if(isset($today)){
				$newDate = $today;
				$numberofdays=1;
			}else{
				$start_date=$this->input->post('start_date');
				$newDate = date("Y-m-d", strtotime($start_date));
				$numberofdays=$this->input->post('number_of_days');
			}

			$end_date= date('Y-m-d', strtotime($start_date. ' + '.$numberofdays.' days'));
			$car = $this->Car_model->get_available_cars_on_date($newDate,$end_date);

			echo json_encode($car);

		}

		public function computeRent()
		{
			$adddriver=$this->input->post('add_driver');
			if($adddriver=='true'){
				$res = $this->Setting_model->get_settings(null,'Driver_Per_Day');
				$driverpay=$res['value'];
			}else{
				$driverpay=0;
			}
			$noOfDays=$this->input->post('no_of_days');
			$car = $this->Car_model->get_cars($this->input->post('car_id'));
			if(!empty($car['Id']) && !empty($noOfDays)){
				echo number_format((($noOfDays * $car['RentPerDay'])+($driverpay*$noOfDays))-$this->input->post('discount'),2);
			}else{
				echo number_format(0,2);
			}
		}

    public function update(){

      $this->Client_model->update_client();

      // Set message
      $this->session->set_flashdata('client_updated', 'Client has been updated');

      redirect('clients/index');
    }

    public function delete($id){
      $result = $this->Booking_model->delete_booking($id);
			if($result){
				$this->session->set_flashdata('booking_deleted', 'Client booking has been deleted');
	      redirect('bookings/index');
			}else{
				$this->session->set_flashdata('client_deleted_error', 'Error encountered while deleting client booking');
				redirect('bookings/view/'.$id);
			}

    }

	}
