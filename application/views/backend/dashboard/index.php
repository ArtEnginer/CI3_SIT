<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-center">
                            <div class="widget-heading" style="font-size:20px">TOTAL DATA SISWA</div>
                            <a href="<?php echo base_url('siswa/index'); ?>" style="text-decoration:none">
                                <h4 class="text-white widget-numbers" style="font-size:20px"><?php echo $total_siswa; ?> SISWA</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-center">
                            <div class="widget-heading" style="font-size:20px">TOTAL GURU</div><a href="<?php echo base_url('tabungan/index'); ?>" style="text-decoration:none">
                                <h4 class="text-white widget-numbers" style="font-size:20px"><?php echo $total_guru; ?> GURU</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-center">
                            <div class="widget-heading" style="font-size:20px">TOTAL PENGGUNA SISTEM</div><a href="<?php echo base_url('pengguna/index'); ?>" style="text-decoration:none">
                                <h4 class="text-white widget-numbers" style="font-size:20px"><?php echo $total_users; ?> PENGGUNA SISTEM</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-info">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-center">
                            <div class="widget-heading" style="font-size:20px">TRANSAKSI TABUNGAN</div><a href="<?php echo base_url('pengguna/index'); ?>" style="text-decoration:none">
                                <h4 class="text-white widget-numbers" style="font-size:20px"><?php echo $total_tabungan; ?> TRANSAKSI</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-warning">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-center">
                            <div class="widget-heading" style="font-size:20px">TRANKSAKSI PINJAMAN</div><a href="<?php echo base_url('pengguna/index'); ?>" style="text-decoration:none">
                                <h4 class="text-white widget-numbers" style="font-size:20px"><?php echo $total_pinjaman; ?> TRANSAKSI</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-danger">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-start">
                            <div class="widget-heading" style="font-size:20px">STATUS TABUNGAN</div>
                            <table width="100%">
                                <tr>
                                    <td>UANG MASUK</td>
                                    <td class="text-right"><?= number_format($tab_masuk, 0, ",", ".") ?></td>
                                </tr>
                                <tr>
                                    <td>UANG KELUAR</td>
                                    <td class="text-right"><?= number_format($tab_keluar, 0, ",", ".") ?></td>
                                </tr>
                                <tr>
                                    <td>SALDO KAS</td>
                                    <td class="text-right"><?php $total = $tab_masuk - $tab_keluar;
                                                            echo number_format($total, 0, ",", "."); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-success">
                    <div class="text-white widget-content-wrapper">
                        <div class="text-start">
                            <div class="widget-heading" style="font-size:20px">STATUS PINJAMAN</div>
                            <table width="100%">
                                <tr>
                                    <td>PIUTANG</td>
                                    <td class="text-right"><?= number_format($pin_keluar, 0, ",", ".") ?></td>
                                </tr>
                                <tr>
                                    <td>PEMBAYARAN</td>
                                    <td class="text-right"><?= number_format($pin_masuk, 0, ",", ".") ?></td>
                                </tr>
                                <tr>
                                    <td>SALDO KAS</td>
                                    <td class="text-right"><?php $total = $pin_keluar - $pin_masuk;
                                                            echo number_format($total, 0, ",", "."); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>