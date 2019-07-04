<?php

namespace RamosHenrique\AdminTMDB\Helpers;

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Integration\Model\Oauth\Token;

class TMDBHelper
{
    /**
     * Retrieve config data for our namespace
     *
     * @param string $param
     * 
     * @return string
     */
    public function getConfig(string $param): string
    {
        $bootstrap = Bootstrap::create(BP, $_SERVER);
        $scopeConfig = $bootstrap->getObjectManager()->get(ScopeConfigInterface::class);

        return $scopeConfig->getValue('ramoshenrique_admintmdb/' . $param);
    }

    /**
     * Get admin Bearer token based on admin Id
     *
     * @param int $adminId
     * 
     * @return string
     */
    public function getAdminToken(int $adminId): string
    {
        $bootstrap = Bootstrap::create(BP, $_SERVER);
        $tokenService = $bootstrap->getObjectManager()->get(Token::class);
        return $tokenService->createAdminToken($adminId)->getToken();
    }
}