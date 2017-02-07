<?php
/**
 * @category  BastiaanH
 * @package   BastiaanH_EngravingCosts
 * @copyright Copyright (C) 2017 BastiaanH https://github.com/bastiaanh
 * @license   https://opensource.org/licenses/mit  MIT License (MIT)
 */

/**
 * Admin Product Custom Option Edit Type Block
 */
class BastiaanH_EngravingCosts_Block_Adminhtml_Catalog_Product_Edit_Tab_Options_Type_Text
    extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Type_Text
{
    /**
     * For the 'text' type, here we add our new price type 'perchar' to the dropdown list.
     * To add an option to all input types, rewrite the adminhtml/system_config_source_product_options_price model.
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $options = Mage::getSingleton('adminhtml/system_config_source_product_options_price')->toOptionArray();

        $options[] = array(
            'value' => 'perchar',
            'label' => $this->helper('bastiaanh_engravingcosts')->__('Per Character')
        );
        $this->getChild('option_price_type')->setOptions($options);

        return $this;
    }
}
