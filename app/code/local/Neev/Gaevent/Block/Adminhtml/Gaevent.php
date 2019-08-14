<?php
class Neev_Gaevent_Block_Adminhtml_Gaevent extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_gaevent';
    $this->_blockGroup = 'gaevent';
    $this->_headerText = Mage::helper('gaevent')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('gaevent')->__('Add Item');
    parent::__construct();
  }
}