<?php
class Press_Model extends Model {
    public $pag;
    public function __construct() {
        parent::__construct();
        $this->wherepag=' WHERE 1=1 ';
    }
    public function searchForm() {
        $action = URL . LANG . '/contacts/searchResult';
        $atributes = array(
            'enctype' => 'multipart/form-data',
        );
        $form = new Zebra_Form('addModel', 'POST', $action, $atributes);

        $form->add('hidden', '_add', 'model');

        $form->add('label', 'label_name', 'name', 'Name');
        $form->add('text', 'name', '', array('autocomplete' => 'off'));
        
        
        $form->add('label', 'label_email', 'email', 'Email');
        $form->add('text', 'email', '', array('autocomplete' => 'off'));

        $form->add('submit', '_btnsubmit', 'Search');
        $form->validate();
        return $form;
    }
    public function pressForm($id=null) {
        $action=($id==null)?URL.'press/create':URL.'press/edit/'.$id;
        if ($id!=null)
            $contacts=$this->getPress($id);
       $atributes=array(
            'enctype'    => 'multipart/form-data',
        );
        $form = new Zebra_Form('press','POST',$action,$atributes);
        
        $form->add('label', 'label_link', 'link', 'Link');
        $form->add('text', 'link', $contacts['link'], array('autocomplete' => 'off'));
       
        foreach ($this->_langs as $lng) {
            if ($id!=null)
                $value = $this->getPress($id, $lng);
            $form->add('label', 'label_name_' . $lng, 'name_' . $lng, 'Name ' . $lng);
            $obj = $form->add('text', 'name_' . $lng, $value['name'], array('autocomplete' => 'off'));
            
        $form->add('label', 'label_subtitle_'. $lng, 'subtitle_'. $lng, 'Subtitle');
        $form->add('text', 'subtitle_'. $lng, $value['subtitle'], array('autocomplete' => 'off'));
        
            $obj = $form->add('label', 'label_content_' . $lng, 'content_' . $lng, 'Content ' . $lng);
            $obj->set_attributes(array(
                'style' => 'float:none',
            ));
            $obj = $form->add('textarea', 'content_' . $lng, $value['content'], array('autocomplete' => 'off'));
            $obj->set_attributes(array(
                'class' => 'wysiwyg',
            ));
        }
        $form->add('submit', '_btnsubmit', 'Submit');
        $form->validate();
        return $form;
    }
    public function getPress($id=null,$lang=LANG) {
        return ($id==null)?$this->db->select("SELECT * FROM press a JOIN press_description b ON a.id=b.press_id ".$this->wherepag." AND b.language_id='".$lang."' ORDER BY created_at"):$this->db->selectOne("SELECT * FROM press a JOIN press_description b ON a.id=b.press_id ".$this->wherepag." AND b.language_id='".$lang."' AND a.id=".$id);  
    }
    public function getPressList($pag,$maxpp,$order='created_at',$lang=LANG) {
        $min=$pag*$maxpp-$maxpp;
        return $this->db->select("SELECT * FROM  press a JOIN press_description b ON a.id=b.press_id ".$this->wherepag." AND b.language_id='".$lang."' ORDER by ".$order." LIMIT ".$min.",".$maxpp); 
    }
    public function toTable($lista,$order) {
        $order=  explode(' ', $order);
        $orden=(strtolower($order[1])=='desc')?' ASC':' DESC';
        $b['sort']=true;
        $b['title']=array(
           array(
               "title"  =>"Name",
                "link"  => URL.LANG.'/contacts/lista/'.$this->pag.'/name'.$orden,
               "width"  =>"10%"
           ),array(
               "title"  =>"Descrption",
                "link"  => URL.LANG.'/contacts/lista/'.$this->pag.'/email'.$orden,
               "width"  =>"40%"
           ),array(
               "title"  =>"Created",
               "link"  => URL.LANG.'/contacts/lista/'.$this->pag.'/created_at'.$orden,
               "width"  =>"10%"   
           ),array(
               "title"  =>"Options",
               "link"  =>"#",
               "width"  =>"10%"
           ));       
        foreach($lista as $key => $value) {
            $b['values'][]=   
            array(
                "Name"  =>$value['name'],
                "Descrption"  =>htmlentities(substr($value['content'],0,150)),
                "Created"  =>$this->getTimeStamp($value['created_at']),
                "Options"  =>'<a href="'.URL.'press/view/'.$value['press_id'].'"><button title="Edit" type="button" class="edit"></button></a><button type="button" title="Delete" class="delete" onclick="secureMsg(\'Are you sure you want to delete?\', '.URL.'press/delete/'.$value['press_id'].' \');"></button>'
            );
        }
        return $b;
    }
    public function create() {
        $data = array(
            'updated_at' => $this->getTimeSQL(),
            'created_at' => $this->getTimeSQL()
        );
        $id=$this->db->insert('press', $data);
        unset($data);
        foreach ($this->_langs as $lng) {
            $data = array(
                'press_id' => $id,
                'content' => $_POST['content_' . $lng],
                'name' => $_POST['name_' . $lng],
                'subtitle' => $_POST['subtitle_' . $lng],
                'link' => $_POST['link']
            );
            $exist = $this->db->select("SELECT * FROM press_description WHERE press_id=" . $id . " AND `language_id`='" . $lng . "'");
            if (sizeof($exist))
                $this->db->update('press_description', $data, "`press_id` = '{$id}' AND `language_id` = '{$lng}'");
            else
                $this->db->insert('press_description', $data);
        }
        
       
    }
    public function edit($id){
        $data = array(
            'updated_at' => $this->getTimeSQL(),
        );
        $this->db->update('press', $data, "`id` = '{$id}'");
         foreach ($this->_langs as $lng) {
            $data = array(
                'press_id' => $id,
                'content' => $_POST['content_' . $lng],
                'name' => $_POST['name_' . $lng],
                'subtitle' => $_POST['subtitle_' . $lng],
                'link' => $_POST['link']
            );
            $exist = $this->db->select("SELECT * FROM press_description WHERE press_id=" . $id . " AND `language_id`='" . $lng . "'");
            if (sizeof($exist))
                $this->db->update('press_description', $data, "`press_id` = '{$id}' AND `language_id` = '{$lng}'");
            else
                $this->db->insert('press_description', $data);
        }   
    }
    public function delete($id){
         $this->db->delete( 'press', "`id` = {$id}");
         $this->db->delete( 'press_description', "`press_id` = {$id}");  
    }   
    public function getResultSearch() {
        $sql = 'SELECT * FROM '.DB_PREFIX . 'contacts ' . $this->wherepag . ' AND (';
        if ($_POST['name'] != '') {
            $models = explode(", ", $_POST['name']);
            foreach ($models as $key => $value) {
                $sql.=' name LIKE "%' . $value . '%" OR';
            }
            $sql = substr($sql, 0, -3);
            $sql.=') AND';
        }
        if ($_POST['email'] != '') {
            $models = explode(", ", $_POST['email']);
            foreach ($models as $key => $value) {
                $sql.=' email LIKE "%' . $value . '%" OR';
            }
            $sql = substr($sql, 0, -3);
            $sql.=') AND';
        }
        $sql = substr($sql, 0, -3);
        $sql.=' ORDER by name';
        return $this->db->select($sql);
    }
}