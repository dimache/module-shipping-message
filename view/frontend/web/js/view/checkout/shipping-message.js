define([
        'jquery',
        'ko',
        'uiComponent',
        'Magento_Checkout/js/model/quote',
        'Dimache_ShippingMessage/js/model/config'
    ], function (
        $, ko, Component, quote, config) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Dimache_ShippingMessage/checkout/shipping-message',
            },
            config: config(),
            initObservable: function () {
                var self = this;

                this.isAvailableShippingMessage = ko.computed(function() {
                    var method = quote.shippingMethod();
                    var selectedMethod = method != null ? method.method_code : null;

                    return !(!selectedMethod || !self.checkAvailability());
                }, this);

                return this;
            },
            estimateShippingMessageContent: function () {
                return this.config.message;
            },
            checkAvailability: function () {
                var self = this;
                if(quote.isVirtual()) {
                    return false;
                }
                if(!quote.shippingAddress()) {
                    return false;
                }

                var country = quote.shippingAddress().countryId;

                if(self.config.enabled && !self.config.allowSpecific) {
                    return true;
                }

                if(self.config.allowSpecific && self.config.getSpecificCountry) {
                    if( self.config.getSpecificCountry.split(',').indexOf(country) > -1 ) {
                        return true
                    }
                }
                return false;
            },
        });
    }
);
