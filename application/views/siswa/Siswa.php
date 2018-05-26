
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation','pagination');
  $this->load->model('siswa_model');
}
    public function index()
    {
      $total = $this->siswa_model->getTotal();
      if ($total > 0) {
                    $limit = 2;
                    $start = $this->uri->segment(3, 0);
        
                    $config = [
                      'base_url' => base_url() . 'index.php/siswa/index',
                      'total_rows' => $total,
                      'per_page' => $limit,
                     'uri_segment' => 3,
      
                      // Bootstrap 3 Pagination
                      'first_link' => '&laquo;',
                      'last_link' => '&raquo;',
                      'next_link' => 'Next',
                      'prev_link' => 'Prev',
                      'full_tag_open' => '<ul class="pagination">',
                      'full_tag_close' => '</ul>',
                      'num_tag_open' => '<li>',
                      'num_tag_close' => '</li>',
                      'cur_tag_open' => '<li class="active"><span>',
                      'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                      'next_tag_open' => '<li>',
                      'next_tag_close' => '</li>',
                      'prev_tag_open' => '<li>',
                      'prev_tag_close' => '</li>',
                      'first_tag_open' => '<li>',
                      'first_tag_close' => '</li>',
                      'last_tag_open' => '<li>',
                      'last_tag_close' => '</li>',
                   ];
                    $this->pagination->initialize($config);

        $this->load->model('siswa_model');
        $siswa= $this->siswa_model->list($limit,$start);
        $jenis_siswa = $this->siswa_model->jenis_siswa();
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data = [
    'title' => 'Pemrograman Web Framework :: Data siswa',
    'siswa' => $siswa,
    'jenis_siswa' => $jenis_siswa,
    'links' => $this->pagination->create_links(),
    'namelist' => $this->siswa_model->get_nama($config["per_page"], $data['page'], NULL)
  ];
}
  $this->load->view('siswa/index', $data);
    }

    public function create()
{
	$this->load->model('siswa_model');
	$data =[
	'jenis_siswa' => $this->siswa_model->jenis_siswa()
	];
  	$this->load->view('siswa/create',$data);
}

public function store()
{
  $data = [
  'nama' => $this->input->post('nama'),
  'nim' => $this->input->post('nim'),
  'id_jenis' => $this->input->post('id_jenis')
  ];
  $rules = [
    [
      'field' => 'nama',
      'label' => 'Nama',
      'rules' => 'trim|required'
    ]
  ];
  // Untuk rule sederhana bisa dengan menggunakan
  // $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
  $this->form_validation->set_rules($rules);

  if ($this->form_validation->run()) {
      
      $this->load->model('siswa_model');
      
    $result = $this->siswa_model->insert($data);
    if ($result) {
      redirect('siswa');
    }
  } else {
    redirect('siswa/create');
  }
}

public function show($id)
{
    
    $this->load->model('siswa_model');
    
    $siswa= $this->siswa_model->show($id);
	$jenis_siswa = $this->siswa_model->jenis_siswa();
	
  $data = [
    'data' => $siswa,
    'jenis_siswa'=>$jenis_siswa
  ];
  $this->load->view('siswa/show', $data);
}

public function edit($id)
    {
      // TODO: tampilkan view edit data
      
      $this->load->model('siswa_model');
      $siswa= $this->siswa_model->show($id);
      $jenis_siswa = $this->siswa_model->jenis_siswa();
      $data = [
        'data' => $siswa,
        'jenis_siswa'=>$jenis_siswa
      ];
      if(isset($_POST['simpan'])){
          $this->update($id);
          redirect('siswa');
      }

      $this->load->view('siswa/edit',$data);
      
      
    }

    public function update($id)
    {
      // TODO: implementasi update data berdasarkan $id
      
     $this->load->model('siswa_model');
     $siswa= $this->siswa_model->update($id, $data = []);
     
     redirect('siswa');
     
    }

    public function destroy($id)
    {
      // TODO: implementasi penghapusan data berdasarkan $id
      $this->load->model('siswa_model');
      $siswa= $this->siswa_model->delete($id);
      redirect('siswa');
     
    }

    public function search()
    {
        // get search string
        $search = ($this->input->post("nama"))? $this->input->post("nama") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $limit = 2;
        $config['base_url'] = site_url("siswa/search/$search");
        $config['total_rows'] = $this->siswa_model->get_nama_count($search);
        $config['per_page'] = $limit;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['jenis_siswa'] = $this->siswa_model->jenis_siswa();
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get nama list
        $data['namelist'] = $this->siswa_model->get_nama($config['per_page'], $data['page'], $search);

        $data['links'] = $this->pagination->create_links();

        //load view
        $this->load->view('siswa/index',$data);
    }

}

/* End of file Controllername.php */

