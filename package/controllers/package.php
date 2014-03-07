<?php

class Package extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array('models/js/masonry.pkgd.min.js','models/js/custom.js');
        $this->view->css = array('models/css/style.css');
    }
    
    function index($selection=null) {
        $package=$this->model->getPackage(PACKAGE_ID);
        $deliver=$this->model->getDeliver(DELIVER_ID);
        $this->view->title=($deliver[0]['name'])?$deliver[0]['name']:$package[0]['name'];
        $this->model->_orden="pm.position";
        $this->model->_selection=$selection;
        $this->view->modelsGallery=$this->model->getModels();
        $this->model->checkBook();
        $this->view->render('models/list');
    }
    public function model($idmodel=null) {
        $SIU=new SIU();
        $package=$this->model->getPackage(PACKAGE_ID);
        $deliver=$this->model->getDeliver(DELIVER_ID);
        $this->view->title=($deliver[0]['name'])?$deliver[0]['name']:$package[0]['name'];
        $this->view->js = array('gallery/js/jquery.royalslider.min.js','gallery/js/custom.js');
        $this->view->css = array('gallery/css/style.css','gallery/css/royalslider.css');
        $this->view->modelInfo=$idmodel;
        $model=explode('-',$idmodel);
        $this->model->_idmodel=$model[0];
        $this->view->model=$this->model->getModel();
        $this->view->booker=$this->model->getBooker($package[0]['user_id']);
        $this->view->SIU=true;
        $this->view->siteName=$this->view->model['name'];
        $this->view->siuList=$SIU->getListAttr();
        $this->view->siu=$SIU->getSiu($this->view->model);
        $this->view->modelGallery=$this->model->getModelPhoto();
        $this->view->render('gallery/index');   
    }
    function all($selection=null) {
        $package=$this->model->getPackage(PACKAGE_ID);
        $deliver=$this->model->getDeliver(DELIVER_ID);
        $this->view->title=($deliver[0]['name'])?$deliver[0]['name']:$package[0]['name'];
        $this->model->_where="WHERE sex!=0";
        $this->model->_orden="m.position";
        $this->model->_selection=$selection;
        $this->view->modelsGallery=$this->model->getModels();
        $this->view->render('models/list');
    }
    
    
    
}