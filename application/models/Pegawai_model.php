<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function list()
{
  $query = $this->db->get('pegawai');
  return $query->result();
}

public function insert($data = [])
{
  $result = $this->db->insert('pegawai', $data);
  return $result;
}

public function show($id)
{
  $this->db->where('id', $id);
  $query = $this->db->get('pegawai');
  return $query->row();
}

public function update($id, $data = [])
{
   
        $data = ['nama' => $this->input->post('nama')];
    
    $this->db->where('id', $id);
    $this->db->update('pegawai', $data);
    
  // TODO: set data yang akan di update
  // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data
}


public function delete($id)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('id', $id);
      $query= $this->db->delete('pegawai');
     
}

    


}

/* End of file ModelName.php */
