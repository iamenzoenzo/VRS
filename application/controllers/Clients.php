<?php
date_default_timezone_set('Asia/Manila');
	class Clients extends CI_Controller{

		public function index(){
			$data['title'] = 'Clients';
			$data['clients'] = $this->Client_model->get_clients(null);
			$this->load->view('templates/header');
			$this->load->view('clients/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
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
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx';
						$config['max_size'] = '0';
						$config['max_width'] = '0';
						$config['max_height'] = '0';
						$config['overwrite'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$config['file_name'] = $timeStamp.'-'.$files['multiplefiles']['name'][$i];

						$this->upload->initialize($config);

						if(!$this->upload->do_upload('multiplefiles')){
							$error = array('error' => $this->upload->display_errors());
							array_push($fileName,'no-image.jpg');
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
      $data['title'] = 'Edit Status';
      $data['status'] = $this->Status_model->get_status($id);

      if(empty($data['status'])){
        show_404();
      }
        $this->load->view('templates/header');
        $this->load->view('status/edit', $data);
        $this->load->view('templates/footer');

    }

		private function UploadFiles($timeStamp,$FileName){
			$this->load->library('upload');
			$image_path="";
			$config['upload_path'] = './assets/images/client_images';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name']=$FileName;

			$this->upload->initialize($config);
			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$image_path = 'no-image.jpg'.json_encode($errors);
			} else {
				$data = array('upload_data' => $this->upload->data());
				$image_path = $FileName;
			}
			return $image_path;
		}

    public function update(){

      $this->Status_model->update_status();

      // Set message
      $this->session->set_flashdata('status_updated', 'Status has been updated');

      redirect('status/index');
    }

    public function delete($id){
      $this->Client_model->delete_client($id);

      // Set message
      $this->session->set_flashdata('client_deleted', 'Client has been deleted');

      redirect('clients/index');
    }

	}
