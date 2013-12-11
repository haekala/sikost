<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Copyright (c) 2008 - 2011, EllisLab, Inc.
*All rights reserved.
*/
class tempatkost extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tempat_model');
	}
	public function index()
	{
	}
	
	
	public function editkost(){
		$data['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$data['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$data['instansi'] = $this->config->item('nama_instansi');
		$data['credit'] = $this->config->item('credit_aplikasi');
		$data['alamat'] = $this->config->item('alamat_instansi');
		$email = $this->session->userdata('email');
		$queri = $this->db->query('SELECT nama, kuota, tersedia, alamat, deskripsi FROM tempat_kost WHERE email="'.$email.'"');
		$row = $queri->row();
		$data['isinama'] = $row->nama;
		
		$data['isikuota'] = $row->kuota;
		
		$data['isitersedia'] = $row->tersedia;
		
		$data['isialamat'] = $row->alamat;
		
		$data['isideskripsi'] = $row->deskripsi;
		$this->load->view('editkos',$data);
	}
	public function edit(){
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$idkamar=$this->input->post('idkamar');
		$this->form_validation->set_rules('nama', 'Your Kost Name', 'trim|required');
		$this->form_validation->set_rules('kuota', 'Kost Capacity', 'trim');
		$this->form_validation->set_rules('tersedia', 'Available Rooms', 'required');
		$this->form_validation->set_rules('alamat', 'Address', 'trim|required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('deskripsi','Kost Description','required');
		if($this->form_validation->run() == FALSE)
		{
					$this->editkost();
		}
		else
		{
			$email = $this->session->userdata('email');
			$nama=$this->input->post('nama');
			$kuota=$this->input->post('kuota');
			$tersedia=$this->input->post('tersedia');
			$deskripsi=$this->input->post('deskripsi');
			$alamat=$this->input->post('alamat');
		$this->db->query('UPDATE tempat_kost SET nama="'.$nama.'", kuota="'.$kuota.'", tersedia="'.$tersedia.'",deskripsi="'.$deskripsi.'",alamat="'.$alamat.'" WHERE email="'.$email.'"');
			redirect('home');
		}
	}
	public function create(){
	$data['msg']=NUll;
			$data['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$data['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$data['instansi'] = $this->config->item('nama_instansi');
		$data['credit'] = $this->config->item('credit_aplikasi');
		$data['alamat'] = $this->config->item('alamat_instansi');
		$this->load->view('registrasi/kost',$data);
	}
	public function updateKost($idkost){
	//view Update Konten Kost POST kesini
	//perlu input idKOST
		$this->load->model('tempat_model','tkos');
		//pakai fungsi renew di model
		$this->tkos->renew($idkost);
		//redirect ke view deskripsi kost
		$this->load->view('deskripsiView');
	}
	public function createKost(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'User Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('kuota', 'kuota', 'trim|required');
		$this->form_validation->set_rules('tersedia', 'Room Vacancy', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Kost Capacity', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Kost address', 'trim|required|max_length[100]');
		if($this->form_validation->run() == FALSE)
		{
			
			
			$this->create();
		}
		else
		{
			$data=array(
			'nama'=>$this->input->post('nama'),
			'kuota'=>$this->input->post('kuota'),
			'email'=>$this->session->userdata('email'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'tersedia'=>$this->input->post('tersedia'),
			'alamat'=>$this->input->post('alamat'),
			);
		$this->db->insert('tempat_kost',$data);
			
			redirect('imageuploader');
		}
	}
	public function deleteKost($idKost){
		$this->load->model('tempat_model','tkos');
		//pakai fungsi del di model
		$this->tkos->del($idkost);
		//redirect ke view deskripsi kost
		$this->load->view('deskripsiView');
	
	}
	public function deskripsi ($gambar){
		$this->load->library('pagination');
		$this->load->model('gambar_model','gammod');
		$idkos = $this->gammod->getidkos($gambar);
		$this->load->model('tempat_model','kos');
		$data['tombol']='<a href="'.base_url().'index.php/Registrasi/index/'.$idkos.'	"><button class="btn btn-primary "><i class="icon-book icon-white"></i> book Kost</button> </a>';
		$data['tombol2']='<a href="'.base_url().'index.php/tempatkost/editkost"><button class="btn btn-primary "><i class="icon-pencil icon-white"></i> Edit Kost</button> </a>';
		$data['tombol3']='<a href="'.base_url().'index.php/tempatkost/tambahkamar"><button class="btn btn-primary "><i class="icon-pencil icon-white"></i> tambah kamar</button> </a>';
		//ambil gambar
		//start
		if(true)
		{
			$data['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$data['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$data['instansi'] = $this->config->item('nama_instansi');
			$data['credit'] = $this->config->item('credit_aplikasi');
			$data['alamat'] = $this->config->item('alamat_instansi');
			
			$page=$this->uri->segment(4);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$data['tot'] = $offset;
			$tot_hal = $this->db->query('select idkamar, harga, status, fasilitas from kamar_kost WHERE idKost='.$idkos);
			$config['base_url'] = base_url() . 'index.php/tempatkost/deskripsi/'.$gambar.'/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			$data['data_kamar'] = $this->db->query('select idkamar, harga, status, fasilitas from kamar_kost WHERE idKost='.$idkos);
			$data['tes']="gila";
		}

		else
		{
			header('location:'.base_url().'');
		}
		//end
		$data['gambars'] = $this->kos->getAllGambar($idkos);
		$data['desgambars']=$this->kos->getAllGambarDes($idkos);
		$data['deskripsi'] = $this->kos->getDeskripsi($idkos);
		$data['nama']=$this->kos->getNama($idkos);
		$data['lokasi']=$this->kos->getLokasi($idkos);
		$data['kuota']=$this->kos->getKuota($idkos);
		$data['kamars']=$this->kos->getAllKamar($idkos);
		$data['nomorgambar']=$gambar;
		$data['idkos']=$idkos;
		//tadinya ada tabel2antable2an dah diapus
		//end table2an
		//mengecek apakah user pemilik kost dari idkos ini
		$data['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$data['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$data['instansi'] = $this->config->item('nama_instansi');
		$data['credit'] = $this->config->item('credit_aplikasi');
		if ($this->kos->validate($idkos)) $this->load->view('deskripsiPK_view',$data);
		else $this->load->view('deskripsix',$data);
	}
	
	public function tambahkamar(){
		$data['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$data['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$data['instansi'] = $this->config->item('nama_instansi');
		$data['credit'] = $this->config->item('credit_aplikasi');
		$data['alamat'] = $this->config->item('alamat_instansi');
		$this->load->view('tambahkamar',$data);
	}
	public function tambah(){
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$idkamar=$this->input->post('idkamar');
		$this->form_validation->set_rules('idkamar', 'Room Name', 'trim|required');
		$this->form_validation->set_rules('harga', 'Room Price', 'trim');
		$this->form_validation->set_rules('fasilitas','Room Fasilitas','required');
		if($this->form_validation->run() == FALSE)
		{
					$this->tambahkamar();
		}
		else
		{
			$email = $this->session->userdata('email');
			$kueri = $this->db->query('SELECT idkost FROM tempat_kost WHERE email="'.$email.'"');
			$row = $kueri->row();
			$idkos = $row->idkost;
			//cek
			

			
			$idkamar=$this->input->post('idkamar');
			$harga=$this->input->post('harga');
			$fasilitas=$this->input->post('fasilitas');
			$str = implode (", ", $fasilitas);
			$this->db->query('INSERT INTO kamar_kost (idkamar,harga,fasilitas,idkost) VALUES ("'.$idkamar.'","'.$harga.'","'.$str.'","'.$idkos.'")');
			$this->db->query('UPDATE tempat_kost SET tersedia=tersedia+1 WHERE idKost="'.$idkos.'"');
			redirect('home');
		}
	}
}
?>