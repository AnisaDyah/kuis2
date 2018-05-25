<!-- jenis/edit.php -->

<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Edit Data jenis Siswa</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jenis/update/'.$data->id_jenis); ?>
    <?php echo form_hidden('id_jenis', $data->id_jenis) ?>
    <div class="form-group">
      <label for="jenis_siswa">Jenis Siswa</label>
      <input type="text" class="form-control" id="jenis_siswa" name="jenis_siswa" placeholder="Masukkan Jenis Siswa" value="<?php echo $data->jenis_siswa ?>">
    </div>
    
    <a class="btn btn-info" href="<?php echo site_url('jenis/') ?>">Kembali</a>
    <button type="submit" name="simpan" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>