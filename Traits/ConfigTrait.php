<?php

namespace RamosHenrique\AdminTMDB\Traits;

trait ConfigTrait
{
    /**
     * Retrieve config data for our namespace
     *
     * @param string $param
     * 
     * @return mixed
     */
    public function getConfig($param)
    {
        if (!$this->scopeConfig) {
            throw new BadFunctionCallException('Instantiate the scopeConfig inside your class');
        }

        return $this->scopeConfig->getValue('ramoshenrique_admintmdb/' . $param);
    }
}