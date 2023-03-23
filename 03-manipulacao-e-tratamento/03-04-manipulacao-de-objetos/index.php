<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    "name" => "Marcondes",
    "company" => "VAT Tecnologia",
    "mail" => "marcondes.junior@vat.com.br"
];
$objProfile = (object)$arrProfile;
//var_dump($objProfile);

echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
echo "<p>{$objProfile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;

unset($ceo->company);
var_dump($ceo);

$company = new stdClass();
$company->company = "Vat Tecnologia";
$company->ceo = $ceo;
$company->manager = new stdClass();
$company->manager->name = "Junior";
$company->manager->mail = "junior@gmail.com";

var_dump($company);

/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

$date = new DateTime();
var_dump([
    "class" => get_class($date),
    "methods" => get_class_methods($date),
    "vars" => get_object_vars($date),
    "parents" =>get_parent_class($date),
    "subclass" => is_subclass_of($date, "DateTime"),
]);

$exceṕtion = new PDOException();
var_dump([
    "class" => get_class($exceṕtion),
    "methods" => get_class_methods($exceṕtion),
    "vars" => get_object_vars($exceṕtion),
    "parents" =>get_parent_class($exceṕtion),
    "subclass" => is_subclass_of($exceṕtion, "Exception"),
]);