<?php
class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_cattopbanners';
    $this->_blockGroup = 'cattopbanners';
    $this->_headerText = Mage::helper('cattopbanners')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('cattopbanners')->__('Add Item');
    parent::__construct();
  }
}