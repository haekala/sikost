<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
		$this->load->library('pagination');
    }
 
    public function index()
    {
        if($this->session->userdata('jenis')=="admin")
		{
			$d['success']='silahkan pilih salah satu pemilik kost';
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
			/*
			$tot_hal = $this->db->get("pemilik_kost");
			$config['base_url'] = base_url() . 'index.php/dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();*/
			$d["paginator"] ="";
			$d['data_pemilik'] = $this->db->query("select email, nama,  noTelp, namaKost from pemilik_kost WHERE verified=0");
			$this->load->view('dashboard_admin/home',$d);
		}

		else
		{
			header('location:'.base_url().'');
		}
  
    }
	public function verify($email)
	{
		
		$this->db->query("UPDATE  pemilik_kost SET  verified =  1 WHERE  email =  '".$email."'");
		redirect ('dashboard_admin/verification/success');
	}
	function verification($msg=NULL)
	{		
			if ($msg!=NULL)$d['success']='successfully verified 1 pemilik kost'; else $data['success'] = 'Pilih Pemilik Kost untuk disetujui';
			if($this->session->userdata('jenis')=="admin")
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
			/*
			$tot_hal = $this->db->get("pemilik_kost");
			$config['base_url'] = base_url() . 'index.php/dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();*/
			$d["paginator"] ="";
			$d['data_pemilik'] = $this->db->query("select email, nama,  noTelp, namaKost from pemilik_kost WHERE verified=0");
			$this->load->view('dashboard_admin/home',$d);
		}

		else
		{
			header('location:'.base_url().'');
		}
			
	}
	public function hapus($email)
	{
		$this->db->query("DELETE  FROM pemilik_kost  WHERE  email =  '".$email."'");
		redirect ('dashboard_admin/delete/success');
	}
	function delete($msg=NULL)
	{		
			if ($msg!=NULL)$d['success']='successfully deleted 1 pemilik kost'; else $data['success'] = 'Pilih Pemilik Kost';
			if($this->session->userdata('jenis')=="admin")
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
			/*
			$tot_hal = $this->db->get("pemilik_kost");
			$config['base_url'] = base_url() . 'index.php/dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();*/
			$d["paginator"] ="";
			$d['data_pemilik'] = $this->db->query("select email, nama,  noTelp, namaKost from pemilik_kost WHERE verified=0");
			$this->load->view('dashboard_admin/home',$d);
		}

		else
		{
			header('location:'.base_url().'');
		}
			
	}
	
	public function cari()
    {
        if($this->session->userdata('jenis')=="admin")
		{
			$d['success']='silahkan pilih salah satu pemilik kost';
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
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select email, nama, alamat, kuota from pemilik_kost where nama like '%".$kata."%' ");
			$config['base_url'] = base_url() . 'dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_pemilik'] = $this->db->query("select email, nama, noTelp, namaKost from pemilik_kost where nama like '%".$kata."%' ");
			$this->load->view('dashboard_admin/home',$d);
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