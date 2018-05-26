<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar Siswa</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($siswa)) { ?>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Nim</th>
        <th>Jenis Siswa</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('siswa/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($siswa as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('siswa/show/'.$row->id) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('siswa/show/'.$row->id) ?>">
              <?php echo $row->nama ?>
            </a>
          </td>
           <td>
            <a href="<?php echo site_url('siswa/show/'.$row->id) ?>">
              <?php echo $row->nim ?>
            </a>
          </td>
           <td>
            <a href="<?php echo site_url('siswa/show/'.$row->id) ?>">
              <?php foreach($jenis_siswa as $key){ 
        if($key->id_jenis == $row->id_jenis){
          echo $key->jenis_siswa;
        }

        }?>
            </a>
          </td>
          <td>
            <?php echo form_open('siswa/destroy/'.$row->id)  ?>
            <a class="btn btn-info" href="<?php echo site_url('siswa/edit/'.$row->id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>