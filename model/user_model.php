<?php

class user_model extends Model {

    protected $table = 'persons';
    protected $pk = 'id';

    public function __construct($data = array()) {
        parent::__construct();
    }

}
