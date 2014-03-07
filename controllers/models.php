<?php
class Models extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array('models/js/masonry.pkgd.min.js','models/js/custom.js');
        $this->view->css = array('models/css/style.css');
        Session::set('LASTHEADSHEET',LANG.PATH);
    }
    
    function index() {
        $this->view->siteName='Women';
        $this->setGlobal('alphabetic',false);
        $this->setGlobal('_selection',null);
        $this->setModel('_where',"WHERE 1");
        $this->setModel('_orden',"name");
        $this->setView('path',"/models");
        $this->setView('modelsGallery',$this->model->getModels());
        $this->setView('modelsSearch',$this->model->getModelsSearch());
        $this->view->render('models/list');
    }
    
    
}