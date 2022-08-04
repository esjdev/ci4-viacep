<?php

declare(strict_types=1);

namespace EsjDev\ViaCep\Api;

/**
 * Interface SearchAddressInterface
 *
 * @author      ESJDev <https://github.com/esjdev>
 */
interface SearchAddressInterface extends ViaCepInterface
{
    /**
     * Method Address
     *
     * @param string $uf
     * @param string $city
     * @param string $address
     *
     * @return array
     */
    public function address(string $uf, string $city, string $address): array;
}
