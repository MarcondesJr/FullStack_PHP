<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.05 - Interpretação e operações pt1");

require __DIR__ . "/source/autoload.php";

/*
 * [ construct ] Executado automaticamente por meio do operador new
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__construct", __LINE__);

$user = new \Source\Interpretation\User(
    "Marcondes",
    "Junior",
    "email@email.com"
);
var_dump($user);

/*
 * [ clone ] Executado automaticamente quando um novo objeto é criado a partir do operador clone.
 * http://php.net/manual/pt_BR/language.oop5.cloning.php
 */
fullStackPHPClassSession("__clone", __LINE__);

$marcondes = $user;

$patrick = $marcondes;
$patrick->setFirstName("Patrick");
$patrick->setLatsName("Brian");
$patrick->setEmail("teste@email.com");

$marcondes->setFirstName("Marcondes");
$marcondes->setLatsName("junior");

$patrick = clone $marcondes;
$patrick->setFirstName("Patrick");
$patrick->setLatsName("Brian");
$patrick->setEmail("teste2@email.com");

$paula = clone $marcondes;

var_dump(
    $marcondes,
    $patrick,
    $paula
);

/*
 * [ destruct ] Executado automaticamente quando o objeto é finalizado
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__destruct", __LINE__);

