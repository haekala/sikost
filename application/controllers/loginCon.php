<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class loginCon extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL){
		// Load our view to be displayed
		// to the user
		$this->load->helper('url');
		if(!$this->session->userdata('logged')){
			$data['msg'] = $msg;
		}
		else redirect ('loginlogout');
	}
	
	
	public function process(){
		$this->load->helper('url');
		// Load the model
		$this->load->model('pemilik_model','pkos');
		$this->load->model('user_model','user');
		$this->load->model('admin_model','admin');
		// Validate the user can login
		$result = $this->pkos->validate();
		if(!$result) {$result = $this->user->validate();} 
		if(!$result) {$result=$this->admin->validate();}
		// Now we verify the result
		
					redirect('user');
}
}
?>