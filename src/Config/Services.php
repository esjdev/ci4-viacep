<?php

declare(strict_types=1);

namespace EsjDev\ViaCep\Config;

use CodeIgniter\Config\BaseService;
use EsjDev\ViaCep\Controllers\SearchCepController;
use EsjDev\ViaCep\Controllers\SearchAddressController;

/**
 * Class Services
 *
 * @author      ESJDev <https://github.com/esjdev>
 */
class Services extends BaseService
{
    /**
     * Method SearchCep
     *
     * Load module ViaCEP
     *
     * @param bool $getShared
     *
     * @return mixed|SearchCepController
     */
    public static function searchCep(bool $getShared = true): SearchCepController
    {
        if ($getShared) {
            return static::getSharedInstance('searchCep');
        }

        return new SearchCepController();
    }

    /**
     * Method searchAddress
     *
     * Load module ViaCEP
     *
     * @param bool $getShared
     *
     * @return mixed|SearchAddressController
     */
    public static function searchAddress(bool $getShared = true): SearchAddressController
    {
        if ($getShared) {
            return static::getSharedInstance('searchAddress');
        }

        return new SearchAddressController();
    }
}
