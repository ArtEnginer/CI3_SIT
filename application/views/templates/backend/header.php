<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="en" http-equiv="Content-Language">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title><?php $role = $this->session->userdata('level');
                if ($role == "admin") {
                    echo $this->session->userdata('username');
                } elseif ($role == "siswa") {
                    echo $this->session->userdata('username');
                } elseif ($role == "guru") {
                    echo $this->session->userdata('username');
                }
                echo $this->session->userdata($role) . $title; ?></title>
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,shrink-to-fit=no" name="viewport">
        <meta content="This is an example dashboard created using build-in elements and components." name="description">
        <meta content="no" name="msapplication-tap-highlight">
        <link href="<?php echo base_url('assets/arc/main.css'); ?>" rel="stylesheet">
        
    </head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            <div class="app-header bg-tempting-azure header-shadow">
                <div class="app-header__logo">
                    <div style="font-size:20px"><b>SITAS</b></div>
                    <div class="header__pane ml-auto">
                        <div><button class="hamburger hamburger--elastic close-sidebar-btn" type="button" data-class="closed-sidebar"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button></div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div><button class="hamburger hamburger--elastic mobile-toggle-nav" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button></div>
                </div>
                <div class="app-header__menu">
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="p-0 widget-content">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="btn-group"><a class="btn p-0" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"><i class="fa fa-angle-down ml-2 opacity-8" style="margin:2px 3px 2px 2px"></i> </a><?php $userr = $this->session->userdata('level');
                                                                                                                                                                                                                                        if ($userr == "admin") {
                                                                                                                                                                                                                                            echo $this->session->userdata('username');
                                                                                                                                                                                                                                        } elseif ($userr == "siswa") {
                                                                                                                                                                                                                                            echo $this->session->userdata('username');
                                                                                                                                                                                                                                        } elseif ($userr == "guru") {
                                                                                                                                                                                                                                            echo $this->session->userdata('username');
                                                                                                                                                                                                                                        } ?><div class="dropdown-menu dropdown-menu-right" aria-hidden="true" role="menu" style="background:grey" tabindex="-1"><?php $userrm = $this->session->userdata('level');
                                                                                                                                                                                                                                                                                                                                                                if ($userrm == "admin") { ?><a class="dropdown-item" href="<?php echo base_url('Login/logout'); ?>" style="font-size:13px" tabindex="0"><i class="fa-power-off fas" style="margin:2px 3px 2px 2px" title="Logout"></i> Logout</a><?php } ?><?php if ($this->session->userdata('level') == "siswa") : ?><a class="dropdown-item" href="<?php echo base_url('Login/logout'); ?>" style="font-size:13px" tabindex="0"><i class="fa-power-off fas" style="margin:2px 3px 2px 2px" title="Logout"></i> Logout</a><?php endif  ?><?php if ($this->session->userdata('level') == "guru") : ?><a class="dropdown-item" href="<?php echo base_url('Login/logout'); ?>" style="font-size:13px" tabindex="0"><i class="fa-power-off fas" style="margin:2px 3px 2px 2px" title="Logout"></i> Logout</a><?php endif  ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-header__content">
                    <div class="app-header-left">
                        <ul class="header-menu nav">
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="p-0 widget-content">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="btn-group"><a class="btn p-0" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"><i class="fa fa-angle-down ml-2 opacity-8" style="margin:2px"></i> </a><?php $userr = $this->session->userdata('level');
                                                                                                                                                                                                                            if ($userr == "admin") {
                                                                                                                                                                                                                                echo $this->session->userdata('username');
                                                                                                                                                                                                                            } elseif ($userr == "siswa") {
                                                                                                                                                                                                                                echo $this->session->userdata('username');
                                                                                                                                                                                                                            } elseif ($userr == "guru") {
                                                                                                                                                                                                                                echo $this->session->userdata('username');
                                                                                                                                                                                                                            } ?><div class="dropdown-menu dropdown-menu-right" aria-hidden="true" role="menu" style="background:grey" tabindex="-1"><?php $userrm = $this->session->userdata('level');
                                                                                                                                                                                                                                                                                                                                                    if ($userrm == "admin") { ?><a class="dropdown-item" href="<?php echo base_url('Login/logout'); ?>" style="font-size:13px" tabindex="0"><i class="fa-power-off fas" style="margin:2px 3px 2px 2px" title="Logout"></i> Logout</a><?php } ?><?php if ($this->session->userdata('level') == "siswa") : ?><a class="dropdown-item" href="<?php echo base_url('Login/logout'); ?>" style="font-size:13px" tabindex="0"><i class="fa-power-off fas" style="margin:2px 3px 2px 2px" title="Logout"></i> Logout</a><?php endif  ?><?php if ($this->session->userdata('level') == "guru") : ?><a class="dropdown-item" href="<?php echo base_url('Login/logout'); ?>" style="font-size:13px" tabindex="0"><i class="fa-power-off fas" style="margin:2px 3px 2px 2px" title="Logout"></i> Logout</a><?php endif  ?></div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left header-user-info ml-3">
                                        <div class="widget-heading"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui-theme-settings"><button class="btn btn-open-options btn-warning" type="button" id="TooltipDemo"><i class="fa fa-2x fa-cog fa-spin fa-w-16"></i></button>
                <div class="theme-settings__inner">
                    <div class="scrollbar-container">
                        <div class="theme-settings__options-wrapper">
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5 class="pb-2">Choose Color Scheme</h5>
                                        <div class="theme-settings-swatches">
                                            <div class="swatch-holder switch-header-cs-class bg-primary" data-class="bg-primary header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-secondary" data-class="bg-secondary header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-success" data-class="bg-success header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-info" data-class="bg-info header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-warning" data-class="bg-warning header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-danger" data-class="bg-danger header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-light" data-class="bg-light header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-dark" data-class="bg-dark header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-focus" data-class="bg-focus header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-alternate" data-class="bg-alternate header-text-light"></div>
                                            <div class="divider"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-vicious-stance" data-class="bg-vicious-stance header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-midnight-bloom" data-class="bg-midnight-bloom header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-night-sky" data-class="bg-night-sky header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-slick-carbon" data-class="bg-slick-carbon header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-asteroid" data-class="bg-asteroid header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-royal" data-class="bg-royal header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-warm-flame" data-class="bg-warm-flame header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-night-fade" data-class="bg-night-fade header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-sunny-morning" data-class="bg-sunny-morning header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-tempting-azure" data-class="bg-tempting-azure header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-amy-crisp" data-class="bg-amy-crisp header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-heavy-rain" data-class="bg-heavy-rain header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-mean-fruit" data-class="bg-mean-fruit header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-malibu-beach" data-class="bg-malibu-beach header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-deep-blue" data-class="bg-deep-blue header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-ripe-malin" data-class="bg-ripe-malin header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-arielle-smile" data-class="bg-arielle-smile header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-plum-plate" data-class="bg-plum-plate header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-happy-fisher" data-class="bg-happy-fisher header-text-dark"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-happy-itmeo" data-class="bg-happy-itmeo header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-mixed-hopes" data-class="bg-mixed-hopes header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-strong-bliss" data-class="bg-strong-bliss header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-grow-early" data-class="bg-grow-early header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-love-kiss" data-class="bg-love-kiss header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-premium-dark" data-class="bg-premium-dark header-text-light"></div>
                                            <div class="swatch-holder switch-header-cs-class bg-happy-green" data-class="bg-happy-green header-text-light"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="themeoptions-heading">
                                <div>Sidebar Options</div><button class="switch-sidebar-cs-class btn btn-focus btn-pill btn-shadow btn-sm btn-wide ml-auto" type="button" data-class="">Restore Default</button>
                            </h3>
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5 class="pb-2">Choose Color Scheme</h5>
                                        <div class="theme-settings-swatches">
                                            <div class="swatch-holder switch-sidebar-cs-class bg-primary" data-class="bg-primary sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-secondary" data-class="bg-secondary sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-success" data-class="bg-success sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-info" data-class="bg-info sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-warning" data-class="bg-warning sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-danger" data-class="bg-danger sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-light" data-class="bg-light sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-dark" data-class="bg-dark sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-focus" data-class="bg-focus sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-alternate" data-class="bg-alternate sidebar-text-light"></div>
                                            <div class="divider"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-vicious-stance" data-class="bg-vicious-stance sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-midnight-bloom" data-class="bg-midnight-bloom sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-night-sky" data-class="bg-night-sky sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-slick-carbon" data-class="bg-slick-carbon sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-asteroid" data-class="bg-asteroid sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-royal" data-class="bg-royal sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-warm-flame" data-class="bg-warm-flame sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-night-fade" data-class="bg-night-fade sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-sunny-morning" data-class="bg-sunny-morning sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-tempting-azure" data-class="bg-tempting-azure sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-amy-crisp" data-class="bg-amy-crisp sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-heavy-rain" data-class="bg-heavy-rain sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-mean-fruit" data-class="bg-mean-fruit sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-malibu-beach" data-class="bg-malibu-beach sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-deep-blue" data-class="bg-deep-blue sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-ripe-malin" data-class="bg-ripe-malin sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-arielle-smile" data-class="bg-arielle-smile sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-plum-plate" data-class="bg-plum-plate sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-happy-fisher" data-class="bg-happy-fisher sidebar-text-dark"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-happy-itmeo" data-class="bg-happy-itmeo sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-mixed-hopes" data-class="bg-mixed-hopes sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-strong-bliss" data-class="bg-strong-bliss sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-grow-early" data-class="bg-grow-early sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-love-kiss" data-class="bg-love-kiss sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-premium-dark" data-class="bg-premium-dark sidebar-text-light"></div>
                                            <div class="swatch-holder switch-sidebar-cs-class bg-happy-green" data-class="bg-happy-green sidebar-text-light"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-main">