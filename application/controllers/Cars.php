<?php
	class Cars extends CI_Controller{

		public function index(){
			$data['title'] = 'Vehicles';
			$data['cars'] = $this->Car_model->get_cars(null);
			$this->load->view('templates/header');
			$this->load->view('cars/index', $data);
			$this->load->view('templates/footer');
		}

		public function availablecars(){
			$data['title'] = 'Available Vehicles Types For Rent';
			$data['cars'] = $this->Car_model->get_distinct_cars();
			$this->load->view('templates/header');
			$this->load->view('cars/availablecars', $data);
			$this->load->view('templates/footer');
		}

		public function create(){

			$data['title'] = 'Add New Vehicle';

			$this->form_validation->set_rules('car-name', 'Name', 'required');
      $this->form_validation->set_rules('car-code-name', 'Code Name', 'required');
      $this->form_validation->set_rules('car-model-name', 'Model', 'required');
      $this->form_validation->set_rules('car-manufacturer', 'Manufacturer', 'required');
      $this->form_validation->set_rules('car-model-year', 'Year', 'required');
      $this->form_validation->set_rules('car-plate-number', 'Plate Number', 'required');
      $this->form_validation->set_rules('car-rent-per-day', 'Rent Per Day', 'required');
      $this->form_validation->set_rules('car-capacity', 'Capacity', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('cars/create', $data);
				$this->load->view('templates/footer');
			} else {
				$timestamp = time();
				// Upload Image
				$config['upload_path'] = './assets/images/cars_images';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '0';
				$config['max_width'] = '0';
				$config['max_height'] = '0';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$config['file_name'] = $timestamp.'-'.$_FILES['userfile']['name'];

				$this->upload->initialize($config);

				if(!$this->upload->do_upload('userfile')){
					$errors = array('error' => $this->upload->display_errors());
					$car_image = 'noimage.jpg';
				} else {
					$data = $this->upload->data();
					$car_image = $data['file_name'];
				}

				$this->Car_model->create_car($car_image);

				// Set message
				$this->session->set_flashdata('car_created', 'You have added a new vehicle');

				redirect('cars/index');
			}
		}

		public function edit($id){
      $data['title'] = 'Update Vehicle Information';
      $data['cars'] = $this->Car_model->get_cars($id);

      if(empty($data['cars'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('cars/edit', $data);
        $this->load->view('templates/footer');

    }

		public function view($id){
			$data['title'] = 'Vehicle Information';
			$data['cars'] = $this->Car_model->get_cars($id);

			if(empty($data['cars'])){
				show_404();
			}
				$this->load->view('templates/header');
				$this->load->view('cars/view', $data);
				$this->load->view('templates/footer');

		}

		public function update(){

			$this->Car_model->update_car();

			// Set message
			$this->session->set_flashdata('car_updated', 'Vehicle information has been updated');

			redirect('cars/index');
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$result = $this->Car_model->delete_car($id);
			if($result){
				$this->session->set_flashdata('car_deleted', 'Vehicle has been deleted');
				redirect('cars/index');
			}else{
				$this->session->set_flashdata('car_deleted_error', 'Error encountered while deleting vehicle');
				redirect('cars/view/'.$id);
			}

		}
	}
