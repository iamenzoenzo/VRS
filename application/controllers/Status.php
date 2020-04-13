<?php
	class Status extends CI_Controller{

		public function index(){
			$data['title'] = 'Status';
			$data['status'] = $this->Status_model->get_status(null);
			$this->load->view('templates/header');
			$this->load->view('status/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
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
      $data['title'] = 'Edit Status';
      $data['status'] = $this->Status_model->get_status($id);

      if(empty($data['status'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('status/edit', $data);
        $this->load->view('templates/footer');

    }

    public function update(){

      $this->Status_model->update_status();

      // Set message
      $this->session->set_flashdata('status_updated', 'Status has been updated');

      redirect('status/index');
    }

    public function delete($id){
      $this->Status_model->delete_status($id);

      // Set message
      $this->session->set_flashdata('status_deleted', 'Status has been deleted');

      redirect('status/index');
    }

	}
