
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation');
  $this->load->model('siswa_model');
}
    public function index()
    {
        
        $this->load->model('siswa_model');
        
        $siswa= $this->siswa_model->list();
        $jenis_siswa = $this->siswa_model->jenis_siswa();
  $data = [
    'title' => 'Pemrograman Web Framework :: Data siswa',
    'siswa' => $siswa,
    'jenis_siswa' => $jenis_siswa
  ];
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



}

/* End of file Controllername.php */

