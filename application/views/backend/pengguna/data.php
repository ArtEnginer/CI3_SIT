<div class="app-main__outer">
    <div class="app-main__inner">
        <h5>Data Pengguna Sistem</h5>
        <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card main-card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="search-wrapper">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Pencarian Data Pengguna</p><?php echo form_open('pengguna/cari') ?><div class="form-row">
                                            <div class="col-md-6">
                                                <div><input class="form-control" name="keyword" placeholder="Nama Pengguna.." required></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div><button class="btn btn-sm btn-success" type="submit">Cari <i class="fa fa-search"></i></button> <a href="<?= base_url('pengguna') ?>" class="btn btn-sm btn-warning pull-right">Refresh <i class="fa fa-undo"></i></a></div>
                                            </div>
                                        </div><?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;font-size:12px">NO</th>
                                        <th style="text-align:center;font-size:12px">USERNAME</th>
                                        <th style="text-align:center;font-size:12px">NAMA</th>
                                        <th style="text-align:center;font-size:12px">KELAS</th>
                                        <th style="text-align:center;font-size:12px">STATUS AKUN</th>
                                        <th style="text-align:center;font-size:12px">LEVEL</th>
                                        <th style="text-align:center;font-size:12px">MENDAFTAR</th>
                                        <th style="text-align:center;font-size:12px">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                        foreach ($datas as $r) { ?><tr>
                                            <td style="text-align:center;font-size:12px"><?php echo $i; ?></td>
                                            <td style="text-align:center;font-size:12px"><?php echo $r->username; ?></td>
                                            <td style="text-align:center;font-size:12px"><?php echo $r->nama; ?></td>
                                            <td style="text-align:center;font-size:12px"><?php echo $r->kelas; ?></td>
                                            <td style="text-align:center;font-size:12px"><?php if ($r->status_akun == 1) {
                                                                                                echo "Aktif";
                                                                                            } else {
                                                                                                echo "Tidak Aktif";
                                                                                            } ?></td>
                                            <td style="text-align:center;font-size:12px"><?php echo $r->level; ?></td>
                                            <td style="text-align:center;font-size:12px"><?php echo $r->mendaftar; ?></td>
                                            <td style="text-align:center;font-size:12px"><a href="<?php echo base_url('pengguna/editp/' . $r->id_user) ?>"><i class="fa fa-pen" title="Edit Data"></i></a> | <a href="<?php echo base_url('pengguna/hapuspengguna/' . $r->id_user) ?>" onclick='return confirm("Dengan menghapus data ini maka akan menghapus data tabungan dan pinjaman, apakah anda ingin menghapus data?")'><i class="fa fa-trash" title="Hapus Data "></i></a></td>
                                        </tr><?php $i++;
                                            } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>