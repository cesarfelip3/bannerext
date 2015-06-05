<?php
class Ecommerceguys_Cattopbanners_Block_Cattopbanners extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCattopbanners()     
     { 
        if (!$this->hasData('cattopbanners')) {
            $this->setData('cattopbanners', Mage::registry('cattopbanners'));
        }
        return $this->getData('cattopbanners');
        
    }
}