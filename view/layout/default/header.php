<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= $this->pageTiitle ?> : KSD ERP</title>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

        <link type="text/css" href="<?= URL ?>public/css/buttons.css" rel="stylesheet">
        <link type="text/css" href="<?= URL ?>public/css/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">

        <link type="text/css" href="<?= URL ?>public/js/selectize.js/css/selectize.bootstrap3.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link type="text/css" href="<?= URL ?>public/css/main.css" rel="stylesheet">


    </head>
    <body>
        <div id="LeftMenu">
            <div id="SystemLogo"><a href="<?= URL ?>">KSD ERP</a></div>
            <ul id="Menu">
                <li><a href="<?= URL ?>" class="<?= $this->pageActive == 'home' ? "active" : '' ?>" id="PageHome">Home</a></li>
                <li><a href="<?= URL ?>order" id="PageOrder"  class="<?= $this->pageActive == 'order' ? "active" : '' ?>">+ Order</a></li>
                <li><a href="#"  class="<?= $this->pageActive == 'homex' ? "active" : '' ?>">Order Status</a></li>
                <li><a href="#"   class="<?= $this->pageActive == 'homxe' ? "active" : '' ?>">Shipment</a></li>
                <li><a href="<?= URL ?>masterdata"  class="<?= $this->pageActive == 'masterdata' ? "active" : '' ?>">Master Data</a></li>
                <li><a href="#"  class="<?= $this->pageActive == 'homxe' ? "active" : '' ?>">Reporting</a></li>
            </ul>
        </div>

        <div id="Container">
            <header id="header">

                <label style="padding: 2px;font-size: 18px;padding-left: 10px; "><?= $this->pageTiitle ?></label> 

                <div id="UserLoginInfo">    <a href="#" class="Logout"> Logout  <i class="fas fa-sign-out-alt"></i></a> </div>
                <div id="UserLoginInfo">   <a href="#" class=""> Help  <i class="fas fa-heartbeat"></i></a> </div>
                <div id="UserLoginInfo">  <span><i class="fas fa-user"></i> Prawit Yancharoenkit </span>    </div>
                <p class="clear"></p>

            </header>
            <div>
                <div id="TapMain">

                    <div class="clear"></div>
                </div>
                <div id="Content" >