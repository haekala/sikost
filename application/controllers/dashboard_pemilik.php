<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Pemilik extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
		
    }
 
    public function index()
    {
	
		$email = $this->session->userdata('email');
		$this->load->model('pemilik_model','pemmod');
		$d['cek'] = $this->pemmod->cekcreate($email);
        if($this->session->userdata('jenis')=='pkost')
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			$this->load->model('tempat_model','temmod');
			if($d['cek']==true){$idkos=0;}else{
			$idkos=$this->temmod->getidkos();}
			$d['idkos'] = $idkos;
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query('select nama,email, idkamar,kelamin,status,fakultas,bataswaktu  FROM pendaftaran WHERE idkost='.$idkos.' AND (status = "book" OR status = "siapbayar")');
			$config['base_url'] = base_url() . 'index.php/dashboard_pemilik/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_user'] = $this->db->query('select nama,email, idkamar,kelamin,status,fakultas,bataswaktu  FROM pendaftaran WHERE idkost='.$idkos.' AND (status = "book" OR status = "siapbayar")');
			$this->load->view('dashboard_pemilik/home',$d);
		}

		else
		{
			header('location:'.base_url().'');
		}
  
    }
	
	public function cari()
    {
	
		$email = $this->session->userdata('email');
		$this->load->model('pemilik_model','pemmod');
		$d['cek'] = $this->pemmod->cekcreate($email);
        if($this->session->userdata('jenis')=='pkost')
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("cari");
				$this->session->set_userdata($sess_data);
				$kata = $this->session->userdata('kata');
			}
			
			$this->load->model('tempat_model','temmod');
			$idkos=$this->temmod->getidkos();
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$idkos=$this->temmod->getidkos();
			$d['idkos'] = $idkos;
			$d['tot'] = $offset;
			$tot_hal = $this->db->query('select nama,email, idkamar,kelamin,status,fakultas,bataswaktu  FROM pendaftaran WHERE idkost='.$idkos.' AND (status = "book" OR status = "siapbayar") AND idkamar like "%'.$kata.'%"');
			$config['base_url'] = base_url() . 'index.php/dashboard_pemilik/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_user'] = $this->db->query('select nama,email, idkamar,kelamin,status,fakultas,bataswaktu  FROM pendaftaran WHERE idkost='.$idkos.' AND (status = "book" OR status = "siapbayar") AND idkamar like "%'.$kata.'%"');
			$this->load->view('dashboard_pemilik/home',$d);
		}

		else
		{
			header('location:'.base_url().'');
		}
  
  
    }
	
	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */