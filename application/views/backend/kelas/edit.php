<div class="app-main__outer"><div class="app-main__inner"><?php foreach($tb_kelas as $r){ ?><div class="tab-content"><div class="active fade show tab-pane tabs-animation"id="tab-content-0"role="tabpanel"><div class="card main-card mb-3"><div class="card-body"><h5 class="card-title">Form Edit Data Kelas</h5><?php echo form_open('kelas/sav_kelas/'.$r->id_kelas); ?><div class="form-row"><div class="col-md-6"><div class="form-group position-relative"><label class=""for="kelas">Kelas</label> <input class="form-control"name="kelas"value="<?php echo $r->kelas; ?>"></div></div></div><br><br><a class="btn btn-sm mt-2 btn-warning"href="<?php echo base_url('kelas/index'); ?>"><i class="fas fa-arrow-left"></i> Kembali</a> <button class="btn btn-sm mt-2 btn-primary"><i class="fas fa-save"></i> Simpan Data kelas</button><?php echo form_close(); ?></div></div><?php } ?></div></div></div>