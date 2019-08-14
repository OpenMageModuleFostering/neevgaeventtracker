<?php
class Neev_Gaevent_Model_Words
{
    public function toOptionArray()
    {
        return array(
            array('value'=>1, 'label'=>Mage::helper('gaevent')->__('Yes')),
            array('value'=>0, 'label'=>Mage::helper('gaevent')->__('No')),                    
        );
    }

}
?>