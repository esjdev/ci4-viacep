<?php

declare(strict_types=1);

namespace EsjDev\ViaCep\Api;

/**
 * Interface ViaCepInterface
 *
 * @author      ESJDev <https://github.com/esjdev>
 */
interface ViaCepInterface
{
    const URL_WEBSERVICE = 'https://viacep.com.br/ws';
    const CEP_LENGTH = 8;
    const ADDRESS_LENGTH = 3;
}
