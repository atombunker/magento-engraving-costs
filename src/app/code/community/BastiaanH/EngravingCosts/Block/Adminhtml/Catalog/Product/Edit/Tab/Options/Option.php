<?php
/**
 * @category  BastiaanH
 * @package   BastiaanH_EngravingCosts
 * @copyright Copyright (C) 2017 BastiaanH https://github.com/bastiaanh
 * @license   https://opensource.org/licenses/mit  MIT License (MIT)
 */

/**
 * Admin Product Custom Option Edit Block
 */
class BastiaanH_EngravingCosts_Block_Adminhtml_Catalog_Product_Edit_Tab_Options_Option
    extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option
{
    /**
     * Format price value for use in input field in admin panel. Here we need
     * to add our 'perchar' price type, else the price field stays empty after
     * saving.
     *
     * @param mixed  $value
     * @param string $type
     * @return string
     */
    public function getPriceValue($value, $type)
    {
        if ($type === 'perchar') {
            $result = number_format($value, 2, null, '');
        } else {
            $result = parent::getPriceValue($value, $type);
        }

        return $result;
    }
}
