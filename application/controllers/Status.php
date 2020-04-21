<?php
	class Status extends CI_Controller{

		public function index(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

			$data['title'] = 'Status';
			$data['status'] = $this->Status_model->get_status(null);
			$this->load->view('templates/header');
			$this->load->view('status/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

			$data['title'] = 'Add New Status';
			$this->form_validation->set_rules('label', 'First Name', 'required');

      if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('status/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Status_model->create_status();

				// Set message
				$this->session->set_flashdata('status_created', 'You have added a new status');

				redirect('status/index');
			}
		}

    public function edit($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

      $data['title'] = 'Edit Status';
      $data['status'] = $this->Status_model->get_status($id);

      if(empty($data['status'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('status/edit', $data);
        $this->load->view('templates/footer');

    }

		public function view($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

			$data['title'] = 'View Status';
			$data['status'] = $this->Status_model->get_status($id);

			if(empty($data['status'])){
				show_404();
			}
				$this->load->view('templates/header');
				$this->load->view('status/view', $data);
				$this->load->view('templates/footer');

		}


    public function update(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

      $this->Status_model->update_status();

      // Set message
      $this->session->set_flashdata('status_updated', 'Status has been updated');

      redirect('status/index');
    }

    public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}
			
      $this->Status_model->delete_status($id);

      // Set message
      $this->session->set_flashdata('status_deleted', 'Status has been deleted');

      redirect('status/index');
    }

	}
