<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class imageuploader extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		$email=$this->session->userdata('email');
		$this->load->model('pemilik_model','pemmod');
		$cek = $this->pemmod->cekcreate($email);
		$this->load->model('tempat_model','kos');
		if($cek=true){$idkos=0;} 
		else {$idkos = $this->kos->getidkos();}
		$data['email']=$this->session->userdata('email');
		$data['gambars'] = $this->kos->getAllGambar($idkos);
		$data['desgambars']=$this->kos->getAllGambarDes($idkos);

		$this->load->view('upload_form', array('error' => ' ' ));
				$this->load->view('upload_form2', $data);
	}

	function do_upload()
	{
		
		
		$this->load->model('tempat_model','kos');
		$idkos = $this->kos->getidkos();
		$data['email']=$this->session->userdata('email');
		$data['gambars'] = $this->kos->getAllGambar($idkos);
		$data['desgambars']=$this->kos->getAllGambarDes($idkos);

		$config['upload_path'] = './image/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->model('gambar_model','gammod');
		$max = $this->gammod->getlargest();
		$namabaru = $max+1;
		$config['file_name'] = $namabaru;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('upload_form', $error);
			$this->load->view('upload_form2', $data);
		}
		else
		{
			$desk = $this->input->post('deskripsi');
			$this->gammod->add($namabaru,$desk,$idkos);
			$data2 = array('upload_data' => $this->upload->data());
			$this->load->view('upload_form', array('error'=>' '));
			$this->load->view('upload_form2', $data);
		}
	}
	
	
}
?>