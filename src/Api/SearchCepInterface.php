<?php

declare(strict_types=1);

namespace EsjDev\ViaCep\Api;

/**
 * Interface SearchCepInterface
 *
 * @author      ESJDev <https://github.com/esjdev>
 */
interface SearchCepInterface extends ViaCepInterface
{
    /**
     * Method Cep
     *
     * @param string $cep
     *
     * @return array
     */
    public function cep(string $cep): array;
}
