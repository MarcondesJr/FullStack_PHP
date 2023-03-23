<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);

require __DIR__."/class/User.php";

$user = new User();
var_dump($user);

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

$user->firstName = "Marcondes";
$user->lastName = "Junior";
$user->email = "marcondes.junior@gmail.com";

var_dump($user);

echo "<p>O e-mail de {$user->firstName} é {$user->email}!</p>";

/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Nunes");
$user->setLastName("Correa");

if (!$user->setEmail("marcondes.junior@gmail.com")) {
    echo "<p class='trigger error'>O e-mail {$user->getEmail()} não é válido!</p>";
}

var_dump($user);