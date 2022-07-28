<link href="<?php echo base_url('assets/arc/main.css'); ?>" rel="stylesheet">

<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="container mt-3">
      <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
          <div class="main-card mb-3 card">
            <div class="card-body">
              <h5 class="card-title">Form Registrasi Data Identitas </h5>
              <!-- <form class="" > -->
              <div class="col-md-6"><?php echo $this->session->flashdata('pesan'); ?></div>

              <!-- isi form -->

              <?php echo form_open_multipart('login/save_akundata'); ?>




              <div class="form-group row">

                <div class="col-sm-3 mb-3 mb-sm-0">
                  <input type="text" name="nama" class="form-control form-control-user" id="nama_lengkap" placeholder="Nama Lengkap Pendaftar..." required>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <textarea name="alamat" placeholder="Alamat..." class="form-control"></textarea>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <input type="number" name="telepon" class="form-control" placeholder="No. Telepon...">
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <!-- <label>Jenis Kelamin</label><br> -->
                  <select name="jk" class="form-control">
                    <option>-- Jenis Kelamin --</option>
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>





              </div>
              <div class="form-group row">

                <div class="col-sm-3 mb-3 mb-sm-0">
                  <?php $jurusan = $this->db->get('tb_jurusan')->result(); ?>
                  <select name="id_jurusan" class="form-control">
                    <option>JURUSAN</option>
                    <?php foreach ($jurusan as $ju) : ?>
                      <option value="<?php echo $ju->id_jurusan; ?>"><?php echo $ju->jurusan; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-sm-3 mb-3 mb-sm-0">

                  <?php $kelas = $this->db->get('tb_kelas')->result(); ?>
                  <select name="id_kelas" class="form-control">
                    <option>KELAS</option>
                    <?php foreach ($kelas as $ke) : ?>
                      <option value="<?php echo $ke->id_kelas; ?>"><?php echo $ke->kelas; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username Pendaftar..." required>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password Pendaftar..." required>
                </div>

              </div>



              <!-- <div class="form-group row">

                </div> -->



              <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <label>No. Rekening</label>
                  <input type="text" name="norek" class="form-control" placeholder="Nomor Rekening Tabungan..." required>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <label>Pilih Status Daftar</label><br>
                  <select name="level" class="form-control">
                    <option>-- Mendaftar Sebagai : --</option>
                    <option value="2">Siswa</option>
                    <option value="3">Guru</option>
                  </select>
                </div>


                <div class="col-sm-4 mb-3 mb-sm-0">
                  <label>Foto : Ukuran 3 x 4 .jpeg / .png / .jpg</label>
                  <input type="file" name="foto" class="form-control" required>
                </div>
              </div>
              <!-- <div class="form-group row"> -->
              <!-- <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div> -->
              <!-- </div> -->
              <a href="<?php echo base_url('login'); ?>" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
              <button type="submit" class="btn btn-primary btn-sm">Simpa Data</button>

              <?php echo form_close(); ?>


              <!-- end form -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>