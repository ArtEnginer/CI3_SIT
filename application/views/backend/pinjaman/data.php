<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>
        <h5>Data Pinjaman</h5>
        <div class="row">
            <div class="col-lg-12">
                <div class="card main-card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="search-wrapper">
                                <div class="row">

                                    <div class="col-md-8"><?php if ($this->session->userdata('level') == "admin") { ?><p>Pencarian Data Pinjaman</p>
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pdf-tab" data-toggle="tab" data-target="#pdf" type="button" role="tab" aria-controls="pdf" aria-selected="true">
                                                        <!-- fa file pdf -->
                                                        <i class="fas fa-file-pdf"></i>
                                                        Print/Pdf
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="excel-tab" data-toggle="tab" data-target="#excel" type="button" role="tab" aria-controls="excel" aria-selected="false"> <i class="fas fa-file-excel"></i>
                                                        Excel</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="pdf" role="tabpanel" aria-labelledby="pdf-tab"><?php echo form_open('pinjaman/cetakpinjaman') ?><div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="form-group position-relative"><input class="form-control" name="k1" placeholder="Nama Anggota.." required type="date"></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group position-relative"><input class="form-control" name="k2" placeholder="Nama Anggota.." required type="date"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group position-relative"><button class="btn btn-sm btn-success" type="submit">Cetak <i class="fa fa-print"></i></button></div>
                                                        </div>
                                                    </div><?php echo form_close(); ?>
                                                </div>
                                                <div class="tab-pane fade" id="excel" role="tabpanel" aria-labelledby="excel-tab">
                                                    <div class="tab-pane fade show active" id="pdf" role="tabpanel" aria-labelledby="pdf-tab"><?php echo form_open('pinjaman/cetak_excel') ?><div class="form-row">
                                                            <div class="col-md-4">
                                                                <div class="form-group position-relative"><input class="form-control" name="k1" placeholder="Nama Anggota.." required type="date"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group position-relative"><input class="form-control" name="k2" placeholder="Nama Anggota.." required type="date"></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group position-relative"><button class="btn btn-sm btn-success" type="submit">Cetak <i class="fa fa-print"></i></button></div>
                                                            </div>
                                                        </div><?php echo form_close(); ?>
                                                    </div>
                                                </div>

                                            </div>

                                            <?php } ?>
                                    </div>
                                </div><?php if ($this->session->userdata('level') == "admin") : ?><a href="<?php echo base_url('pinjaman/tambah'); ?>" class="btn btn-sm btn-primary" style="margin-bottom:3px;font-size:12px"><i class="fa-plus fas"></i> Tambah Pinjaman</a> <a href="<?php echo base_url('pinjaman/bayar'); ?>" class="btn btn-sm btn-danger" style="margin-bottom:3px;font-size:12px"><i class="fa-plus fas"></i> Bayar Pinjaman</a> <a href="<?php echo base_url('pinjaman/index'); ?>" class="btn btn-sm btn-warning" style="margin-bottom:3px;font-size:12px"><i class="pe-7s-refresh-2" title="Refresh Page"></i> Refresh</a><?php endif  ?>
                        </h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-bordered table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px">NO</th>
                                        <th style="font-size:12px">WAKTU</th>
                                        <th style="font-size:12px">NAMA</th>
                                        <th style="font-size:12px">KETERANGAN ANGGOTA</th>
                                        <th style="font-size:12px">JUMLAH PINJAM</th>
                                        <th style="font-size:12px">JUMLAH BAYAR</th>
                                        <th style="font-size:12px">KETERANGAN</th><?php if ($this->session->userdata('level') == "admin") : ?><th style="font-size:12px">ACTION</th><?php endif  ?>
                                    </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                        foreach ($datas as $r) {
                                            if ($r->kode == "1") {
                                                $pinjam = number_format($r->jumlah_pinjam, 0, ",", ".");
                                                $bayar = '';
                                            } else {
                                                $pinjam = '';
                                                $bayar = number_format($r->jumlah_bayar, 0, ",", ".");
                                            } ?><tr>
                                            <td style="font-size:12px"><?php echo $i; ?></td>
                                            <td style="font-size:12px"><?php echo substr($r->waktu, 0, 10); ?></td>
                                            <td style="font-size:12px"><?php echo $r->nama; ?></td>
                                            <td style="font-size:12px"><?php echo $r->level; ?></td>
                                            <td style="font-size:12px" class="text-right"><?php echo $pinjam; ?></td>
                                            <td style="font-size:12px" class="text-right"><?php echo $bayar; ?></td>
                                            <td style="font-size:12px"><?php echo $r->keterangan; ?></td><?php if ($this->session->userdata('level') == "admin") : ?><td style="font-size:12px" class="text-center"><a href="<?php echo base_url('pinjaman/hapus/' . $r->id_pinjaman); ?>" onclick='return confirm("Apakah anda ingin menghapus data siswa")'><i class="fa fa-trash" title="Hapus Data Siswa"></i></a> | <a href="<?php echo base_url('pinjaman/detail/' . $r->id_pinjaman); ?>"><i class="fa fa-eye" title="Detail Data Anggota"></i></a></td><?php endif  ?>
                                        </tr><?php $i++;
                                            } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>