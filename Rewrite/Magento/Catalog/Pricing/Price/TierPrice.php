<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Genaker\TierPrice\Rewrite\Magento\Catalog\Pricing\Price;

class TierPrice extends \Magento\Catalog\Pricing\Price\TierPrice
{

     /**
     * Get price value
     *
     * @return bool|float
     */
    public function getValue()
    {
	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
	$request = $objectManager->get('\Magento\Framework\App\Request\Http');
	$session = $objectManager->get('\Magento\Customer\Model\Session');

	if ($request->getFullActionName() == 'catalog_category_view' && !$session->isLoggedIn()){
	 return false;
	}
	
	return parent:getValue();
    }
}
