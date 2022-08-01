<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>
        <h5>Data Tabungan</h5>
        <div class="row">
            <div class="col-lg-12">
                <div class="card main-card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="search-wrapper">
                                <div class="row">
                                    <div class="col-md-5"></div>
                                </div>
                        </h5>
                        <div class="table-responsive">
                            <table class="mb-0 table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px">NO</th>
                                        <th style="font-size:12px">PERIODE</th>
                                        <th style="font-size:12px">NAMA GURU</th>
                                        <th style="font-size:12px">JUMLAH NABUNG</th>
                                        <th style="font-size:12px">WAKTU</th>
                                        <th style="font-size:12px">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                        foreach ($datas as $r) { ?><tr>
                                            <td style="font-size:12px"><?php echo $i; ?></td>
                                            <td style="font-size:12px"><?php echo $r->tahun_akademik; ?></td>
                                            <td style="font-size:12px"><?php echo $r->nama_guru; ?></td>
                                            <td style="font-size:12px"><?php echo $r->jumlah_nabung; ?></td>
                                            <td style="font-size:12px"><?php echo $r->waktu; ?></td>
                                            <td style="font-size:12px"><?php echo $r->status_nabung; ?></td>
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