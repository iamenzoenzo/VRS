<?php
	class Users extends CI_Controller{

		public function index(){
			$data['title'] = 'Users';
			$data['users'] = $this->User_model->get_users(null);
			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = 'Add New User';
			$this->form_validation->set_rules('fname', 'First Name', 'required');
      $this->form_validation->set_rules('lname', 'Last Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('user_type', 'User Type', 'required');

      if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/create', $data);
				$this->load->view('templates/footer');				
			} else {
				$this->User_model->create_user();

				// Set message
				$this->session->set_flashdata('user_created', 'You have added a new user');

				redirect('users/index');
			}
		}

    public function edit($id){
      $data['title'] = 'Edit User';
      $data['users'] = $this->User_model->get_users($id);

      if(empty($data['users'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update(){

      $this->User_model->update_user();

      // Set message
      $this->session->set_flashdata('user_updated', 'User information has been updated');

      redirect('users/index');
    }

    public function delete($id){
      $this->User_model->delete_user($id);

      // Set message
      $this->session->set_flashdata('user_deleted', 'User has been deleted');

      redirect('users/index');
    }

	}
