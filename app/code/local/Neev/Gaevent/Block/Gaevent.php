<?php
class Neev_Gaevent_Block_Gaevent extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getGaevent()     
     { 
        if (!$this->hasData('gaevent')) {
            $this->setData('gaevent', Mage::registry('gaevent'));
        }
        return $this->getData('gaevent');
        
    }
}