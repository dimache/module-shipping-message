<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Dimache\ShippingMessage\Model;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_PATH_ENABLED = 'dimache_shipping_message/general/active';
    const XML_PATH_ALLOW_SPECIFIC = 'dimache_shipping_message/general/allowspecific';
    const XML_PATH_SPECIFIC_COUNTRY = 'dimache_shipping_message/general/specificcountry';
    const XML_PATH_MESSAGE = 'dimache_shipping_message/general/message';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getMessage()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MESSAGE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getAllowSpecific()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ALLOW_SPECIFIC,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getSpecificCountry()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SPECIFIC_COUNTRY,
            ScopeInterface::SCOPE_STORE
        );
    }
}
