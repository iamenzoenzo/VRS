<?php
	class File_model extends CI_Model{
		public function __construct(){
			//$this->load->database();
		}

		public function delete_photo_from_directory($path_to_file){
			return unlink($path_to_file);
		}
	}
