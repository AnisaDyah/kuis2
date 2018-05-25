<?php $this->load->view('layouts/base_start') ?>
<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Lihat Pegawai</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama">Nama</label>
      <p><?php echo $data->nama ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('pegawai/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>