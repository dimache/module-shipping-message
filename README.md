# Magento2 Module Checkout Shipping Message

    ``dimache/module-shipping-message``

- [Main Functionalities](#markdown-header-main-functionalities)
- [Installation](#markdown-header-installation)
- [Configuration](#markdown-header-configuration)


## Main Functionalities
This module adds a text message when you select a shipping method. You can specify the countries which you need for the show message.

## Installation
    ``composer require dimache/module-shipping-message``

### Type 1: Composer

- Install the module composer by running `composer require dimache/module-shipping-message`
- enable the module by running `php bin/magento module:enable Dimache_ShippingMessage`
- apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

### Type 2: Zip file

- Unzip the zip file in `app/code/Dimache`
- Enable the module by running `php bin/magento module:enable Dimache_ShippingMessage`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`



## Configuration
See available settings in Stores -> Configuration -> Checkout Shipping Message
