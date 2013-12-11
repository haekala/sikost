<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class admin_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input	

        $nama = $this->input->post('email');
        $password = $this->input->post('password');
        // Prep the query
        $this->load->database();
		$this->db->select ('*');
        $this->db->where('username', $nama);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('administrator');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'jenis' => "admin",
                    'name' => $row->username,
                    'logged' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
	
	
	}
?>