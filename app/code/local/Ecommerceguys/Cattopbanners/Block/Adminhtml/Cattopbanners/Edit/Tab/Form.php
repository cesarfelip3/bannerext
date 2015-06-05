<?php

class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('cattopbanners_form', array('legend'=>Mage::helper('cattopbanners')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('cattopbanners')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('cattopbanners')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('cattopbanners')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('cattopbanners')->__('Content'),
          'title'     => Mage::helper('cattopbanners')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getCattopbannersData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getCattopbannersData());
          Mage::getSingleton('adminhtml/session')->setCattopbannersData(null);
      } elseif ( Mage::registry('cattopbanners_data') ) {
          $form->setValues(Mage::registry('cattopbanners_data')->getData());
      }
      return parent::_prepareForm();
  }
}