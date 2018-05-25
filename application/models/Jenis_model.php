<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

    public function list()
{
  $query = $this->db->get('jenis');
  return $query->result();
}

public function insert($data = [])
{
  $result = $this->db->insert('jenis', $data);
  return $result;
}

public function show($id_jenis)
{
  $this->db->where('id_jenis', $id_jenis);
  $query = $this->db->get('jenis');
  return $query->row();
}

public function update($id_jenis, $data = [])
{
   
        $data = ['jenis_siswa' => $this->input->post('jenis_siswa')];
    
    $this->db->where('id_jenis', $id_jenis);
    $this->db->update('jenis', $data);
    
  // TODO: set data yang akan di update
  // https://www.codeigniter.com/userguid_jenise3/database/query_builder.html#updating-data
}


public function delete($id_jenis)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('id_jenis', $id_jenis);
      $query= $this->db->delete('jenis');
     
}

    


}

/* End of file ModelName.php */
