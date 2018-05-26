<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    public function list($limit, $start)
{
  $query = $this->db->get('data_siswa',$limit, $start);
  return ($query->num_rows() > 0) ? $query->result() : false;
}

public function insert($data = [])
{
  $result = $this->db->insert('data_siswa', $data);
  return $result;
}

public function show($id)
{
  $this->db->where('id', $id);
  $query = $this->db->get('data_siswa');
  return $query->row();
}

public function update($id, $data = [])
{
   
  $data = [
  'nama' => $this->input->post('nama'),
  'nim' => $this->input->post('nim'),
  'id_jenis' => $this->input->post('id_jenis')
  ];
    
    $this->db->where('id', $id);
    $this->db->update('data_siswa', $data);
    
  // TODO: set data yang akan di update
  // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data
}


public function delete($id)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('id', $id);
      $query= $this->db->delete('data_siswa');
     
}

    public function jenis_siswa()
{
  $query = $this->db->get('jenis');
  return $query->result();
}

public function getTotal()
{
  return $this->db->count_all('data_siswa');
}


    


}

/* End of file ModelName.php */
