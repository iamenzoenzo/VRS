<?php
	class Settings extends CI_Controller{

		public function index(){
			$data['title'] = 'Settings';
			$data['settings'] = $this->Setting_model->get_settings(null);
			$this->load->view('templates/header');
			$this->load->view('settings/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = 'Add New Settings';
			$this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('value', 'Value', 'required');

      if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('settings/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Setting_model->create_setting();

				// Set message
				$this->session->set_flashdata('setting_created', 'You have added a new setting');

				redirect('settings/index');
			}
		}

    public function edit($id){
      $data['title'] = 'Edit Setting';
      $data['settings'] = $this->Setting_model->get_settings($id);

      if(empty($data['settings'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('settings/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update(){

      $this->Setting_model->update_setting();

      // Set message
      $this->session->set_flashdata('setting_updated', 'Your setting has been updated');

      redirect('settings/index');
    }

    public function delete($id){
      $this->Setting_model->delete_setting($id);

      // Set message
      $this->session->set_flashdata('settings_deleted', 'Your setting has been deleted');

      redirect('settings/index');
    }

	}
