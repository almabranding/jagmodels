<?php

class Press_Model extends Model {

    public
            $_orden = 'name',
            $_where= 'WHERE 1=1',
            $_selection,
            $_alphabetic,
            $_sectionClass,
            $_flipbook;

    public function __construct() {
        parent::__construct();
    }

    public function getPress() {
        $this->_orden = 'created_at';
        $presses=$this->db->select('SELECT * FROM press m JOIN press_description mp on(m.id=mp.press_id) ' . $this->_where . ' ORDER by ' . $this->_orden);
        $num=sizeof($presses);
        for($i=0;$i<$num/2;$i++){
            $result['left'][]=$presses[$i];
        }
        for($i=$num/2;$i<$num;$i++){
            $result['right'][]=$presses[$i];
        }
        return $result;
    }

}
