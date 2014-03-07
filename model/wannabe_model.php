<?php

class Wannabe_Model extends Model {

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

    public function getWannabeForm() {
        $action = URL . LANG . '/user/create';
        $atributes = array(
            'enctype' => 'multipart/form-data',
        );
        $form = new Zebra_Form('contact', 'POST', $action, $atributes);

        $form->add('label', 'label_name', 'name', $this->lang['Name'] . ':');
        $obj = $form->add('text', 'name', '', array('autocomplete' => 'off', 'placeholder' => ''));
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Name'] . ' ' . $this->lang['is required'] . '!'),
        ));

        $form->add('label', 'label_age', 'age', $this->lang['Age'] . ':');
        $obj = $form->add('text', 'age', '', array('autocomplete' => 'off', 'placeholder' => ''));
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Age'] . ' ' . $this->lang['is required'] . '!'),
        ));

        $form->add('label', 'label_height', 'height', $this->lang['Height'] . ':');
        $obj = $form->add('text', 'height', '', array('autocomplete' => 'off', 'placeholder' => ''));
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Height'] . ' ' . $this->lang['is required'] . '!'),
        ));

        $form->add('label', 'label_location', 'location', $this->lang['Location'] . ':');
        $obj = $form->add('text', 'location', '', array('autocomplete' => 'off', 'placeholder' => ''));
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Location'] . ' ' . $this->lang['is required'] . '!'),
        ));

        $form->add('label', 'label_email', 'email', $this->lang['Email'] . ':');
        $obj = $form->add('text', 'email', '', array('autocomplete' => 'off', 'placeholder' => ''));
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Email'] . ' ' . $this->lang['is required'] . '!'),
        ));

        $form->add('label', 'label_phone', 'phone', $this->lang['Phone'] . ':');
        $obj = $form->add('text', 'phone', '', array('autocomplete' => 'off', 'placeholder' => ''));
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Phone'] . ' ' . $this->lang['is required'] . '!'),
        ));
        $form->add('label', 'label_message', 'message', $this->lang['Message']);
        $obj = $form->add('textarea', 'message');
        $obj->set_rule(array(
            'required' => array('error', $this->lang['Message'] . ' ' . $this->lang['is required'] . '!'),
        ));
        for ($i = 1; $i <= 3; $i++) {
            $form->add('label', 'label_imagen_' . $i, 'imagen_' . $i, $this->lang['Image'] . ' ' . $i . ':');
            $obj = $form->add('file', 'imagen_' . $i);
            $obj->set_rule(array(
                'upload' => array(
                    '/uploads/temp',
                    ZEBRA_FORM_UPLOAD_RANDOM_NAMES,
                    'error',
                    'Could not upload file!',
                ),
                'filesize' => array(
                    '1024000',
                    'error',
                    'File size must not exceed 1Mb!'
                ),
                'filetype' => array(
                    'jpg, jpeg, png',
                    'error',
                    'File must be a valid jpg, jpeg, png file!'
                ),
            ));
        }
        $form->add('submit', '_btnsubmit', $this->lang['submit']);

        if ($form->validate()) {
            show_results();
        }
        return $form;
    }

}
