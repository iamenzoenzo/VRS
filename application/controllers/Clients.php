<?php
date_default_timezone_set('Asia/Manila');
	class Clients extends CI_Controller{

		public function index(){
			$data['title'] = 'Clients';
			$data['clients'] = $this->Client_model->get_clients(null);
			$data['filter'] = $this->input->post('name_filter');
			$this->load->view('templates/header');
			$this->load->view('clients/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id){
			$data['title'] = 'Client Information';
			$data['clients'] = $this->Client_model->get_clients($id);
			$data['images'] = $this->UserImage_model->get_images(null,$id);
			if(empty($data['clients'])){
				show_404();
			}
				$this->load->view('templates/header');
				$this->load->view('clients/view', $data);
				$this->load->view('templates/footer');

		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Add New Client';
			$this->form_validation->set_rules('name', 'Complete Name', 'required');
      if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('clients/create', $data);
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

						$config['upload_path'] = './assets/images/client_images';
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


				$this->Client_model->create_client($fileNames);

				// Set message
				$this->session->set_flashdata('clients_created', 'You have added a new client');

				redirect('clients/index');
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

    public function update(){

      $this->Client_model->update_client();

      // Set message
      $this->session->set_flashdata('client_updated', 'Client has been updated');

      redirect('clients/index');
    }

    public function delete($id){
      $this->Client_model->delete_client($id);

      // Set message
      $this->session->set_flashdata('client_deleted', 'Client has been deleted');

      redirect('clients/index');
    }

	}
