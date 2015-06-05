<?php

class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'cattopbanners';
        $this->_controller = 'adminhtml_cattopbanners';
        
        $this->_updateButton('save', 'label', Mage::helper('cattopbanners')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('cattopbanners')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('cattopbanners_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'cattopbanners_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'cattopbanners_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('cattopbanners_data') && Mage::registry('cattopbanners_data')->getId() ) {
            return Mage::helper('cattopbanners')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('cattopbanners_data')->getTitle()));
        } else {
            return Mage::helper('cattopbanners')->__('Add Item');
        }
    }
}