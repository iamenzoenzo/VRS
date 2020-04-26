<?php
	class Users extends CI_Controller{

		public function index(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}
			$data['title'] = 'Users';
			$data['users'] = $this->User_model->get_users(null);
			$data['filter'] = $this->input->post('users_filter');
			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}
			$data['title'] = 'Add New User';
			$this->form_validation->set_rules('fname', 'First Name', 'required');
      $this->form_validation->set_rules('lname', 'Last Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
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

		// Log in user
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = $this->input->post('password');

				// Login user
				$user_id = $this->User_model->login($username, $password);
				$user = $this->User_model->get_users($user_id);
				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'user_type' => $user['user_type'],
						'username' => $username,
						'logged_in' => true,
						'is_admin'=> $this->User_model->user_is_admin($user_id)
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('./');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('is_admin');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('./');
		}

    public function edit($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}
      $data['title'] = 'Edit User';
      $data['users'] = $this->User_model->get_users($id);

      if(empty($data['users'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer');

    }

		public function view($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}
			$data['title'] = 'View User Information';
			$data['users'] = $this->User_model->get_users($id);

			if(empty($data['users'])){
				show_404();
			}
				$this->load->view('templates/header');
				$this->load->view('users/view', $data);
				$this->load->view('templates/footer');

		}

		public function invalid(){
			$data['title'] = 'Invalid Permission';
			$this->load->view('templates/header');
			$this->load->view('users/invalid', $data);
			$this->load->view('templates/footer');

		}

    public function update(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

      $this->User_model->update_user();

      // Set message
      $this->session->set_flashdata('user_updated', 'User information has been updated');

      redirect('users/index');
    }

    public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}elseif (!$this->session->userdata('is_admin')) {
				redirect('users/invalid');
			}

      $this->User_model->delete_user($id);

      // Set message
      $this->session->set_flashdata('user_deleted', 'User has been deleted');

      redirect('users/index');
    }

	}
