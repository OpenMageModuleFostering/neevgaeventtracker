<?php

class Neev_Gaevent_Model_Mysql4_Gaevent_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('gaevent/gaevent');
    }
}