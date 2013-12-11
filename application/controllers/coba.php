<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class coba extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{															
	//mengambil gambar-gambar untuk diberikan ke homeview sebagai array
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		redirect('coba/index2');
		$this->load->view('app/login',$d);
					//header('location:'.base_url().'dashboard_admin');

	}
	
	
	public function index2()
	{															
	//mengambil gambar-gambar untuk diberikan ke homeview sebagai array
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');	
		$this->load->view('app/login',$d);
					//header('location:'.base_url().'dashboard_admin');

	}
	
}
?>