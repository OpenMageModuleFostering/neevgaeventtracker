<?php

class Neev_Gaevent_Block_Adminhtml_Gaevent_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('gaevent_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('gaevent')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('gaevent')->__('Item Information'),
          'title'     => Mage::helper('gaevent')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('gaevent/adminhtml_gaevent_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}