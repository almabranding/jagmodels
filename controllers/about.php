<?php
class About extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array();
        $this->view->css = array();
    }
    
    function index() {
        $this->view->about=$this->model->getAbout();
        $this->view->render('page/about');
    }
    
    
}
