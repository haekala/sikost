<?php

/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}
	function do_upload($a,$b)
	{
		$config['upload_path'] = './Image/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->db->query('INSERT INTO  `sikost`.`gambar` (`nomor` ,`idkost`) VALUES (NULL ,  '.$b.')');
		$apake=$this->db->insert_id();
		$config['file_name']=$apake;
		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->db->query('DELETE FROM `gambar` WHERE nomor='.$apake);
			redirect ('tempatkost/deskripsi/'.$a);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			redirect ('tempatkost/deskripsi/'.$a);
		}
	}
}
?>