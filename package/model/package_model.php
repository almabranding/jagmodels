<?php

class package_Model extends Model {

    public 
            $_orden, 
            $_where,
            $_selection,
            $_alphabetic,
            $_idmodel,
            $_sectionClass,
            $_flipbook;

    public function __construct() {
        parent::__construct();
    }

    public function getModels() {
        $this->_where.=' AND mp.main=1 AND pm.package_id='.PACKAGE_ID;
        return $this->db->select('SELECT * FROM '.DB_PREFIX.'models m JOIN '.DB_PREFIX.'models_photos mp on(m.id=mp.model_id) join '.DB_PREFIX.'photos p on(mp.photo_id=p.id) JOIN  '.DB_PREFIX.'packed_models pm ON (pm.model_id=m.id)' . $this->_where . ' ORDER by ' . $this->_orden);
    }
    public function getPackage($id) {
        return $this->db->select('SELECT * FROM '.DB_PREFIX.'packages WHERE id='.$id);
    }
    public function getDeliver($id=0) {
        return $this->db->select('SELECT * FROM '.DB_PREFIX.'package_deliveries WHERE id='.$id);
    }
    public function getModel() {
        $model = $this->db->select('SELECT * FROM '.DB_PREFIX.'models WHERE id=' . $this->_idmodel);
        return $model[0];
    }
    public function getModelPhoto() {
        $album=$this->db->select('SELECT * FROM '.DB_PREFIX.'models_photos a JOIN '.DB_PREFIX.'photos b ON (b.id=a.photo_id) WHERE model_id = :id and a.group>0 AND visibility="public" ORDER BY a.group,position', array('id' => $this->_idmodel));
        foreach($album as $photo){
            $images[$photo['group']][]=$photo;
        }
        return $images;
    }

}