<?php
/*
* @category GAevent
* @package Neev_Gaevent
* @auton chitra
*/

class Neev_Gaevent_Model_Message
{
        public function getCommentText(){ //this method must exits. It returns the text for the comment
            $html = "";
            $tempVar =  Mage::getStoreConfig('google/analytics/active');

            if($tempVar == 0 || $tempVar == ''){ // check whether google analytics is on/off
                $html = 'This module is Google analytics dependent and it seems to disable. <a href="'.Mage::helper("adminhtml")->getUrl("/system_config/edit/section/google").'" target="_blank">Click here</a> to enable google analytics.';    
            }else{
               $html = 'This module is Google analytics dependent';
            }
        return $html; 
    }

}