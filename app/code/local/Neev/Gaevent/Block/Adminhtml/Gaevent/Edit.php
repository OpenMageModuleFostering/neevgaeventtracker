<?php

class Neev_Gaevent_Block_Adminhtml_Gaevent_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'gaevent';
        $this->_controller = 'adminhtml_gaevent';
        
        $this->_updateButton('save', 'label', Mage::helper('gaevent')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('gaevent')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('gaevent_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'gaevent_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'gaevent_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('gaevent_data') && Mage::registry('gaevent_data')->getId() ) {
            return Mage::helper('gaevent')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('gaevent_data')->getTitle()));
        } else {
            return Mage::helper('gaevent')->__('Add Item');
        }
    }
}