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
				$this->Car_model->create_car();

				// Set message
				$this->session->set_flashdata('category_created', 'Your category has been created');

				redirect('cars/index');
			}
		}

		public function posts($id){
			$data['title'] = $this->category_model->get_category($id)->name;

			$data['posts'] = $this->post_model->get_posts_by_category($id);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
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
