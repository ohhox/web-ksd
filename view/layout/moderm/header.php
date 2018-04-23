<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title><?= $this->pageTiitle ?> : KSD ERP</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
              rel="stylesheet">
          <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/vendors.css">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/vendors/css/tables/datatable/datatables.min.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->    
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/app.css">
        <!-- END MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css"> 

        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/plugins/extensions/noui-slider.min.css">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/css/core/colors/palette-noui.css">
        <!-- END Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/app-assets/fonts/simple-line-icons/style.min.css">
        
        <link type="text/css" href="<?= URL ?>public/js/selectize.js/css/selectize.bootstrap3.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/style.css">

    </head>

    <body class="vertical-layout vertical-menu-modern content-detached-left-sidebar   menu-expanded fixed-navbar"
          data-open="click" data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">
        <!-- fixed-top-->
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-header">
                    <ul class="nav navbar-nav flex-row">
                        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                        <li class="nav-item mr-auto">
                            <a class="navbar-brand" href="<?= URL ?>">
                                <img class="brand-logo" alt="modern admin logo" src="<?= URL ?>public/app-assets/images/logo/logo.png">
                                <h3 class="brand-text"> KSD ERP</h3>
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                        <li class="nav-item d-md-none">
                            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-container content">
                    <div class="collapse navbar-collapse" id="navbar-mobile">
                        <ul class="nav navbar-nav mr-auto float-left">
                            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                            <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="main-menu-content">

                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item"><a href="<?= URL ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span> </a>

                    </li>
                    <li class=" nav-item"><a href="<?= URL ?>order">
                            <i class="ft-layers"></i><span class="menu-title" data-i18n="nav.dash.main">Order</span>
                        </a>
                    </li>
                     <li class=" nav-item"><a href="<?= URL ?>masterdata">
                            <i class="ft-server"></i><span class="menu-title" data-i18n="nav.dash.main">Master Data</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-content content">
            <div class="content-wrapper">
