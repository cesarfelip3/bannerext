<?php

class Ecommerceguys_Cattopbanners_Model_Mysql4_Cattopbanners extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the cattopbanners_id refers to the key field in your database table.
        $this->_init('cattopbanners/cattopbanners', 'cattopbanners_id');
    }
}