<?php
class Neev_Gaevent_Block_EcommerceCheck extends Mage_Adminhtml_Block_System_Config_Form_Field{
    const CONFIG_PATH = 'path/to/positions'; //put here the full path from the config to your element
    protected $_values = null;
    protected function _construct()
    {
        $this->setTemplate('[namespace]_[module]/system/config/positions.phtml');
        return parent::_construct();
    }
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setNamePrefix($element->getName())
            ->setHtmlId($element->getHtmlId());
        return $this->_toHtml();
    }
    public function getValues(){
        $values = array();
        //get the available values (use the source model from your question)
        foreach (Mage::getSingleton('customodule/model')->toOptionArray() as $value){
            $values[$value['value']] = $value['label'];
        }
        return $values;
    }
    public function getIsChecked($name){
        return in_array($name, $this->getCheckedValues());
    }
    public function getCheckedValues(){
        if (is_null($this->_values)){
            $data = $this->getConfigData();
            if (isset($data[self::CONFIG_PATH])){
                $data = $data[self::CONFIG_PATH];
            }
            else{
                $data = '';
            }
            $this->_values = explode(',', $data);
        }
        return $this->_values;
    }
}

?>