<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class kamar_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }

	function book($idkamar,$idkos)
	{
		$idkos = $idkos;
		$data=array(
			'email'=> $this->session->userdata('email'),
			'nama'=>$this->input->post('nama'),
			'kelamin'=>$this->input->post('sex'),
			'fakultas'=>$this->input->post('fakultas'),
			'idkost'=>$idkos,
			'idkamar'=>$idkamar,
			'status'=>"book",
			'norekuser'=>$this->input->post('norek'),
			);
		$this->db->insert('pendaftaran',$data);
	}
	
	function change_siap($email,$idkamar,$idkos){
		if($this->flag_siap($idkamar,$idkos))
		{
			//dashboard pemilik
			redirect('dashboard_pemilik');
			//ada error bilang ga bisa woi ngaco loe
		}
		else 
		{
			$this->db->query('UPDATE pendaftaran SET status = "siapbayar" WHERE email = "'.$email.'" AND idkamar = "'.$idkamar.'" AND idkost = "'.$idkos.'"');
			$kueri = $this->db->query('SELECT DISTINCT noRek FROM pemilik_kost,tempat_kost,pendaftaran WHERE pendaftaran.idkost='.$idkos.' AND tempat_kost.email=pemilik_kost.email AND pendaftaran.idkost=tempat_kost.idkost');
			$row = $kueri->row();
			$norek=$row->noRek;
			
			$this->db->query('UPDATE pendaftaran SET norekpemilik="'.$norek.'" WHERE email = "'.$email.'" AND idkamar = "'.$idkamar.'" AND idkost = "'.$idkos.'"');
			//batas waktu 1 hari dari sekarang, tambah kolom tanggal nemeinin time
			redirect('dashboard_pemilik');
		}
	}	
	
	function change_diterima($email,$idkamar,$idkos)
	{
			$this->db->query('UPDATE pendaftaran SET status = "diterima" WHERE email = "'.$email.'" AND idkamar = "'.$idkamar.'" AND idkost = "'.$idkos.'"');
			$this->db->query('UPDATE kamar_kost SET status = "1", penghuni = "'.$email.'" WHERE idKost = "'.$idkos.'" AND idkamar = "'.$idkamar.'"');
			redirect('dashboard_pemilik');
	}
	
	function change_ditolak($email,$idkamar,$idkos)
	{
			$this->db->query('UPDATE pendaftaran SET status = "ditolak" WHERE email = "'.$email.'" AND idkamar = "'.$idkamar.'" AND idkost = "'.$idkos.'"');
			redirect('dashboard_pemilik');
	}
	
	function flag_siap($idkamar,$idkos)
	{
		$kueri = $this->db->query('SELECT * FROM pendaftaran WHERE idkamar ="'.$idkamar.'" AND idkost = "'.$idkos.'" AND (status = "siapbayar" OR status = "diterima")');
		if ($kueri->num_rows() > 0)
		{
			return true;
		}
		else return false;
	}
	}
?>