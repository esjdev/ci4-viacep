# Modulo Via CEP para CodeIgniter 4

## Requisitos

* `PHP >= 7.4`

## Instalação

```
composer require esjdev/ci4-viacep
```

## Controller

Utilize o service searchCep e searchAddress como no exemplo abaixo.

~~~php
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $cep = service('searchCep');
        $address = service('searchAddress');

        $data = [
            'searchCep' => $cep->cep('01001000'),
            'searchAddress' => $address->address("RS", "Porto Alegre", "Domingos")
        ];

        return view('home', $data);
    }
}
~~~
## View

#### Busca por CEP específico
~~~php
CEP: <?= $searchCep['cep'] ?>
Logradouro: <?= $searchCep['logradouro'] ?>
Complemento: <?= $searchCep['complemento'] ?>
Bairro: <?= $searchCep['bairro'] ?>
Localidade: <?= $searchCep['localidade'] ?>
UF: <?= $searchCep['uf'] ?>
IBGE: <?= $searchCep['ibge'] ?>
GIA: <?= $searchCep['gia'] ?>
DDD: <?= $searchCep['ddd'] ?>
SIAFI: <?= $searchCep['siafi'] ?>
~~~

#### Busca por endereços
~~~php
<?php foreach ($searchAddress as $value): ?>

CEP: <?= $value['cep'] ?>
Logradouro: <?= $value['logradouro'] ?>
Complemento: <?= $value['complemento'] ?>
Bairro: <?= $value['bairro'] ?>
Localidade: <?= $value['localidade'] ?>
UF: <?= $value['uf'] ?>
IBGE: <?= $value['ibge'] ?>
GIA: <?= $value['gia'] ?>
DDD: <?= $value['ddd'] ?>
SIAFI: <?= $value['siafi'] ?>

<?php endforeach; ?>
~~~

### Logs de erros
```
Erros ficam salvos em /writable/logs
```
###### O diretório dos logs fica na raiz do CodeIgniter 4, e não do modulo.

## Author

Feito com muito ❤️ por ESJDEV.

Para entrar em contato comigo!👋🏽

[![Linkedin Badge](https://img.shields.io/badge/-Linkedin-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/esjunior/)](https://www.linkedin.com/in/esjunior/)
[![Gmail Badge](https://img.shields.io/badge/-Email-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:seelefighter@gmail.com)](mailto:seelefighter@gmail.com)

## LICENSE

This project is licensed under the MIT License - see the [LICENSE](https://github.com/esjdev/ci4-viacep/blob/master/LICENSE) file for details