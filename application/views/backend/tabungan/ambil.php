<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="tab-content">
            <div class="active fade show tab-pane tabs-animation" id="tab-content-0" role="tabpanel">
                <div class="card main-card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Form Ambil Data Tabungan</h5><?= $this->session->flashdata('pesan') ?><?php echo form_open('tabungan/save_tabungan_ambil'); ?><div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative"><label for="exampleIdJurusan">PERIODE</label> <select class="form-control" name="id_periode">
                                        <option>-- PILIH PERIODE --</option><?php $id_periode = $this->db->get('tb_periode')->result(); ?><?php foreach ($id_periode as $pe) : ?><option value="<?= $pe->id_periode ?>"><?= $pe->tahun_akademik ?></option><?php endforeach  ?>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">

                                    <label for="exampleDataList" class="form-label">Anggota</label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" name="id_user" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        <option>-- PILIH ANGGOTA --</option>
                                        <?php $id_user = $this->db->get('tb_users')->result(); ?><?php foreach ($id_user as $ro) : ?><option value="<?= $ro->id_user . '/' . $ro->nama ?>"><?= $ro->nama . " - " . $ro->level ?></option>
                                    <?php endforeach  ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative"><label for="exampleIdNama">Ambil Tabungan</label> <input class="form-control" name="jumlah_ambil" placeholder="Jumlah Pengambilan..." required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative"><label for="examplenis" class="">Waktu</label> <input class="form-control" name="waktu" placeholder="Waktu..." required id="examplenis" type="date"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative"><label for="keterangan" class="">Keterangan Tabungan</label> <select class="form-control" name="keterangan">
                                        <option>Pilih Keterangan</option>
                                        <option value="1">Tabungan Siswa</option>
                                        <option value="2">Tabungan Guru</option>
                                    </select></div>
                            </div>
                        </div><a class="btn btn-sm mt-2 btn-warning" href="<?php echo base_url('tabungan/index'); ?>"><i class="fas fa-arrow-left"></i> Kembali</a> <button class="btn btn-sm mt-2 btn-primary"><i class="fas fa-save"></i> Simpan Data Siswa</button><?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>