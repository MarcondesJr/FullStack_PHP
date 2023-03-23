<?php

use Source\App\User;
use Source\Bank\AccountCurrent;
use Source\Bank\AccountSaving;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);
$client = new User(
    "Marcondes",
    "Junior"
);

var_dump($client);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);
$saving = new AccountSaving(
    "1234",
    "567890",
    $client,
    "0"
);

var_dump(
    $saving
);
$saving->deposit(1000);
$saving->extract();
$saving->withdrawal(1000);
$saving->extract();

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new AccountCurrent(
    "1234",
    "67890",
    $client,
    "1000",
    "1000"
);

var_dump($current);

$current->deposit(1000);
$current->extract();
$current->withdrawal(2000);
$current->withdrawal(500);
$current->extract();