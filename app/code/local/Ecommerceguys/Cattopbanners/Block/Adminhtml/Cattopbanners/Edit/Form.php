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
class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                                      'id' => 'edit_form',
                                      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                                      'method' => 'post',
        							  'enctype' => 'multipart/form-data'
                                   )
      );

      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
  }
}
