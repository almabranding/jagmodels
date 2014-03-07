<?php
class Press extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array();
        $this->view->css = array();
    }
    
    function index() {
        $this->view->press=$this->model->getPress();
        $this->view->render('page/press');
    }
    
    
}