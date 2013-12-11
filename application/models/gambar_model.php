
	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
/* Author: Jorge Torres
 * Description: Login controller class
 */
class gambar_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }
	
	//fungsi untuk mengambil gambar-gambar yang untuk homeview.  1 kos 1 gambar
	public function getlargest()
	{
		$kueri1 = $this->db->query('SELECT * FROM gambar ORDER BY -nomor');
		$row = $kueri1->row();
		return $row->nomor;
	}
	
	public function add($nomor,$desk,$idkos){
		$data=array(
			'nomor'=>$nomor,
			'idkost'=>$idkos,
			'keterangan'=>$desk
			);
		$this->db->insert('gambar',$data);
	}
    public function getpic(){
		//mengambil satu gambar untuk satu idkos
		$kuerikos = $this->db->query('SELECT DISTINCT idkost FROM gambar');
		$i=1;
		foreach ($kuerikos->result() as $row)
		{
			$idkos = $row->idkost;
			
			$kueridua = $this->db->query('SELECT nomor FROM gambar WHERE idkost ='.$idkos);
			//append ke dalam array gambar
			$temp = $kueridua->row();
			$gambar[$i][1] = $temp->nomor;
			
			$kueritiga = $this->db->query('SELECT * FROM tempat_kost WHERE idkost='.$idkos);
			$temp2 = $kueritiga->row();
			$gambar[$i][2] = $temp2->nama;
			$gambar[$i][3] = $temp2->tersedia;
			$i++;
		}
		return $gambar;
	
	}
	
	//fungsi untuk mengambil idkos dari nomor gambar yang jadi input
	public function getidkos($gambar){
		$kueri = $this->db->query('SELECT idkost FROM gambar WHERE nomor='.$gambar);
		$row = $kueri->row();
		
		return $row->idkost;
	}
	
	}
?>