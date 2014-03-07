<?php

class Gallery_Model extends Model {

    public $_idmodel;
    public $_model;

    public function __construct() {
        parent::__construct();
    }

    public function getModel() {
        return $this->db->selectOne('SELECT * FROM '.DB_PREFIX.'models WHERE id=' . $this->_idmodel);
    }

    public function getModelPhoto() {
        $album=$this->db->select('SELECT * FROM '.DB_PREFIX.'models_photos a JOIN '.DB_PREFIX.'photos b ON (b.id=a.photo_id) WHERE model_id = :id and a.group>0 AND visibility="public" ORDER BY a.group,position', array('id' => $this->_idmodel));
        foreach($album as $photo){
            $images[$photo['group']][]=$photo;
        }
        return $images;
    }
}