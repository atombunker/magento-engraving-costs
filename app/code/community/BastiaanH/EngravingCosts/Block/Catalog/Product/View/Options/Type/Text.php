<?php
/**
 * @category  BastiaanH
 * @package   BastiaanH_EngravingCosts
 * @copyright Copyright (C) 2017 BastiaanH https://github.com/bastiaanh
 * @license   https://opensource.org/licenses/mit  MIT License (MIT)
 */

/**
 * Frontend Custom Options Text Block
 */
class BastiaanH_EngravingCosts_Block_Catalog_Product_View_Options_Type_Text
    extends Mage_Catalog_Block_Product_View_Options_Type_Text
{
    /**
     * Make sure the module name stays Mage_Catalog so other translations are loaded correctly.
     */
    protected function _construct()
    {
        $this->setModuleName('Mage_Catalog');
        return parent::_construct();
    }

    /**
     * Add 'per character' suffix to the price label of the custom option.
     *
     * @return string
     */
    public function getFormatedPrice()
    {
        $priceStr = parent::getFormatedPrice();

        if ($priceStr !== '') {
            if ($this->getOption()->getPriceType() == 'perchar') {
                $suffixText = $this->helper('bastiaanh_engravingcosts')->__(' per character');
                $suffixHtml = '&nbsp;' . $this->escapeHtml($suffixText);

                // add the suffix html before last closing span tag if found
                $pos = stripos($priceStr, '</span>');
                if ($pos !== false) {
                    $priceStr = substr($priceStr, 0, $pos) . $suffixHtml . substr($priceStr, $pos);
                }
                else {
                    $priceStr .= $suffixHtml;
                }
            }
        }

        return $priceStr;
    }
}
