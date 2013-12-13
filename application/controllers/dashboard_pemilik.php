<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Pemilik extends CI_Controller {
 
      var $limit = 5; // jumlah data yg muncul
      var $pageshow = 2; // jumlah page yg muncul
      

    function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
        $this->load->model('Tempat_model', '', TRUE);
        $this->load->model('Kamar_model', '', TRUE);

		
    }
 
    public function index()
    {
		$email = $this->session->userdata('email');
		$this->load->model('pemilik_model','pemmod');
		$d['cek'] = $this->pemmod->cekcreate($email);
        if($this->session->userdata('jenis')=='pkost')
		{
			//$d['gambirs'] = $this->pemmod->getpic($email);
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
			$tot_hal = $this->db->query('SELECT nama,email, idkamar,kelamin,status,fakultas,bataswaktu  FROM pendaftaran WHERE idkost='.$idkos.' AND (status = "book" OR status = "siapbayar")');
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
			
			$d['data_user'] = $this->db->query('SELECT nama,email, idkamar,kelamin,status,fakultas,bataswaktu  FROM pendaftaran WHERE idkost='.$idkos.' AND (status = "book" OR status = "siapbayar")');
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
        function tempatkost(){
        $this->load->view('dashboard_pemilik/tempatkost_view');
    }
    function getdata(){

        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
        $page = isset($offset) ? $offset : 1;
        $kos = $this->Tempat_model->get_all();
        $totaldata = count($kos);
        $pagetotal = ceil($totaldata / $this->limit);
        $pageshow = $pagetotal > $this->pageshow ? $this->pageshow : $pagetotal;
        $step = floor($pageshow / 2);
        $pagestart = ($page - $step) > 1 ? $page - $step : 1;
        $pageend = ($page + $step) < $pagetotal ? $page + $step : $pagetotal;
        if($pageend - $pagestart + 1 < $pageshow) {
            $pageend = $pagestart + $pageshow - 1;
            $pageend = $pageend > $pagetotal ? $pagetotal : $pageend;

            if($pageend - $pagestart + 1 < $pageshow){
                $pagestart = $pageend - $pageshow - 1;
                $pagestart = $pagestart > 1 ? $pagestart : 1;
            }
        }
        if($pageend - $pagestart + 1 > $pageshow) {
            if($pageend == $pagetotal){
                $pagestart = $pageend - $pageshow + 1;
            }
        }

        $pagination = array();
        for($i=$pagestart; $i<=$pageend; $i++){
            $pagination[] = $i;
        }

        $data = array_slice($kos, ($page-1) * $this->limit, $this->limit);
        $vData = array(
            'page' => $page,
            'pagefirst' => 1,
            'pagelast' => $pagetotal,
            'pagination' => $pagination,
            'data' => $data,
        );
        echo  json_encode($vData);
    }

    function getdatakamar(){
        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
        $page = isset($offset) ? $offset : 1;
        $kamar = $this->Kamar_model->get_byidkost($this->uri->segment(4));
        $totaldata = count($kamar);
        $pagetotal = ceil($totaldata / $this->limit);
        $pageshow = $pagetotal > $this->pageshow ? $this->pageshow : $pagetotal;
        $step = floor($pageshow / 2);
        $pagestart = ($page - $step) > 1 ? $page - $step : 1;
        $pageend = ($page + $step) < $pagetotal ? $page + $step : $pagetotal;
        if($pageend - $pagestart + 1 < $pageshow) {
            $pageend = $pagestart + $pageshow - 1;
            $pageend = $pageend > $pagetotal ? $pagetotal : $pageend;

            if($pageend - $pagestart + 1 < $pageshow){
                $pagestart = $pageend - $pageshow - 1;
                $pagestart = $pagestart > 1 ? $pagestart : 1;
            }
        }
        if($pageend - $pagestart + 1 > $pageshow) {
            if($pageend == $pagetotal){
                $pagestart = $pageend - $pageshow + 1;
            }
        }

        $pagination = array();
        for($i=$pagestart; $i<=$pageend; $i++){
            $pagination[] = $i;
        }

        $data = array_slice($kamar, ($page-1) * $this->limit, $this->limit);
        $vData = array(
            'page' => $page,
            'pagefirst' => 1,
            'pagelast' => $pagetotal,
            'pagination' => $pagination,
            'data' => $data,
        );
        echo  json_encode($vData);
    }

    function insertdatakos(){
        $data = json_decode(file_get_contents("php://input"));
        $data->email = $this->session->userdata('email');
        echo  $this->Tempat_model->insertkos($data);
    }

    function updatekos(){
        $data = json_decode(file_get_contents("php://input"));
        echo  $this->Tempat_model->updatekos($data);
    }

    function deletekos(){
        $data = json_decode(file_get_contents("php://input"));
        echo  $this->Tempat_model->deletekos($data);
    }

    function insertdatakamar(){
        $data = json_decode(file_get_contents("php://input"));
        echo  $this->Kamar_model->insertkamar($data);
    }

    function updatekamar(){
        $data = json_decode(file_get_contents("php://input"));
        echo  $this->Kamar_model->updatekamar($data);
    }
    function deletekamar(){
        $data = json_decode(file_get_contents("php://input"));
        echo  $this->Kamar_model->deletekamar($data);
    }

}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */