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
class Ecommerceguys_Cattopbanners_Block_Adminhtml_Cattopbanners_Renderer_Positionspages extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract{
 
    public function render(Varien_Object $row)
    {        
	$_cattopbanners_Coll = Mage::getModel('cattopbanners/cattopbanners')->load($row->getId());
	$_statusArr = array('1'=>'Yes','0'=>'No');
	$_returnedHTML = '<table>';
	$_cattopbanners_Coll = $_cattopbanners_Coll->getData();
	if(count($_cattopbanners_Coll) > 0){
	$_returnedHTML .= '<tr><th align="left" colspan="2">Position(s):</th>';
	$_returnedHTML .= '<tr><td align="left">Left Column </td><td align="left">'.$_statusArr[$_cattopbanners_Coll['posleft']].'</td></tr>';
	$_returnedHTML .= '<tr><td align="left">Content Column </td><td align="left">'.$_statusArr[$_cattopbanners_Coll['poscontent']].'</td></tr>';
	$_returnedHTML .= '<tr><td align="left">Right Column </td><td align="left">'.$_statusArr[$_cattopbanners_Coll['posright']].'</td></tr>';
	$_returnedHTML .= '<tr><th align="left" colspan="2">Page(s):</th>';
	$_returnedHTML .= '<tr><td align="left">Home Page </td><td align="left">'.$_statusArr[$_cattopbanners_Coll['poshome']].'</td></tr>';
	$_returnedHTML .= '<tr><td align="left">Category Page </td><td align="left">'.$_statusArr[$_cattopbanners_Coll['poscat']].'</td></tr>';
	$_returnedHTML .= '<tr><td align="left">Product Page </td><td align="left">'.$_statusArr[$_cattopbanners_Coll['posprod']].'</td></tr>';
	}
	
	return $_returnedHTML.'</table>';

    }
}
?>
