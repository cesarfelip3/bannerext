<?php
/**
 * Ecommerceguys Solutions.
 *
 * NOTICE OF LICENSE
 *

 * It is also available through the world-wide-web at this URL:
 * http://www.mconnectsolutions.com/lab/
 *
 * @category   Ecommerceguys
 * @package    Ecommerceguys
 * @copyright  Copyright (c) 2009-2010 Ecommerceguys. (http://www.ecommerceguys.com)
 */
class Ecommerceguys_Cattopbanners_Adminhtml_CattopbannersController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('cattopbanners/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Banner Manager'), Mage::helper('adminhtml')->__('Banner Manager'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('cattopbanners/cattopbanners')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('cattopbanners_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('cattopbanners/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('cattopbanners/adminhtml_cattopbanners_edit'))
				->_addLeft($this->getLayout()->createBlock('cattopbanners/adminhtml_cattopbanners_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('cattopbanners')->__('Banner does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
			if(isset($_FILES['imgfilename']['name']) && $_FILES['imgfilename']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('imgfilename');
					
					// Any extention would work
	           		$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(true);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(true);
							
					// We set media as the upload dir
					$_UploadbaseDir = 'mcscattopbanners';
					$path = Mage::getBaseDir('media') . DS . $_UploadbaseDir . DS;
					
					if(!$uploader->save($path, $_FILES['imgfilename']['name'] )){
					throw new Exception($this->__('There might be a problem with "media/'.$_UploadbaseDir.'" directory permission.'));
					}
					
				} catch (Exception $e) {
					if ($this->getRequest()->getParam('back')) {
						$this->_redirect('*/*/edit', array('id' => $model->getId()));
						return;
					}
					$this->_redirect('*/*/');
					return;		      
		      
		        }
	        
		        //this way the name is saved in DB
	  			$data['imgfilename'] = $_UploadbaseDir.$uploader->getUploadedFilename();				
			}
	  			
	  			
			$model = Mage::getModel('cattopbanners/cattopbanners');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('cattopbanners')->__('Banner was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('cattopbanners')->__('Unable to find Banner to save'));
        $this->_redirect('*/*/');
	}
 
	public function deletebannerimgfileAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {

			try {
				$model = Mage::getModel('cattopbanners/cattopbanners');
				$_Imgfilename = $model->load($this->getRequest()->getParam('id'))->getImgfilename();
				if(unlink(Mage::getBaseDir('media').DS.$_Imgfilename)){ 
					$model->setId($this->getRequest()->getParam('id'))->setImgfilename('')->save();
				}	 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Image was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('cattopbanners/cattopbanners');
				$_Imgfilename = $model->load($this->getRequest()->getParam('id'))->getImgfilename();
				@unlink(Mage::getBaseDir('media').DS.$_Imgfilename); 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Advertise Banner was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction() {
        $cattopbannersIds = $this->getRequest()->getParam('cattopbanners');
        if(!is_array($cattopbannersIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($cattopbannersIds as $cattopbannersId) {
                    $cattopbanners = Mage::getModel('cattopbanners/cattopbanners')->load($cattopbannersId);
					$_Imgfilename = $cattopbanners->getImgfilename();
					@unlink(Mage::getBaseDir('media').DS.$_Imgfilename); 					
                    $cattopbanners->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($cattopbannersIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
    public function massStatusAction()
    {
        $cattopbannersIds = $this->getRequest()->getParam('cattopbanners');
        if(!is_array($cattopbannersIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($cattopbannersIds as $cattopbannersId) {
                    $cattopbanners = Mage::getSingleton('cattopbanners/cattopbanners')
                        ->load($cattopbannersId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($cattopbannersIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'cattopbanners.csv';
        $content    = $this->getLayout()->createBlock('cattopbanners/adminhtml_cattopbanners_exportdata')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'cattopbanners.xml';
        $content    = $this->getLayout()->createBlock('cattopbanners/adminhtml_cattopbanners_exportdata')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}
