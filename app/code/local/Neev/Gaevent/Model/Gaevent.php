<?php

class Neev_Gaevent_Model_Gaevent extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('gaevent/gaevent');
    }
}