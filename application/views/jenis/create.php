<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data siswa</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jenis/store'); ?>

    <div class="form-group">
      <label for="jenis_siswa">Jenis Siswa</label>
      <input type="text" class="form-control" id="jenis_siswa" name="jenis_siswa" placeholder="Masukkan Jenis Siswa">
    </div>



    <a class="btn btn-info" href="<?php echo site_url('jenis/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>