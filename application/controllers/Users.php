<?php
	class Users extends CI_Controller{

		public function index(){
			$data['title'] = 'Users';
			$data['users'] = $this->User_model->get_users(null);
			$data['filter'] = $this->input->post('users_filter');
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

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
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

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('./');
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
