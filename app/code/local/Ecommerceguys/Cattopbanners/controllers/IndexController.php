<?php
class Ecommerceguys_Cattopbanners_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/cattopbanners?id=15 
    	 *  or
    	 * http://site.com/cattopbanners/id/15 	
    	 */
    	/* 
		$cattopbanners_id = $this->getRequest()->getParam('id');

  		if($cattopbanners_id != null && $cattopbanners_id != '')	{
			$cattopbanners = Mage::getModel('cattopbanners/cattopbanners')->load($cattopbanners_id)->getData();
		} else {
			$cattopbanners = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($cattopbanners == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$cattopbannersTable = $resource->getTableName('cattopbanners');
			
			$select = $read->select()
			   ->from($cattopbannersTable,array('cattopbanners_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$cattopbanners = $read->fetchRow($select);
		}
		Mage::register('cattopbanners', $cattopbanners);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}