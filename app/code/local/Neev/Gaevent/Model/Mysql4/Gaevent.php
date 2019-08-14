<?php

class Neev_Gaevent_Model_Mysql4_Gaevent extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the gaevent_id refers to the key field in your database table.
        $this->_init('gaevent/gaevent', 'gaevent_id');
    }
}