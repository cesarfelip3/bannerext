<?php
/**
 * M-Connect Solutions.
 *
 * NOTICE OF LICENSE
 *

 * It is also available through the world-wide-web at this URL:
 * http://www.mconnectsolutions.com/lab/
 *
 * @category   M-Connect
 * @package    M-Connect
 * @copyright  Copyright (c) 2009-2010 M-Connect Solutions. (http://www.mconnectsolutions.com)
 */
class Mconnect_Adbanner_Block_Adminhtml_Adbanner_Exportdata extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('adbannerGrid');
      $this->setDefaultSort('adbanner_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('adbanner/adbanner')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('adbanner_id', array(
          'header'    => Mage::helper('adbanner')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'adbanner_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('adbanner')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));
	  
      $this->addColumn('imgfilename', array(
          'header'    => Mage::helper('adbanner')->__('Image['.Mage::getBaseUrl('media').']'),
          'align'     =>'left',
          'index'     => 'imgfilename',
      ));
	  
      $this->addColumn('bannerlink', array(
          'header'    => Mage::helper('adbanner')->__('Banner Link'),
          'align'     =>'left',
          'index'     => 'bannerlink',
      ));
	  
      $this->addColumn('advcode', array(
          'header'    => Mage::helper('adbanner')->__('Adv Code'),
          'align'     =>'left',
          'index'     => 'advcode',
      ));
	  
      $this->addColumn('advmode', array(
          'header'    => Mage::helper('adbanner')->__('Adv Mode'),
          'align'     =>'left',
          'index'     => 'advmode',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Image',
              0 => 'Code',
          ),
      ));	  

	$this->addColumn('posleft', array(
          'header'    => Mage::helper('adbanner')->__('Position left Column'),
          'align'     =>'left',
          'index'     => 'posleft',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => 'No',
          ),
      ));

      $this->addColumn('poscontent', array(
          'header'    => Mage::helper('adbanner')->__('Position content Column'),
          'align'     =>'left',
          'index'     => 'poscontent',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => 'No',
          ),
      ));

      $this->addColumn('posright', array(
          'header'    => Mage::helper('adbanner')->__('Position right Column'),
          'align'     =>'left',
          'index'     => 'posright',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => 'No',
          ),
      ));

      $this->addColumn('poshome', array(
          'header'    => Mage::helper('adbanner')->__('on Home Page'),
          'align'     =>'left',
          'index'     => 'poshome',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => 'No',
          ),
      ));

      $this->addColumn('poscat', array(
          'header'    => Mage::helper('adbanner')->__('on Category Page'),
          'align'     =>'left',
          'index'     => 'poscat',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => 'No',
          ),
      ));

      $this->addColumn('posprod', array(
          'header'    => Mage::helper('adbanner')->__('on Product Page'),
          'align'     =>'left',
          'index'     => 'posprod',
	  'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => 'No',
          ),
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('adbanner')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('adbanner')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
		
      return parent::_prepareColumns();
  }    
}
