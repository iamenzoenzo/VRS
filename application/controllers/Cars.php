<?php
	class Cars extends CI_Controller{

		public function index(){
			$data['title'] = 'Cars';
			$data['cars'] = $this->Car_model->get_cars();
			$this->load->view('templates/header');
			$this->load->view('cars/cars', $data);
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

				// Upload Image
				$timeStamp=time();
				$config['upload_path'] = './assets/images/cars_images';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=$timeStamp."-".$_FILES['userfile']['name'];
				//$config['max_size'] = '2048';
				//$config['max_width'] = '2000';
				//$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$car_image = 'no-image.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$car_image = $timeStamp."-".$_FILES['userfile']['name'];
				}

				$this->Car_model->create_car($car_image);

				// Set message
				$this->session->set_flashdata('car_created', 'You have added a new vehicle');

				redirect('cars/index');
			}
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);

			// Set message
			$this->session->set_flashdata('category_deleted', 'Your category has been deleted');

			redirect('categories');
		}
	}
