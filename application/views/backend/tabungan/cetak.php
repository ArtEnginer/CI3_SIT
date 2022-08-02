<link href="<?php echo base_url('assets/arc/main.css'); ?>" rel="stylesheet">
<div class="table-responsive">
    <table class="mb-0 table table-bordered table-hover">
        <thead>
            <tr>
                <th style="font-size:12px">NO</th>
                <th style="font-size:12px">PERIODE</th>
                <th style="font-size:12px">WAKTU</th>
                <th style="font-size:12px">NAMA</th>
                <th style="font-size:12px">KELAS</th>
                <th style="font-size:12px">JENIS ANGGOTA</th>
                <th style="font-size:12px">DEBET</th>
                <th style="font-size:12px">KREDIT</th>
            </tr>
        </thead>
        <tbody><?php $i = 1;
                foreach ($datas as $r) {
                    if ($r->jumlah_nabung == 0) {
                        $debet = "";
                    } else {
                        $debet = number_format($r->jumlah_nabung, 0, ",", ".");
                    }
                    if ($r->jumlah_ambil == 0) {
                        $kredit = "";
                    } else {
                        $kredit = number_format($r->jumlah_ambil, 0, ",", ".");
                    } ?><tr>
                    <td style="font-size:12px"><?php echo $i; ?></td>
                    <td style="font-size:12px"><?php echo $r->tahun_akademik; ?></td>
                    <td style="font-size:12px"><?php echo substr($r->waktu, 0, 10); ?></td>
                    <td style="font-size:12px"><?php echo $r->nama; ?></td>
                    <td style="font-size:12px"><?php echo $r->kelas; ?></td>
                    <td style="font-size:12px"><?php echo $r->level; ?></td>
                    <td style="font-size:12px" class="text-right"><?php echo $debet; ?></td>
                    <td style="font-size:12px" class="text-right"><?php echo $kredit; ?></td>
                </tr><?php $i++;
                    } ?></tbody>
    </table>
</div>
<script type="text/javascript">
    window.print()
</script>