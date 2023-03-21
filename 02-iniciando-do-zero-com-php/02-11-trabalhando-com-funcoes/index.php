<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__ . "/functions.php";

var_dump(functionName(1,2,3));
var_dump(optionArgs("Marcondes"));
var_dump(optionArgs("Marcondes", "Nunes"));
var_dump(optionArgs("Marcondes", "Nunes", "Junior"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);
$weight = 101;
$height = 1.79;
echo calcImc();

/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);
$pay = payTotal(200);
$pay = payTotal(150);
$pay = payTotal(500);
echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("Marcondes", "Nunes", "Correa", "Junior"));