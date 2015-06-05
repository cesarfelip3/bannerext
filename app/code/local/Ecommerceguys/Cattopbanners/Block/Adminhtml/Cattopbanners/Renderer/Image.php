<?php
/**
 * Ecommerceguys Solutions.
 *
 * NOTICE OF LICENSE
 *

 * It is also available through the world-wide-web at this URL:
 * http://www.ecommerceguys.com
 *
 * @category   Ecommerceguys
 * @package    Ecommerceguys
 * @copyright  Copyright (c) 2009-2010 Ecommerceguys Solutions. (http://www.ecommerces.com)
 */
class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract{
 
    public function render(Varien_Object $row)
    {        
		$path = Mage::getBaseDir('media') . DS ;
		
        $html = '<img ';
        $html .= 'id="' . $this->getColumn()->getId() . '" ';
        if($row->getImgfilename() != '' && file_exists($path.$row->getImgfilename())){
			$html .= 'src="' .Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$row->getImgfilename(). '"';
		}
		else {	 
			$html .= 'src="' . Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'fabian4liberty/PlaceHolder/ImageNotAvailable.jpg"';            
		}
        $html .= 'class="grid-image" '.$this->getColumn()->getInlinecss().'/>';
        return $html;
		
		
    }
}
?>
