<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data siswa</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('siswa/store'); ?>

    <div class="form-group">
      <label for="Nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
    </div>

    <div class="form-group">
      <label for="Nim">Nim</label>
      <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nim">
    </div>

    <div class="form-group">
      <label for="id_jenis">Jenis Siswa</label>
      <select name="id_jenis" class="form-control" required>
      <option selected> pilih jenis mahasiswa </option>
      <?php foreach($jenis_siswa as $key){ ?>
      <option value="<?php echo $key->id_jenis ;?>">  <?php echo $key->jenis_siswa ; ?></option>
      <?php } ?>
      </select>
    </div>


    <a class="btn btn-info" href="<?php echo site_url('siswa/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>