<?php

class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('cattopbanners_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('cattopbanners')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('cattopbanners')->__('Item Information'),
          'title'     => Mage::helper('cattopbanners')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('cattopbanners/adminhtml_cattopbanners_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}