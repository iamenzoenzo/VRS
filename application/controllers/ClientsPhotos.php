<?php
date_default_timezone_set('Asia/Manila');
	class ClientsPhotos extends CI_Controller{

    public function delete($id,$clientId){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

      $result = $this->ClientImage_model->delete_client_photo($id);
			if($result){
				$this->session->set_flashdata('attachment_deleted', 'Attachment has been deleted');
	      redirect('clients/view/'.$clientId);
				}
	    }
		}
