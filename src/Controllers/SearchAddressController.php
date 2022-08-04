<?php

declare(strict_types=1);

namespace EsjDev\ViaCep\Controllers;

use App\Controllers\BaseController;
use EsjDev\ViaCep\Api\SearchAddressInterface;
use Psr\Log\LoggerInterface;

/**
 * Class SearchAddressController
 *
 * Classe responsável por buscar informações de endereços
 *
 * @author      ESJDev <https://github.com/esjdev>
 */
class SearchAddressController extends BaseController implements SearchAddressInterface
{
    /**
     * Method Address
     *
     * Pesquisa por endereço (Estado, Cidade e Endereço)
     *
     * @param string $uf
     * @param string $city
     * @param string $address
     *
     * @return array
     */
    public function address(string $uf, string $city, string $address): array
    {
        $logger = service('logger');

        if (empty($uf)
            || strlen($city) < self::ADDRESS_LENGTH
            || strlen($address) < self::ADDRESS_LENGTH) {
            $logger->error(sprintf("Module ViaCEP: Cidade\Endereço precisam ter %s dígitos no minimo.", self::ADDRESS_LENGTH));
            return [];
        }

        return $this->curlRequest($uf, rawurlencode($city), rawurlencode($address), $logger);
    }

    /**
     * Method CurlRequest
     *
     * @param string $uf
     * @param string $city
     * @param string $address
     * @param LoggerInterface $logger
     *
     * @return array
     */
    private function curlRequest(
        string $uf,
        string $city,
        string $address,
        LoggerInterface $logger
    ): array {
        $client = service('curlrequest');

        $response = $client->get(self::URL_WEBSERVICE . "/$uf/$city/$address/json/");

        $info = json_decode($response->getBody(), true);

        if (empty($info)) {
            $logger->error("Module ViaCEP: O endereço consultado não foi encontrado.");
        }

        return $info;
    }
}
