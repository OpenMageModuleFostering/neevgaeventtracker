<?php
/**
 * Html Select Element
 *
 * @category   Msat
 * @package    Msat_Yourmodule
 * @author     Ville K
 */
class Neev_Gaevent_Block_Text
    extends Mage_Core_Block_Text
{
    /**
     * Return output in one line
     *
     * @return string
     */
    public function _toHtml()
    {
        return trim(preg_replace('/\s+/', ' ',parent::_toHtml()));
    }
}
?>