/**
 * @category  BastiaanH
 * @package   BastiaanH_EngravingCosts
 * @copyright Copyright (C) 2017 BastiaanH https://github.com/bastiaanh
 * @license   https://opensource.org/licenses/mit  MIT License (MIT)
 */

Event.observe(document, 'dom:loaded', function () {
    var fields = $$('input.product-custom-option, textarea.product-custom-option');
    // calculate price when key is released
    fields.invoke('observe', 'keyup', function (field) {
        if (typeof opConfig.reloadPrice != 'undefined') {
            opConfig.reloadPrice();
        }
    });
});

Product.OptionsPrice.prototype.addCustomPrices = Product.OptionsPrice.prototype.addCustomPrices.wrap(
    function (orig, key, price) {
        if (price.type == 'perchar') {
            // calculate fixed price
            var price = Object.clone(price);
            price.type = 'fixed';

            // get number of characters
            var length = $(key).getValue().length;

            // multiply number of characters by price
            ['excludeTax', 'includeTax', 'oldPrice', 'price', 'priceValue'].each(function (prop) {
                if (typeof price[prop] != 'undefined') {
                    price[prop] *= length;
                }
            });
        }
        return orig(key, price);
    }
);
