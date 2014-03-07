<?php

class Press extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array();
        if(!Session::get('loggedIn')) header('location: '.URL);
    }
    public function index() 
    {
        header('location: ' . URL  . 'press/lista/');
    }
    public function view($id=null) 
    {
        $this->view->form=$this->model->pressForm($id);
        $this->view->render('press/view');  
    }
    public function lista($pag=1,$order='created_at DESC') 
    {
        $this->model->pag=$pag;
        $this->view->list=$this->model->toTable($this->model->getPressList($pag,NUMPP,$order),$order);
        $this->view->pagination=$this->model->getPaginationCond($pag,NUMPP, 'press',$this->model->wherepag,'press/lista',$order);
        $this->view->search=$this->model->searchForm();
        $this->view->render('press/list');  
    }
   
    public function create() 
    {
        $id=$this->model->create();
        header('location: ' . URL  . 'press/lista/');
    }
    public function edit($id) 
    {
        $this->model->edit($id);
        header('location: ' . URL . 'press/lista/');
    }
    public function delete($id) 
    {
        $this->model->delete($id);
        header('location: ' . URL . LANG .  '/press/lista/');
    }
    public function sort() 
    {
        $this->model->sort();
    }
    public function searchResult() 
    {
        $this->view->search=$this->model->searchForm();
        $this->view->list=$this->model->contactsToTable($this->model->getResultSearch());
        $this->view->render('contacts/list');  
    }
    
}