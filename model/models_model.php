<?php

class Models_Model extends Model {

    public 
            $_orden = 'name', 
            $_where,
            $_selection,
            $_alphabetic,
            $_sectionClass,
            $_flipbook;

    public function __construct() {
        parent::__construct();
    }

    public function getModels() {
        $this->_where.=' AND mp.main=1 AND m.active=1 ';
        return $this->db->select('SELECT * FROM '.DB_PREFIX.'models m JOIN '.DB_PREFIX.'models_photos mp on(m.id=mp.model_id) join '.DB_PREFIX.'photos p on(mp.photo_id=p.id) ' . $this->_where . ' ORDER by ' . $this->_orden);
    }

    public function getModelsSearch() {
        $this->_where='WHERE 1 AND active=1 ';
        $models = $this->db->select('SELECT * FROM '.DB_PREFIX.'models '.$this->_where.' ORDER by ' . $this->_orden);
        $modelSearch = array();
        foreach ($models as $key => $model) {
            $modelSearch[] =
                    array(
                        'value' => URL.'/gallery/model/' . $model['id'] . '/' . $model['name'],
                        'label' => $model['name'],
            );
        }
        return $modelSearch;
    }
    public function getModelThumb($id) {
       $photo=$this->db->select('SELECT * FROM models_photos a jOIN photos b ON (b.id=a.photo_id) WHERE a.model_id=:id and main=1;', array('id' => $id));
       $photo=$photo[0];
       $id=str_pad($photo['photo_id'], 9, "0", STR_PAD_LEFT);
       $folder=str_split($id,3);
       foreach($folder as $value){
           $photo['rute'].=$value.'/';
       }
       $photo['rute'].='original/';
       return $photo;
    }

}