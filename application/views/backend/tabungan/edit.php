<div class="app-main__outer">
    <div class="app-main__inner"><?php foreach ($datas as $r) : ?><div class="tab-content">
                <div class="active fade show tab-pane tabs-animation" id="tab-content-0" role="tabpanel">
                    <div class="card main-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Form Edit Data Tabungan Siswa</h5><?= $this->session->flashdata('pesan') ?><?php echo form_open('tabungan/update_t
                            
                            
                            
                            abungan/' . $r->id_tabungan); ?><div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="exampleIdJurusan">PERIODE</label> <select class="form-control" name="id_periode" disabled>
                                            <option>-- PILIH PERIODE --</option><?php $id_periode = $this->db->get('tb_periode')->result(); ?><?php foreach ($id_periode as $pe) : if ($pe->id_periode == $r->id_periode) {
                                                                                                                                                        $selected = 'selected';
                                                                                                                                                    } else {
                                                                                                                                                        $selected = '';
                                                                                                                                                    } ?><option value="<?= $pe->id_periode ?>" <?= $selected ?>><?= $pe->tahun_akademik ?></option><?php endforeach  ?>
                                        </select></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="exampleIdJurusan">ANGGOTA</label> <select class="form-control" name="id_user" disabled>
                                            <option>-- PILIH ANGGOTA --</option><?php $id_user = $this->db->get('tb_users')->result(); ?><?php foreach ($id_user as $row) : if ($row->id_user == $r->id_user) {
                                                                                                                                                    $selected = 'selected';
                                                                                                                                                } else {
                                                                                                                                                    $selected = '';
                                                                                                                                                } ?><option value="<?= $row->id_user ?>" <?= $selected ?>><?= $row->nama . "-" . $row->level ?></option><?php endforeach  ?>
                                        </select></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="exampleIdNama">Nabung</label> <input class="form-control" name="jumlah_nabung" placeholder="Jumlah Nabung..." value="<?php echo $r->jumlah_nabung  ?>"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="exampleIdNama">Ambil</label> <input class="form-control" name="jumlah_ambil" placeholder="Jumlah Ambil..." value="<?php echo $r->jumlah_ambil  ?>"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="examplenis" class="">Waktu</label> <input class="form-control" name="waktu" placeholder="Waktu..." value="<?= substr($r->waktu, 0, 10) ?>" id="examplenis" type="date"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label for="keterangan" class="">Keterangan Tabungan</label><?php if ($r->keterangan == "tabungan siswa") {
                                                                                                                                                $s1 = 'selected';
                                                                                                                                                $s2 = '';
                                                                                                                                            } else {
                                                                                                                                                $s2 = 'selected';
                                                                                                                                                $s1 = '';
                                                                                                                                            } ?><select class="form-control" name="keterangan">
                                            <option>Pilih Keterangan</option>
                                            <option value="1" <?= $s1 ?>>Tabungan Siswa</option>
                                            <option value="2" <?= $s2 ?>>Tabungan Guru</option>
                                        </select></div>
                                </div>
                            </div><a class="btn btn-sm mt-2 btn-warning" href="<?php echo base_url('tabungan/index'); ?>"><i class="fas fa-arrow-left"></i> Kembali</a> <button class="btn btn-sm mt-2 btn-primary"><i class="fas fa-save"></i> Simpan Data Siswa</button><?php echo form_close(); ?>
                        </div>
                    </div><?php endforeach  ?>
                </div>
            </div>
    </div>