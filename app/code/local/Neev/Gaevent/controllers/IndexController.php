<?php
class Neev_Gaevent_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/gaevent?id=15 
    	 *  or
    	 * http://site.com/gaevent/id/15 	
    	 */
    	/* 
		$gaevent_id = $this->getRequest()->getParam('id');

  		if($gaevent_id != null && $gaevent_id != '')	{
			$gaevent = Mage::getModel('gaevent/gaevent')->load($gaevent_id)->getData();
		} else {
			$gaevent = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($gaevent == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$gaeventTable = $resource->getTableName('gaevent');
			
			$select = $read->select()
			   ->from($gaeventTable,array('gaevent_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$gaevent = $read->fetchRow($select);
		}
		Mage::register('gaevent', $gaevent);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}