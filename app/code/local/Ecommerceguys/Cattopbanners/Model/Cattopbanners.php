<?php

class Ecommerceguys_Cattopbanners_Model_Cattopbanners extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('cattopbanners/cattopbanners');
    }
}