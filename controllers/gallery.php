<?php

class Gallery extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array('gallery/js/jquery.royalslider.min.js','gallery/js/custom.js');
        $this->view->css = array('gallery/css/style.css','gallery/css/royalslider.css');
    }
    
    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('error/index');
    }
    public function model($idmodel=null) {
        $SIU=new SIU();
        $this->model->_idmodel=$idmodel;
        $this->model->_model=$this->view->model=$this->model->getModel();
        $this->view->SIU=true;
        $this->view->siteName=$this->view->model['name'];
        $this->view->siuList=$SIU->getListAttr();
        $this->view->siu=$SIU->getSiu($this->view->model);
        $this->view->modelGallery=$this->model->getModelPhoto();
        $this->view->render('gallery/index');
    }
    
    
}