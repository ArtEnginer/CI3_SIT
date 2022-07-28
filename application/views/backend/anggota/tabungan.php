<?php $ses = $this->session->userdata('id_user'); ?><div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>
        <h5>Data Tabungan <a class="btn btn-primary btn-sm" href="<?= base_url('anggota/rekaptabungan') ?>"><i class="fa fa-print"></i> Cetak Rekap</a> <a class="btn btn-primary btn-sm" href="<?= base_url('exceltabungan?id=' . $ses) ?>"><i class="fa fa-download"></i> Export XLS</a></h5>
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
                                        <th style="font-size:12px">WAKTU</th>
                                        <th style="font-size:12px">NAMA</th>
                                        <th style="font-size:12px">DEBET</th>
                                        <th style="font-size:12px">KREDIT</th>
                                        <th style="font-size:12px">SALDO</th>
                                    </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                        foreach ($datas as $r) {
                                            $where = ['waktu <=' => $r->waktu, 'id_user' => $r->id_user];
                                            $this->db->select_sum('jumlah_nabung');
                                            $this->db->where($where);
                                            $msk = $this->db->get('tb_tabungan')->row();
                                            $where = ['waktu <=' => $r->waktu, 'id_user' => $r->id_user];
                                            $this->db->select_sum('jumlah_ambil');
                                            $this->db->where($where);
                                            $klr = $this->db->get('tb_tabungan')->row();
                                            $total = $msk->jumlah_nabung - $klr->jumlah_ambil;

                                            if ($r->kode == "1") {
                                                $kredit = number_format($r->jumlah_nabung, 0, ",", ".");
                                            } else {
                                                $kredit = "";
                                            }
                                            if ($r->kode == "2") {
                                                $debet = number_format($r->jumlah_ambil, 0, ",", ".");
                                            } else {
                                                $debet = "";
                                            } ?><tr>
                                            <td style="font-size:12px"><?php echo $i; ?></td>
                                            <td style="font-size:12px"><?php echo $r->tahun_akademik; ?></td>
                                            <td style="font-size:12px" class="text-center"><?php echo substr($r->waktu, 0, 10); ?></td>
                                            <td style="font-size:12px"><?php echo $r->nama; ?></td>
                                            <td style="font-size:12px" class="text-right"><?php echo $debet; ?></td>
                                            <td style="font-size:12px" class="text-right"><?php echo $kredit; ?></td>
                                            <td style="font-size:12px" class="text-right"><?php echo number_format($total, 0, ",", "."); ?></td>
                                        </tr><?php $i++;
                                            } ?></tbody>
                            </table>
                        </div><br>
                        <div>
                            <table width="100%">
                                <tr>
                                    <td width="30%">Jumlah Tabungan</td>
                                    <td width="2%">:</td>
                                    <td class="text-right"><?= number_format($kredits, 0, ",", ".") ?></td>
                                    <td width="48%"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Jumlah Pengambilan</td>
                                    <td width="2%">:</td>
                                    <td class="text-right"><?= number_format($debets, 0, ",", ".") ?></td>
                                    <td width="48%"></td>
                                </tr>
                                <tr>
                                    <td width="30%">Saldo Akhir</td>
                                    <td width="2%">:</td>
                                    <td style="border-top:1px solid #000" class="text-right">Rp. <?php $total = $kredits - $debets;    echo number_format($total, 0, ",", "."); ?></td>
                                    <td width="48%"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>