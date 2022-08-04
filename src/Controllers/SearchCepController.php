<?php

declare(strict_types=1);

namespace EsjDev\ViaCep\Controllers;

use App\Controllers\BaseController;
use EsjDev\ViaCep\Api\SearchCepInterface;
use Psr\Log\LoggerInterface;

/**
 * Class SearchCepController
 *
 * Classe responsável por buscar informações de um cep específico
 *
 * @author      ESJDev <https://github.com/esjdev>
 */
class SearchCepController extends BaseController implements SearchCepInterface
{
    /**
     * Method Cep
     *
     * Valida o CEP específico e retorna os dados
     *
     * @param string $cep
     *
     * @return array
     */
    public function cep(string $cep): array
    {
        $logger = service('logger');

        if (empty($cep)
            || strlen($cep) < self::CEP_LENGTH
            || strlen($cep) > self::CEP_LENGTH) {
            $logger->error(sprintf("Module ViaCEP: Um CEP no formato de %s dígitos deve ser fornecido.", self::CEP_LENGTH));
            return [];
        }

        return $this->curlRequest($cep, $logger);
    }

    /**
     * Method CurlRequest
     *
     * @param string          $cep
     * @param LoggerInterface $logger
     *
     * @return array
     */
    private function curlRequest(string $cep, LoggerInterface $logger): array
    {
        $client = service('curlrequest');

        $response = $client->get(self::URL_WEBSERVICE . "/$cep/json/");

        $info = json_decode($response->getBody(), true);

        if ($info['erro'] === 'true') {
            $logger->error("Module ViaCEP: O CEP consultado não foi encontrado na base de dados.");
        }

        return $info;
    }
}
