<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
	{
		if ($this->session->userdata('jenis')=="admin") $this->load->view('admincp_view');
		else redirect ('home');
	}

function verify($telp)
{
	$this->db->query("UPDATE  `sikost`.`pemilik_kost` SET  `verified` =  '1' WHERE  `pemilik_kost`.`noTelp` =  '".$telp."'");
	redirect ('admin/verification/success');
	
}
function verification($msg=NULL)
{		$this->load->helper('url');
		$this->load->library('table');
		$this->load->model('pemilik_model','pemmod');
		$kueri = $this->db->query('SELECT * FROM pemilik_kost WHERE verified = 0');
		$data['meja']=$this->table->set_heading('nama Kost', 'nomor telepon','nomor rekening','alamat','email','status');
		foreach ($kueri->result() as $row)
		{
			$data['meja']=$this->table->add_row($row->nama,$row->noTelp,$row->noRek,$row->alamat,$row->email,'unverified','<form action="'.base_url().'index.php/admin/verify/'.$row->noTelp.'" method="post"> 
		<input type="submit" value="verify"/></form>');
		}
		
		if ($msg!=NULL)$data['success']='successfully verified 1 pemilik kost'; else $data['success'] = 'Pilih Pemilik Kost untuk disetujui';
		$data['meja']=$this->table->generate();
		$this->load->view('verification_view',$data);
}

	public function hapus ($idkos)
	{
		$this->db->query('DELETE FROM tempat_kost WHERE idkost='.$idkos);
		redirect ('home');
	}
function delete($msg=NULL)
{
		$this->load->helper('url');
		$this->load->library('table');
		$this->load->model('tempat_model','temmod');
		$kueri = $this->db->query('SELECT * FROM tempat_kost');
		$data['meja']=$this->table->set_heading('idKost', 'nama','kuota','alamat','tersedia','email');
		foreach ($kueri->result() as $row)
		{
			$data['meja']=$this->table->add_row($row->idkost,$row->nama,$row->kuota,$row->alamat,$row->tersedia,$row->email,'<form action="'.base_url().'index.php/admin/hapus/'.$row->idkost.'" method="post"> 
		<input type="submit" value="hapus"/></form>');
		}
		
		if ($msg!=NULL)$data['success']='successfully hapus 1 pemilik kost'; else $data['success'] = 'Pilih tempat Kost untuk dihapus';
		$data['meja']=$this->table->generate();
		$this->load->view('verification_view',$data);
}
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');

   //query the database
   $result = $this->user->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'email' => $row->email
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid email or password');
     return false;
   }
 }
}
?>