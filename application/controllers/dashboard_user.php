<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_user extends CI_Controller {
 
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
        if($this->session->userdata('jenis')=='user')
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query('SELECT tempat_kost.nama, pendaftaran.status, pendaftaran.timestamp, pendaftaran.bataswaktu, pendaftaran.norekpemilik FROM pendaftaran,tempat_kost WHERE pendaftaran.idkost=tempat_kost.idkost AND pendaftaran.email="'.$email.'"');
			$config['base_url'] = base_url() . 'index.php/dashboard_user/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_user'] = $this->db->query('SELECT tempat_kost.nama, pendaftaran.status, pendaftaran.timestamp, pendaftaran.bataswaktu, pendaftaran.norekpemilik FROM pendaftaran,tempat_kost WHERE pendaftaran.idkost=tempat_kost.idkost AND pendaftaran.email="'.$email.'"');
			$this->load->view('dashboard_user/home',$d);
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