<?php

class shipment extends Controller {

    public function __construct() {
        parent::__construct();
        $this->pageActive = "shipment";
    }

    public function index() {
        $this->pageTiitle = "Shipment";
        $this->view("shipment/shipmentlist");
    }

}
