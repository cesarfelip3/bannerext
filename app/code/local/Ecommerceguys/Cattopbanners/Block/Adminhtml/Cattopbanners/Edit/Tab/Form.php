<?php
/**
 * Ecommerceguys Solutions.
 *
 * NOTICE OF LICENSE
 *

 * It is also available through the world-wide-web at this URL:
 * http://www.ecommerceguys.com/lab/
 *
 * @category   Ecommerceguys
 * @package    Ecommerceguys
 * @copyright  Copyright (c) 2009-2010 Ecommerceguys Solutions. (http://www.ecommerceguys.com)
 */
class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('cattopbanners_form', array('legend'=>Mage::helper('cattopbanners')->__('Banner information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('cattopbanners')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

	  $_removeimgfilenameBtn = '';
	  if($this->getRequest()->getParam('id',false) && Mage::registry('cattopbanners_data')->getData('imgfilename') != '') {
	  $_removeimgfilenameBtn = '<button style="" onclick="deleteConfirm(\'Are you sure you want to do this?\', \'http://localhost/mage1620/index.php/cattopbanners/adminhtml_cattopbanners/deletebannerimgfile/id/'.$this->getRequest()->getParam('id',false).'/key/'.Mage::getSingleton('adminhtml/url')->getSecretKey("adminhtml_cattopbanners","deletebannerimgfile").'/\')" class="scalable delete" type="button" id="id_'.Mage::getSingleton('adminhtml/url')->getSecretKey("adminhtml_cattopbanners","deletebannerimgfile").'"><span>Delete Image</span></button>';
	  }
	  
      $fieldset->addField('imgfilename', 'file', array(
          'label'     => Mage::helper('cattopbanners')->__('Image'),
          'required'  => false,
          'name'      => 'imgfilename',
          'after_element_html'      => $_removeimgfilenameBtn,		  		  		  
	  ));
	  
      $fieldset->addField('bannerlink', 'text', array(
          'label'     => Mage::helper('cattopbanners')->__('Banner Link'),
          'class'     => 'validate-url',
          'required'  => false,
          'name'      => 'bannerlink',
      ));	  
		
      $fieldset->addField('advcode', 'editor', array(
          'name'      => 'advcode',
          'label'     => Mage::helper('cattopbanners')->__(' Code'),
          'title'     => Mage::helper('cattopbanners')->__(' Code'),
          'style'     => 'width:700px; height:200px;',
          'wysiwyg'   => false,
          'required'  => false,
      ));
	  	  
	  $fieldset->addField('advmode', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__(' Mode'),
          'name'      => 'advmode',
          'values'    => array(
              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('Code'),
              ),

              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Image'),
              ),
          ),
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
     
	$fieldset1 = $form->addFieldset('cattopbanners_form1', array('legend'=>Mage::helper('cattopbanners')->__('Banner Position(s)')));

	$fieldset1->addField('posleft', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Left Column'),
          'name'      => 'posleft',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Yes'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('No'),
              ),
          ),
      ));

	$fieldset1->addField('poscontent', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Content Column'),
          'name'      => 'poscontent',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Yes'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('No'),
              ),
          ),
      ));

	$fieldset1->addField('posright', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Right Column'),
          'name'      => 'posright',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Yes'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('No'),
              ),
          ),
      ));

	$fieldset2 = $form->addFieldset('cattopbanners_form2', array('legend'=>Mage::helper('cattopbanners')->__('Banner on Page(s)')));

	$fieldset2->addField('poshome', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Home Page'),
          'name'      => 'poshome',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Yes'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('No'),
              ),
          ),
      ));

	$fieldset2->addField('poscat', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Category Page'),
          'name'      => 'poscat',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Yes'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('No'),
              ),
          ),
      ));

	$fieldset2->addField('posprod', 'select', array(
          'label'     => Mage::helper('cattopbanners')->__('Product Page'),
          'name'      => 'posprod',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('cattopbanners')->__('Yes'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('cattopbanners')->__('No'),
              ),
          ),
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
