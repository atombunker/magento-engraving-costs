<?php
/**
 * @category  BastiaanH
 * @package   BastiaanH_EngravingCosts
 * @copyright Copyright (C) 2017 BastiaanH https://github.com/bastiaanh
 * @license   https://opensource.org/licenses/mit  MIT License (MIT)
 */

/**
 * Product text option model
 */
class BastiaanH_EngravingCosts_Model_Catalog_Product_Option_Type_Text
    extends Mage_Catalog_Model_Product_Option_Type_Text
{
    /**
     * Returns price for selected option. Here the backend price calculation is
     * performed for our 'perchar' price type.
     *
     * @param string $optionValue Prepared for cart option value
     * @param float $basePrice For percent price type
     * @return float
     */
    public function getOptionPrice($optionValue, $basePrice)
    {
        $option = $this->getOption();

        if ($option->getPriceType() === 'perchar') {
            // get number of characters
            $length = Mage::helper('core/string')->strlen($optionValue);

            // multiply number of characters by price
            $result = $option->getPrice() * $length;
        } else {
            $result = parent::getOptionPrice($optionValue, $basePrice);
        }

        return $result;
    }
}
