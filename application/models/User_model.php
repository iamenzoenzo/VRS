<?php
	class User_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_users($id){
			if(isset($id)){
        $query=$this->db->get_where('users', array('id' => $id));
        return $query->row_array();
      }else {
        $query = $this->db->get('users');
  			return $query->result_array();
      }
		}

		public function create_user(){
			$data = array(
				'firstname' => $this->input->post('fname'),
        'lastname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'user_type' => $this->input->post('user_type'),
				'Is_Active' => 1

			);
			return $this->db->insert('users', $data);
		}

    public function update_user(){
      $data = array(
				'firstname' => $this->input->post('fname'),
        'lastname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'user_type' => $this->input->post('user_type'),
				'Is_Active' => 1
      );

      $this->db->where('id', $this->input->post('id'));
      return $this->db->update('users', $data);
    }

		public function get_settings($id){
      if(isset($id)){
        $query=$this->db->get_where('settings', array('id' => $id));
        return $query->row_array();
      }else {
        $query = $this->db->get('settings');
  			return $query->result_array();
      }
		}

		public function delete_user($id){
			$this->db->where('id', $id);
			$this->db->delete('users');
			return true;
		}
	}
