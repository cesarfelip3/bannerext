<?php

class Ecommerceguys_Cattopbanners_Model_Mysql4_Cattopbanners_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('cattopbanners/cattopbanners');
    }
}