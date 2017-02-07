# Engraving Costs Extension for Magento

## Description
This extension adds *Per Character* price calculation to Magento custom options. With this price type, the price is
multiplied by the length of the text entered by the customer. An example of this is when a fee needs to be charged for
engraving a custom text into a product.

The price is calculated immediately by the JavaScript while the customer enters the text, and once more by the PHP code
when the product is added to the cart.

This extension was tested with Magento 1.9.2.4 but should work with Magento 1.6 and higher.

## Installation
1. Copy the extension folders `app/` and `js/` onto your Magento installation
2. Login to the Magento Admin Panel and flush all caches

## Usage
1. Login to the Magento Admin Panel and create or edit a product
2. Create or edit a custom option with input type *Text Field* or *Text Area*
3. Under price, enter the price of one character, and select *Per Character* as price type
4. Save the product and check it on the frontend

## License
The project is licensed under the MIT license.
