<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar jenis</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Jenis Siswa</th>
       
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('jenis/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($jenis as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('jenis/show/'.$row->id_jenis) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jenis/show/'.$row->id_jenis) ?>">
              <?php echo $row->jenis_siswa ?>
            </a>
          </td>
         
          <td>
            <?php echo form_open('jenis/destroy/'.$row->id_jenis)  ?>
            <a class="btn btn-info" href="<?php echo site_url('jenis/edit/'.$row->id_jenis) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>