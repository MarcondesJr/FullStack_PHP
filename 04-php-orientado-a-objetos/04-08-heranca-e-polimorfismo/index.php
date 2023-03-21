<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new \Source\Inheritance\Event\Event(
    "Workshop FSPHP",
    new DateTime("2023-03-16 16:24"),
    2500,
    "4"
);
var_dump($event);
$event->register("teste01", "teste1@teste.com");
$event->register("teste02", "teste2@teste.com");
$event->register("teste03", "teste3@teste.com");
$event->register("teste04", "teste4@teste.com");
$event->register("teste05", "teste5@teste.com");
/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);
$address = new \Source\Inheritance\Address("Pedrarias de Avilar", "1025", "Japiim, Manaus - AM, 69077-45");
$event = new \Source\Inheritance\Event\EventLive(
    "Workshop FSPHP",
    new DateTime("2023-03-16 16:24"),
    2500,
    "4",
    $address
);
var_dump($event);
$event->register("teste01", "teste1@teste.com");
$event->register("teste02", "teste2@teste.com");
$event->register("teste03", "teste3@teste.com");
$event->register("teste04", "teste4@teste.com");
$event->register("teste05", "teste5@teste.com");
/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$event = new \Source\Inheritance\Event\EventOnline(
    "Workshop FSPHP",
    new DateTime("2023-03-16 16:24"),
    2500,
    "http://youtube.com.br"
);

var_dump($event);
$event->register("teste01", "teste1@teste.com");
$event->register("teste02", "teste2@teste.com");
$event->register("teste03", "teste3@teste.com");
$event->register("teste04", "teste4@teste.com");
$event->register("teste05", "teste5@teste.com");