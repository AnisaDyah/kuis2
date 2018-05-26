<?php $this->load->view('layouts/base_start') ?>


<div class="container">
  <legend>Lihat Pegawai</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama">Nama</label>
      <p><?php echo $data->nama ?></p>
    </div>
    <div class="form-group">
      <label for="nama">NIM</label>
      <p><?php echo $data->nim ?></p>
    </div>
    <div class="form-group">
      <label for="nama">Jenis Siswa</label>
      <p>
      <?php foreach($jenis_siswa as $key){ 
      	if($key->id_jenis == $data->id_jenis){
      		echo $key->jenis_siswa;
      	}

      	}?>
      	</p>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('siswa/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>