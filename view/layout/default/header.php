<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>KSD</title>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

        <link type="text/css" href="<?= URL ?>public/css/buttons.css" rel="stylesheet">
        <link type="text/css" href="<?= URL ?>public/css/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">
        <link type="text/css" href="<?= URL ?>public/css/main.css" rel="stylesheet">
        <link type="text/css" href="<?= URL ?>public/js/chosen/chosen.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    </head>
    <body>
        <header id="header">
            <div id="SystemLogo"><a href="">KSD ERP</a></div>
            <div id="SystemName">Order / Shipping</div>
            <div id="UserLoginInfo">  <span><i class="fas fa-user"></i> Prawit Yancharoenkit </span> <a href="#" class="Logout"> Logout  <i class="fas fa-sign-out-alt"></i></a> </div>
        </header>
        <div id="Container">
            <div id="TapMain">
                <ul>
                    <li><a href="<?= URL ?>" class="<?= $this->pageActive == 'home' ? "active" : '' ?>" id="PageHome">Home</a></li>
                    <li><a href="<?= URL ?>order" id="PageOrder"  class="<?= $this->pageActive == 'order' ? "active" : '' ?>">Order</a></li>
                    <li><a href="#"  class="<?= $this->pageActive == 'homex' ? "active" : '' ?>">Order Status</a></li>
                    <li><a href="#"   class="<?= $this->pageActive == 'homxe' ? "active" : '' ?>">Shipment</a></li>
                    <li><a href="#"  class="<?= $this->pageActive == 'homxe' ? "active" : '' ?>">Master Data</a></li>
                    <li><a href="#"  class="<?= $this->pageActive == 'homxe' ? "active" : '' ?>">Reporting</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div id="Content" >