
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class jenis extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation');
  $this->load->model('jenis_model');
}
    public function index()
    {
        
        $this->load->model('jenis_model');
        
        $jenis= $this->jenis_model->list();
  $data = [
    'title' => 'Pemrograman Web Framework :: Data jenis',
    'jenis' => $jenis
  ];
  $this->load->view('jenis/index', $data);
    }

    public function create()
{
  $this->load->view('jenis/create');
}

public function store()
{
  $data = [
    'jenis_siswa' => $this->input->post('jenis_siswa')
  ];
  $rules = [
    [
      'field' => 'jenis_siswa',
      'label' => 'Jenis Siswa',
      'rules' => 'trim|required'
    ]
  ];
  // Untuk rule sederhana bisa dengan menggunakan
  // $this->form_valid_jenisation->set_rules('nama', 'Nama', 'trim|required');
  $this->form_validation->set_rules($rules);

  if ($this->form_validation->run()) {
      
      $this->load->model('jenis_model');
      
    $result = $this->jenis_model->insert($data);
    if ($result) {
      redirect('jenis');
    }
  } else {
    redirect('jenis/create');
  }
}

public function show($id_jenis)
{
    
    $this->load->model('jenis_model');
    
    $jenis= $this->jenis_model->show($id_jenis);
  $data = [
    'data' => $jenis
  ];
  $this->load->view('jenis/show', $data);
}

public function edit($id_jenis)
    {
      // TODO: tampilkan view edit data
      
      $this->load->model('jenis_model');
      $jenis= $this->jenis_model->show($id_jenis);
      $data = [
        'data' => $jenis
      ];
      if(isset($_POST['simpan'])){
          $this->update($id_jenis);
          redirect('jenis');
      }

      $this->load->view('jenis/edit',$data);
      
      
    }

    public function update($id_jenis)
    {
      // TODO: implementasi update data berdasarkan $id_jenis
      
     $this->load->model('jenis_model');
     $jenis= $this->jenis_model->update($id_jenis, $data = []);
     
     redirect('jenis');
     
    }

    public function destroy($id_jenis)
    {
      // TODO: implementasi penghapusan data berdasarkan $id_jenis
      $this->load->model('jenis_model');
      $jenis= $this->jenis_model->delete($id_jenis);
      redirect('jenis');
     
    }



}

/* End of file Controllername.php */

