<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar Siswa</legend>
  <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("siswa/search", $attr);?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="nama" name="nama" placeholder="Search for Student Name..." type="text" value="<?php echo set_value('nama'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "index.php/siswa/index"; ?>" class="btn btn-primary">Show All</a>
                </div>
            </div>
        
        </div>
    </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($namelist)) { ?>
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
        <?php $number = 1; foreach($namelist as $row) { ?>
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