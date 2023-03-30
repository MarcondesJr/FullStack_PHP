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
    "marcondestecinfo@gmail.com",
    "Marcondes Junior"
);

$email->attach(__DIR__ . "/../../apple-tv-256.png", "AppleTV+");
$email->attach(__DIR__ . "/../../mariadb-256.png", "Maria DB");

if ($email->send()){
    echo message()->success("E-mail enviado com sucesso!");
}else {
    echo $email->message();
}