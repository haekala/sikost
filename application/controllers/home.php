<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{															
	//mengambil gambar-gambar untuk diberikan ke homeview sebagai array
		$this->load->model('gambar_model','gammod');
		//load view homeview
		$d['gambars'] = $this->gammod->getpic();
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		if($this->session->userdata('name')!="") $this->load->view('user/home', $d);
		else	$this->load->view('app/login', $d);
	}
	
}
?>