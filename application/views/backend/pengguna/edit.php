<div class="app-main__outer">
    <div class="app-main__inner"><?php foreach ($datas as $r) : ?><div class="tab-content">
                <div class="active fade show tab-pane tabs-animation" id="tab-content-0" role="tabpanel">
                    <div class="card main-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Form Edit Akun Pengguna</h5>
                            <div class="col-md-6"><?php echo $this->session->flashdata('pesan'); ?></div><?php echo form_open('pengguna/update_pengguna/' . $r->id_user); ?><div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative"><label class="" for="">Status Akun</label> <select class="form-control" name="status_akun">
                                            <option>PILih STATUS AKUN</option>
                                            <option value="1">AKTIF</option>
                                            <option value="2">TIDAK AKTIF</option>
                                        </select></div>
                                </div>
                            </div><br><br><a class="btn btn-sm mt-2 btn-warning" href="<?php echo base_url('pengguna/index'); ?>"><i class="fas fa-arrow-left"></i> Kembali</a> <button class="btn btn-sm mt-2 btn-primary"><i class="fas fa-save"></i> Simpan Data</button><?php echo form_close(); ?>
                        </div>
                    </div><?php endforeach  ?>
                </div>
            </div>
    </div>