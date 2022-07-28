<link href="<?php echo base_url('assets/arc/main.css'); ?>" rel="stylesheet">
<div class="table-responsive">
    <table class="mb-0 table table-bordered table-hover">
        <thead>
            <tr>
                <th style="font-size:12px">NO</th>
                <th style="font-size:12px">WAKTU</th>
                <th style="font-size:12px">NAMA</th>
                <th style="font-size:12px">KETERANGAN ANGGOTA</th>
                <th style="font-size:12px">JUMLAH PINJAM</th>
                <th style="font-size:12px">JUMLAH BAYAR</th>
                <th style="font-size:12px">KETERANGAN</th>
            </tr>
        </thead>
        <tbody><?php $i = 1;
                foreach ($datas as $r) {
                    if ($r->kode == "1") {
                        $pinjam = number_format($r->jumlah_pinjam, 0, ",", ".");
                        $bayar = '';
                    } else {
                        $bayar = number_format($r->jumlah_bayar, 0, ",", ".");
                        $pinjam = '';
                    } ?><tr>
                    <td style="font-size:12px"><?php echo $i; ?></td>
                    <td style="font-size:12px"><?php echo substr($r->waktu, 0, 10); ?></td>
                    <td style="font-size:12px"><?php echo $r->nama; ?></td>
                    <td style="font-size:12px"><?php echo $r->level; ?></td>
                    <td style="font-size:12px" class="text-right"><?php echo $pinjam; ?></td>
                    <td style="font-size:12px" class="text-right"><?php echo $bayar; ?></td>
                    <td style="font-size:12px"><?php echo $r->keterangan; ?></td>
                </tr><?php $i++;
                    } ?></tbody>
    </table>
</div>
<script type="text/javascript">
    window.print()
</script>