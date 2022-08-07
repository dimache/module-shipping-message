<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Dimache\ShippingMessage\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Escaper;
use Dimache\ShippingMessage\Model\Config;

class ShippingMessageConfigProvider implements ConfigProviderInterface
{
    private $config;
    private $escaper;

    public function __construct(
        Config $config,
        Escaper $escaper
    ) {
        $this->config = $config;
        $this->escaper = $escaper;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return [
            'dimache_shipping_message' => [
                'enabled' => (int)$this->config->isEnabled(),
                'allowSpecific' => $this->config->getAllowSpecific(),
                'getSpecificCountry' => $this->config->getSpecificCountry(),
                'message' => $this->escaper->escapeHtml((string)$this->config->getMessage()),
            ]
        ];
    }

}
