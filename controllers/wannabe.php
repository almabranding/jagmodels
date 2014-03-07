<?php
class Wannabe extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array();
        $this->view->css = array();
    }
    
    function index() {
        $this->view->wannabeForm=$this->model->getWannabeForm();
        $this->view->render('page/wannabe');
    }
    
    
}