<div class="app-main__outer"><div class="app-main__inner"><?php foreach($datas as $r){ ?><div class="tab-content"><div class="active fade show tab-pane tabs-animation"id="tab-content-0"role="tabpanel"><div class="card main-card mb-3"><div class="card-body"><h5 class="card-title">Form Edit Data Periode</h5><?php echo form_open('Periode/sav_periode/'.$r->id_periode); ?><div class="form-row"><div class="col-md-6"><div class="form-group position-relative"><label class=""for="exampleTahun">Tahun</label> <input class="form-control"id="exampleJenisTahun"name="tahun_akademik"value="<?php echo $r->tahun_akademik; ?>"></div></div></div><div class="form-row"><div class="col-lg-4"><div class="form-group position-relative"><label class=""for="exampleSemester">Semester</label> <select class="form-control"name="semester"><option value="1"<?php echo($r->semester=='ganjil')?"selected":"" ?>>Ganjil</option><option value="2"<?php echo($r->semester=='genap')?"selected":"" ?>>Genap</option></select></div></div></div><div class="form-row"><div class="col-lg-4"><div class="form-group position-relative"><label class=""for="exampleSemester">Status Periode</label> <select class="form-control"name="status_periode"><option value="1"<?php echo($r->status_periode=='AKTIF')?"selected":"" ?>>Aktif</option><option value="2"<?php echo($r->status_periode=='TIDAK AKTIF')?"selected":"" ?>>Tidak Aktif</option></select></div></div></div><div class="form-row"><div class="col-lg-4"><div class="form-group position-relative"><label class=""for="exampleTahun">Periode Awal</label> <input class="form-control"id="examplePeriode"name="periode_awal"value="<?php echo $r->periode_awal  ?>"placeholder="Periode Awal..."type="date"></div></div></div><div class="form-row"><div class="col-lg-4"><div class="form-group position-relative"><label class=""for="exampleTahun">Periode Akhir</label> <input class="form-control"id="examplePeriode"name="periode_akhir"value="<?php echo $r->periode_akhir  ?>"placeholder="Periode Ahir..."type="date"></div></div></div><a class="btn btn-sm mt-2 btn-warning"href="<?php echo base_url('Periode/index'); ?>"style="font-size:12px"><i class="fas fa-arrow-left"></i> Kembali</a> <button class="btn btn-sm mt-2 btn-primary"style="font-size:12px"><i class="fas fa-save"></i> Simpan Data Periode</button><?php echo form_close(); ?></div></div></div><?php } ?></div></div>