<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class Pemilik extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pemilik_model');
	}
	public function index()
	{
		if(($this->session->userdata('name')!=""))
		{
			redirect ('home');
		}
		else{
			$msg=array(
				'nama'=>$this->input->post('nama'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'noTelp'=>$this->input->post('noTelp'),
				'namaKost'=>$this->input->post('namaKost'),
				'alamat'=>$this->input->post('alamat'),
				'rangeHarga'=>$this->input->post('rangeHarga'),
				'kuota'=>$this->input->post('kuota')
				);
			$msg['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$msg['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$msg['instansi'] = $this->config->item('nama_instansi');
			$msg['credit'] = $this->config->item('credit_aplikasi');
			
			$this->load->view("registrasi/pemilik", $msg);
			
		}
	}
	public function welcome()
	{
		$data['title']= 'Welcome';
		$this->load->view('header_view',$data);
		$this->load->view('welcome_view.php', $data);
		$this->load->view('footer_view',$data);
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=md5($this->input->post('pass'));

		$result=$this->user_model->login($email,$password);
		if($result) $this->welcome();
		else        $this->index();
	}
	public function thank()
	{
		redirect('home_reg');
	}
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('nama', 'User Name', 'trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email| unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules ('noTelp', 'No Telepon', 'trim|required| max_length[12] |min_length[7]| numeric');
		$this->form_validation->set_rules('namakost', 'Nama Kost', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kuota', 'Kapasitas Kost', 'trim|required');
		$this->form_validation->set_rules('check', 'Menerima Persetujuan', 'required');
		
		
			
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->pemilik_model->add_pemilik();
			$this->thank();
		}
	}
	public function logout()
	{
		$newdata = array(
		'nama'  =>'',
		'email'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		$this->index();
	}
}
?>