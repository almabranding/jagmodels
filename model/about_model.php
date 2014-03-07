<?php

class About_Model extends Model {

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

    public function getAbout() {
        return 'Launched on July 1, 2013 JAG Models is an agency catering to women of all sizes. Co-founders Jaclyn Sarka and Gary Dakin have been in the industry for a combined 25 years and represent some of the industry\'s top talent. Never ones to take no for an answer, or stick to conventional representation, they have placed girls in editorials and covers of such esteemed publications as Vogue, Elle, V, French and Bazaar.';
    }

}
