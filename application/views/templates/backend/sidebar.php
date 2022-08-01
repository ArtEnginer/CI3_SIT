<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div><button class="hamburger hamburger--elastic close-sidebar-btn" type="button" data-class="closed-sidebar"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button></div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div><button class="hamburger hamburger--elastic mobile-toggle-nav" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button></div>
    </div>
    <div class="app-header__menu"><span><button class="btn btn-icon btn-icon-only btn-primary btn-sm mobile-toggle-header-nav" type="button"><span class="btn-icon-wrapper"><i class="fa fa-ellipsis-v fa-w-6"></i></span></button></span></div>
    <div class="bg-light scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                    <li <?php echo $this->uri->segment(1) == 'Dashboard' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>>
                        <a href="<?php echo base_url('Dashboard/index'); ?>" style="font-size:13px">
                            <i class="metismenu-icon pe-7s-users"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#" style="font-size:13px">
                            <i class="metismenu-icon pe-7s-diamond"></i> MASTER
                            <i class="caret-left metismenu-state-icon pe-7s-angle-down"></i>
                        </a>
                        <ul>
                            <li <?php echo $this->uri->segment(1) == 'guru' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'edit' || $this->uri->segment(2) == 'tambah' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>>
                                <a href="<?php echo base_url('guru/index'); ?>" style="font-size:13px">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Guru
                                </a>
                            </li>
                            <li <?php echo $this->uri->segment(1) == 'siswa' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'edit' || $this->uri->segment(2) == 'tambah' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>>
                                <a href="<?php echo base_url('siswa/index'); ?>" style="font-size:13px">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Siswa
                                </a>
                            </li>
                            <li <?php echo $this->uri->segment(1) == 'kelas' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'ckelas1' || $this->uri->segment(2) == 'ckelas2' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>>
                                <a href="<?php echo base_url('kelas/index'); ?>" style="font-size:13px">
                                    <i class="metismenu-icon pe-7s-rocket">

                                    </i> Kelas
                                </a>
                            </li>
                            <li <?php echo $this->uri->segment(1) == 'jurusan' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'ckelas1' || $this->uri->segment(2) == 'ckelas2' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('jurusan/index'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Jurusan</a>
                            </li>
                            <li<?php echo $this->uri->segment(1) == 'periode' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'ckelas1' || $this->uri->segment(2) == 'ckelas2' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('periode/index'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Periode</a>
                    </li>
                    <li<?php echo $this->uri->segment(1) == 'tabungan' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'ckelas1' || $this->uri->segment(2) == 'ckelas2' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('tabungan/index'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Tabungan</a></li>
                        <li<?php echo $this->uri->segment(1) == 'pinjaman' && $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'edit' || $this->uri->segment(2) == 'cari_data' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('pinjaman/index'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Pinjaman</a></li>
            </ul>
            <li <?php echo $this->uri->segment(1) == 'pengguna' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('pengguna/index'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-users"></i> Pengguna Sistem</a></li><?php } elseif ($this->session->userdata('level') == "siswa") { ?><li<?php echo $this->uri->segment(1) == 'anggota' && $this->uri->segment(2) == 'tabungansiswa' || $this->uri->segment(2) == 'ckelas1' || $this->uri->segment(2) == 'ckelas2' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('anggota/tabungansiswa'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Tabungan</a></li>
                <li <?php echo $this->uri->segment(1) == 'anggota' && $this->uri->segment(2) == 'pinjamansiswa' || $this->uri->segment(2) == 'edit' || $this->uri->segment(2) == 'cari_data' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('anggota/pinjamansiswa'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Pinjaman</a></li><?php } elseif ($this->session->userdata('level') == "guru") { ?><li <?php echo $this->uri->segment(1) == 'anggota' && $this->uri->segment(2) == 'tabunganguru' || $this->uri->segment(2) == 'ckelas1' || $this->uri->segment(2) == 'ckelas2' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('anggota/tabunganguru'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Tabungan</a></li>
                <li <?php echo $this->uri->segment(1) == 'anggota' && $this->uri->segment(2) == 'pinjamanguru' || $this->uri->segment(2) == 'edit' || $this->uri->segment(2) == 'cari_data' || $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="mm-active"' : '' ?>><a href="<?php echo base_url('anggota/pinjamanguru'); ?>" style="font-size:13px"><i class="metismenu-icon pe-7s-rocket"></i> Pinjaman</a></li><?php } ?></ul>
        </div>
    </div>
</div>