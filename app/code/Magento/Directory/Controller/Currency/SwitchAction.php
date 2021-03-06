<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Directory\Controller\Currency;

class SwitchAction extends \Magento\Framework\App\Action\Action
{
    /**
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Store\Model\StoreManagerInterface $storeManager */
        $storeManager = $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface');
        $currency = (string)$this->getRequest()->getParam('currency');
        if ($currency) {
            $storeManager->getStore()->setCurrentCurrencyCode($currency);
        }
        $storeUrl = $storeManager->getStore()->getBaseUrl();
        $this->getResponse()->setRedirect($this->_redirect->getRedirectUrl($storeUrl));
    }
}
