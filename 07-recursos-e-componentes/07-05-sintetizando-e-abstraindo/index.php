<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);
$email = (new \Source\Core\Email())->bootstrap(
    "Olá mundo! Esse é meu email PDO",
    "<h1>ola Mundo</h1><p>Essa é uma mensagem via rotina da aplicação em PDO.!</p>",
    "mncj.bonno1992@gmail.com",
    "Marcondes Nunes Correa Junior"
);

var_dump($email);