<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class pemilik_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }
    public function get_all_unverified(){
		return $this->db->query('SELECT * FROM tempat_kost WHERE verified = 0');
		
	}
	
    public function cekcreate($email){
		$kueri = $this->db->query('SELECT * FROM tempat_kost WHERE email="'.$email.'"');
		if($kueri->num_rows()==1) {return false;}
		else {return true;}
		
	}
	
	public function ver($email){
		$kueri = $this->db->query('SELECT * FROM pemilik_kost WHERE email="'.$email.'" AND verified="0"');
		if ($kueri->num_rows()==1)return false;
		else return true;
	}

//	public function getpic($email){
//		//mengambil satu gambar untuk satu idkos
//			$kuerikos = $this->db->query("SELECT tempat_kost.idkost from tempat_kost where email = '".$email."'");
//
//			$temp2 = $kuerikos->result();
//			$gambir=array();
//
//			foreach ($temp2 as $value) {
//				$idkos = $value->idkost;
//
//				$kueridua = $this->db->query('SELECT nomor FROM gambar WHERE idkost ='.$idkos);
//				//append ke dalam array gambar
//				$temp = $kueridua->row();
//                               
//				$g[1] = $temp->nomor;
//
//				$kueritiga = $this->db->query('SELECT * FROM tempat_kost WHERE idkost="'.$idkos.'" AND email = "'.$email.'"');
//				$temp2 = $kueritiga->row();
//				$g[2] = $temp2->nama;
//				$g[3] = $temp2->tersedia;
//				$gambir[] = $g;
//                                
//			}
//                        
//                        //die();
////			die();
//
//		return $gambir;
//	}

	public function getidkos($gambar){
		$kueri = $this->db->query('SELECT idkost FROM gambar WHERE nomor='.$gambar);
		$row = $kueri->row();
		
		return $row->idkost;
	}

    public function validate(){
        // grab user input
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
		
        // Prep the query	
		$this->load->database();
		$this->db->select ('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('pemilik_kost');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {$ceklast=$this->ver($email);
        if($ceklast==true){
            // If there is a user, then create session data
			
	            $row = $query->row();
	            $data = array(
	                    'jenis' => "pkost",
	                    'name' => $row->nama,
	                    'email' => $row->email,
	                    'logged' => true
	                    );
	            $this->session->set_userdata($data);
	            $ceklast=$this->ver($email);
	            return true;}
	            else {return false;}
			
        }
        // If the previous process did not validate
        // then return false.
        else
		{
			$this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami. Silakan melakukan registrasi jika diperlukan.");
			header('location:'.base_url().'');
		}
    }
	public function add_pemilik()
	{
		$data=array(
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'noTelp'=>$this->input->post('noTelp'),
			'namaKost'=>$this->input->post('namaKost'),
			'alamat'=>$this->input->post('alamat'),
			'rangeHarga'=>$this->input->post('rangeHarga'),
			'kuota'=>$this->input->post('kuota')
			);
		$this->db->insert('pemilik_kost',$data);
	}
	
	
	}
	
?>