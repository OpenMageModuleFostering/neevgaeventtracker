<?php
/*
* @category GAevent Observer
* @package Neev_Gaevent
* @auton chitra
* On click of save config js file will get created.
*/
class Neev_Gaevent_Model_Observer
{



    /*
     * Observer created on save of google analytics to disable gaevent module if google analytics is turned off
    */
    public function enableDisableGaevent(Varien_Event_Observer $observer){
        $isGoogleAnalyticsActive =  Mage::getStoreConfig('google/analytics/active');
        if($isGoogleAnalyticsActive == 0 || $isGoogleAnalyticsActive == ''){
             Mage::getModel('core/config')->saveConfig('gaevent_options/messages/enable', 0); 
        }    
    }


    /*
     * Js file creation
    */
    public function createGaJsFile(Varien_Event_Observer $observer)
    { 
    	 $isGoogleAnalyticsActive =  Mage::getStoreConfig('google/analytics/active'); 
         if($isGoogleAnalyticsActive != 0 || $isGoogleAnalyticsActive != ''){
        	 $trackingElements = unserialize(Mage::getStoreConfig('gaevent_options/messages/allowed_methods'));
        	 $trackingElementsSize = count($trackingElements);
             $trackingElementType = $trackingElements['method'];
             $flag =0;
             $urlFlag = 0;
             $idFlag = 0;
             $clsnameFlag = 0;
             $tempArray = array();
                foreach ($trackingElementType  as $key => $value) { //array creation for json encode
                    switch ($value) {
                        case 'URL':
                        if($trackingElements['uic'][$flag] != ''){
                            $tempArray['URL'][$urlFlag]['name'] = $trackingElements['uic'][$flag];
                            $tempArray['URL'][$urlFlag]['action'] = $trackingElements['action'][$flag];
                            $tempArray['URL'][$urlFlag++]['label'] = $trackingElements['label'][$flag];
                        }
                            break;
                          case 'ID':
                        $tempArray['ID'][$idFlag]['name'] = $trackingElements['uic'][$flag];
                        $tempArray['ID'][$idFlag]['action'] = $trackingElements['action'][$flag];
                        $tempArray['ID'][$idFlag++]['label'] = $trackingElements['label'][$flag];
                            break;      
                        case 'Classname':
                        $tempArray['Classname'][$clsnameFlag]['name'] = $trackingElements['uic'][$flag];
                        $tempArray['Classname'][$clsnameFlag]['action'] = $trackingElements['action'][$flag];
                        $tempArray['Classname'][$clsnameFlag++]['label'] = $trackingElements['label'][$flag];  
                            break;
                    }
                   $flag ++;
                }
                    if(count($tempArray) != 0){
                        $jsonData = json_encode($tempArray);
                        $jsonData = "var gaJsonString = ".$jsonData;
                    	$path = Mage::getBaseDir('media') . DS . 'gaevent' . DS;
                        if (!file_exists($path)) { //create folder if not exist
                            mkdir($path, 0777, TRUE);
                        }
                        $filePath = $path . 'gaevent.js';
                        file_put_contents($filePath, $jsonData);
                    }else{
                        $jsonData = 'var gaJsonString = "No Data"';
                        $path = Mage::getBaseDir('media') . DS . 'gaevent' . DS;
                        if (!file_exists($path)) { //create folder if not exist
                            mkdir($path, 0777, TRUE);
                        }
                        $filePath = $path . 'gaevent.js';
                        file_put_contents($filePath, $jsonData);
                    }
            }
    }
}

?>