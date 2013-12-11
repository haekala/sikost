<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class user_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }
    public function add_user()
	{
		$data=array(
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'noTelp'=>$this->input->post('noTelp')
			);
		$this->db->insert('user',$data);
	}
    public function validate(){
        // grab user input	

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        // Prep the query
        $this->load->database();
		$this->db->select ('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('user');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'jenis' => "user",
                    'name' => $row->nama,
                    'email' => $row->email,
                    'logged' => true
                    );
			$this->load->library('session');
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        //return false;
		else
		{
			$this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami. Silakan melakukan registrasi jika diperlukan.");
			header('location:'.base_url().'');
		}
    }
	
	
	}
?>