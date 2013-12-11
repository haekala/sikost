<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class loginlogout extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		$this->load->helper('url');
		// If the user is validated, then this function will run
		echo 'Congratulations, you are logged in.';
		// Add a link to logout
		echo $this->session->userdata('email'); echo '<br \>';
		echo $this->session->userdata('name'); echo '<br \>';
		echo $this->session->userdata('jenis');echo '<br \>';
		echo "<a href='".base_url()."index.php/loginlogout/do_logout'>Logout Fool!</a>";
	}
	
	private function check_isvalidated(){
		$this->load->helper('url');

		if(! $this->session->userdata('logged')){
			return true;
		}
		else return false;
	}
	
	public function do_logout(){
		$this->session->sess_destroy();
				$this->load->helper('url');

		redirect('home');
	}
 }
 ?>