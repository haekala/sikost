<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class tempat_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }
    var $tblname = 'tempat_kost';
    function renew($idkos){
                $this->load->database();
		//ATTRIBUT KOST YANG DIUPDATE :
		$namakos = $this->input->post('name');
		$kuota	 = $this->input->post('kuota');
		$alamat = $this->input->post('alamat');
		$tersedia	 = $this->input->post('tersedia');
		
		$data = array('nama'=>$namakos,'kuota'=>kuota,'alamat'=>$alamat,'tersedia'=>$tersedia);
		$where = "idkost = $idkos";
		$str = $this->db->update_string('tempat_kost',$data,$where);
		$this->db->query($str);
		
		
		}
	function del($idkos){
		$this->db->query('DELETE FROM tempat_kost WHERE idkost = $idkos');
	}
	function getidkost()
	{	$email=$this->session->userdata('email');
		$kueri=$this->db->query('SELECT * FROM tempat_kost WHERE email='.$email);
		$row = $kueri->row();
		return $row->idkost;
	}
        function get_all(){
        $email=$this->session->userdata('email');
        $sql = "SELECT * FROM tempat_kost WHERE email='".$email."'";
        return $this->db->query($sql)->result_array();
    }

	function add_kost(){
		$data=array(
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'kuota'=>$this->input->post('kuota'),
			'tersedia'=>$this->input->post('tersedia'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'email'=>$this->session->userdata('email')
			);
		$this->db->insert('tempat_kost',$data);
	}
		
	function getAllKamar($idkos){
		//$queri = $this->db->query('SELECT * FROM kamar_kost WHERE idKost='.$idkos);
		//foreach ($queri->result() as $row{
		//	$idkamar[] = $row->idkamar;
		//}
		return $idkos;
	}

	function getDeskripsi ($idkos){
		$queri = $this->db->query('SELECT deskripsi FROM tempat_kost WHERE idKost='.$idkos);
		$row = $queri->row();
		return $row->deskripsi;
	}
	function getNama($idkos){
		$queri = $this->db->query('SELECT nama FROM tempat_kost WHERE idKost='.$idkos);
		$row = $queri->row();
		return $row->nama;
	}
	
	function getkuota($idkos){
		$queri = $this->db->query('SELECT kuota FROM tempat_kost WHERE idKost='.$idkos);
		$row = $queri->row();
		return $row->kuota;
	}
	function getLokasi($idkos){
		$queri = $this->db->query('SELECT alamat FROM tempat_kost WHERE idKost='.$idkos);
		$row = $queri->row();
		return $row->alamat;
	}
	
	function getAllGambar($idkos){
		$queri = $this->db->query('SELECT nomor FROM gambar WHERE idKost='.$idkos);
		$gambars[]=0;
		foreach ($queri->result() as $row){
			$gambars[] = $row->nomor;
		}
		return $gambars;
	}
	
	function getAllGambarDes($idkos){
		$queri = $this->db->query('SELECT keterangan FROM gambar WHERE idKost='.$idkos);
		$gambars[]=0;
		foreach ($queri->result() as $row){
			$gambars[] = $row->keterangan;
		}
		return $gambars;
	}
	function getidkos(){
                $email = $this->session->userdata('email');		
		$queri = $this->db->query("SELECT * from tempat_kost WHERE email='".$email."'");
		$row = $queri->row();
		return $row->idkost;
		
	}
	function validate($idkos){
		$email = $this->session->userdata('email');
		$queri = $this->db->query("SELECT * from tempat_kost WHERE email='".$email."' AND idkost=".$idkos);
		if ($queri->num_rows() === 1) {
            return true;
        } else {
            return false;
        }
    }
        function insertkos($data){
        return $this->db->insert($this->tblname, $data);
    }
    function updatekos($data){
       /* $this->db->where('email', $data->email);*/
        $this->db->where('idkost', $data->idkost);
        return $this->db->update($this->tblname, $data);
    }

    function deletekos($data){
        return $this->db->delete($this->tblname, array('idkost' => $data->idkost));
    }

        function getidkosfromgambar($nomor){
            $email = $this->session->userdata('email');
            $queri = $this->db->query("SELECT distinct peg.idkost, peg.nama from (select idkost from tempat_kost where email='".$email."') as peg JOIN
                                        (SELECT idkost,nomor FROM gambar where nomor = '".$nomor."') as pen ON peg.idkost = pen.idkost");
            $row = $queri->row();
            return $row->idkost;
        }
        
	}
?>