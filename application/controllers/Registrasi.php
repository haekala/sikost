<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class Registrasi extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tempat_model');
		$this->load->model('kamar_model','kammod');
	}
	public function index($idkos)
	{	$data['idkos']=$idkos;
		$kueri=$this->db->query('SELECT * FROM kamar_kost WHERE idKost ='.$idkos.' AND status=0');
		$data['kamars']=$kueri;
		$data['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$data['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$data['instansi'] = $this->config->item('nama_instansi');
		$data['credit'] = $this->config->item('credit_aplikasi');
		$data['alamat'] = $this->config->item('alamat_instansi');
		$this->load->view('regiskos',$data);
	}
	
	public function registration($idkos)
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$idkamar=$this->input->post('idkamar');
		$this->form_validation->set_rules('nama', 'Your Name', 'trim|required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'trim');
		$this->form_validation->set_rules('sex', 'sex', 'required');
		$this->form_validation->set_rules('norek', 'nomor rekening', 'trim|required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('idkamar','kamar pilihan','required');
		if($this->form_validation->run() == FALSE)
		{
					$this->index($idkos);
		}
		else
		{
			//fungsi book di kamar model.  Mengubah status kamar menjadi booked jika sebelumnya vacant
			
			
			$this->load->model('kamar_model','kammod');
			$this->kammod->book($idkamar,$idkos);
			redirect('dashboard_user');
		}
	
	}
	
	function changesiap($idkamar,$idkos,$email){
			$this->kammod->change_siap($email,$idkamar,$idkos);
	}
	function changediterima($idkamar,$idkos,$email){
		$this->kammod->change_diterima($email,$idkamar,$idkos);
			
	}
	function changeditolak($idkamar,$idkos,$email){
		$this->kammod->change_ditolak($email,$idkamar,$idkos);
			
	}
	
	
}
?>