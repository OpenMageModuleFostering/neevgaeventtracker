<?php
class Neev_Gaevent_Block_Field extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected $_addRowButtonHtml = array();
    protected $_removeRowButtonHtml = array();

    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);
        $html = '<style>.headul{padding: 0 0 26px;width:700px} .headul li{text-align:center;float:left;width:19%;font-weight:bold} .dataul {width:700px} </style>';
        $html .= '<div id="merchant_allowed_methods_template" style="display:none">';
        $html .= $this->_getRowTemplateHtml();
        $html .= '</div>';
        $html .= '<div style="border: 1px solid;margin-bottom: 9px;"><ul class="headul"><li>Element</li><li>Bind Url/ID/classname</li><li>Action</li><li>Label</li></ul>';

        $html .= '<ul class="dataul" id="merchant_allowed_methods_container">';
        if ($this->_getValue('method')) {
            foreach ($this->_getValue('method') as $i => $f) {
                if ($i) {
                    $html .= $this->_getRowTemplateHtml($i);
                }
            }
        }
        $html .= '</ul>';
        $html .= '</div>';
        $html .= $this->_getAddRowButtonHtml('merchant_allowed_methods_container',
            'merchant_allowed_methods_template', $this->__('Add Tracking Event'));
        
        return $html;
    }

    /**
        * Retrieve html template for shipping method row
        *
        * @param int $rowIndex
        * @return string
        * @html string => html for each addition
    */
    protected function _getRowTemplateHtml($rowIndex = 0)
    {
        $html = '<li>';
        $html .= '<div style="border:1px solid #D6D6D6;padding: 10px 7px 32px;">';
        $html .= '<div style="width:20%;float:left;text-align: center;">';
        $html .= '<select style="width:62px;" name="' . $this->getElement()->getName() . '[method][]" ' . $this->_getDisabled() . '>';
        $html .= '<option value="URL" '
                    . $this->_getSelected('method/' . $rowIndex, "URL")
                    . ' style="background:white;">URL</option>';
        $html .= '<option value="ID" '
                    . $this->_getSelected('method/' . $rowIndex, "ID")
                    . ' style="background:white;">ID</option>';
        $html .= '<option value="Classname" '
                    . $this->_getSelected('method/' . $rowIndex, "Classname")
                    . ' style="background:white;">Classname</option>';                                        
        $html .= '</select>';
        $html .= '</div>';
        $html .= '<div style="width:20%;float:left;text-align: center;">';
        $html .= '<input class="input-text" style="width:70px;" name="'
            . $this->getElement()->getName() . '[uic][]" value="'
            . $this->_getValue('uic/' . $rowIndex) . '" ' . $this->_getDisabled() . '/> ';
        $html .= '</div>';
        $html .= '<div style="width:20%;float:left;text-align: center;">';
        $html .= '<input class="input-text" style="width:70px;" name="'
            . $this->getElement()->getName() . '[action][]" value="'
            . $this->_getValue('action/' . $rowIndex) . '" ' . $this->_getDisabled() . '/> ';
        $html .= '</div>';
        $html .= '<div style="width:20%;float:left;text-align: center;">';
        $html .= '<input class="input-text" style="width:70px;" name="'
            . $this->getElement()->getName() . '[label][]" value="'
            . $this->_getValue('label/' . $rowIndex) . '" ' . $this->_getDisabled() . '/> '; 
             $html .= '</div>'; 
        $html .= $this->_getRemoveRowButtonHtml();
        $html .= '</div>';
        $html .= '</li>';
        return $html;
    }

    protected function _getDisabled()
    {
        return $this->getElement()->getDisabled() ? ' disabled' : '';
    }

    protected function _getValue($key)
    {
        return $this->getElement()->getData('value/' . $key);
    }

    protected function _getSelected($key, $value)
    {
        return $this->getElement()->getData('value/' . $key) == $value ? 'selected="selected"' : '';
    }

    protected function _getAddRowButtonHtml($container, $template, $title='Add')
    {
        if (!isset($this->_addRowButtonHtml[$container])) {
            $this->_addRowButtonHtml[$container] = $this->getLayout()->createBlock('adminhtml/widget_button')
                    ->setType('button')
                    ->setClass('add ' . $this->_getDisabled())
                    ->setLabel($this->__($title))
                    ->setOnClick("Element.insert($('" . $container . "'), {bottom: $('" . $template . "').innerHTML})")
                    ->setDisabled($this->_getDisabled())
                    ->toHtml();
        }
        return $this->_addRowButtonHtml[$container];
    }

    protected function _getRemoveRowButtonHtml($selector = 'li', $title = 'Remove')
    {
        if (!$this->_removeRowButtonHtml) {
            $this->_removeRowButtonHtml = $this->getLayout()->createBlock('adminhtml/widget_button')
                    ->setType('button')
                    ->setClass('delete v-middle ' . $this->_getDisabled())
                    ->setStyle('float:right')
                    ->setLabel($this->__($title))
                    ->setOnClick("Element.remove($(this).up('" . $selector . "'))")
                    ->setDisabled($this->_getDisabled())
                    ->toHtml();
        }
        return $this->_removeRowButtonHtml;
    }
}