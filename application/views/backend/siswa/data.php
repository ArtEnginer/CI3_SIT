<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>
        <h5>Data Siswa</h5>
        <div class="row">
            <div class="col-lg-12">
                <div class="card main-card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="search-wrapper">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Pencarian Data Siswa</p><?php echo form_open('siswa/cari') ?><div class="form-row">
                                            <div class="col-md-6">
                                                <div><input class="form-control" name="keyword" placeholder="Nama Siswa.." required></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div><button class="btn btn-sm btn-success" type="submit">Cari <i class="fa fa-search"></i></button> <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-warning pull-right">Refresh <i class="fa fa-undo"></i></a></div>
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
                                        <th style="font-size:12px">NO</th>
                                        <th style="font-size:12px">NAMA SISWA</th>
                                        <th style="font-size:12px">NO. REKENING</th>
                                        <th style="font-size:12px">KELAS</th>
                                        <th style="font-size:12px">JURUSAN</th>
                                        <th style="font-size:12px">JENIS KELAMIN</th>
                                        <th style="font-size:12px">FOTO</th>
                                        <th style="font-size:12px">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                        foreach ($datas as $r) { ?><tr>
                                            <td style="font-size:12px"><?php echo $i; ?></td>
                                            <td style="font-size:12px"><?php echo $r->nama; ?></td>
                                            <td style="font-size:12px"><?php echo $r->norek; ?></td><?php if (empty($r->kelas)) { ?><td style="font-size:12px"><?php echo " -"; ?></td><?php } elseif ($r->kelas) { ?><td style="font-size:12px"><?php echo $r->kelas; ?></td><?php } ?><?php if (empty($r->jurusan)) { ?><td style="font-size:12px"><?php echo "-"; ?></td><?php } elseif ($r->jurusan) { ?><td style="font-size:12px"><?php echo $r->jurusan; ?></td><?php } ?><td style="font-size:12px"><?php echo $r->jk; ?></td>
                                            <td style="font-size:12px"><img src="<?= base_url('upload/identitas/' . $r->foto) ?>" width="50px"></td>
                                            <td style="font-size:12px" class="text-center"><a href="<?php echo base_url('siswa/edit/' . $r->id_user); ?>"><i class="fa fa-pen" title="Edit Data Siswa"></i></a> | <a href="<?php echo base_url('siswa/tabungan?id=' . $r->id_user); ?>"><i class="fa fa-book" title="Data Tabungan"></i></a> | <a href="<?php echo base_url('siswa/pinjaman?id=' . $r->id_user); ?>"><i class="fa fa-folder" title="Data Pinjaman"></i></a></td>
                                        </tr><?php $i++;
                                            } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>