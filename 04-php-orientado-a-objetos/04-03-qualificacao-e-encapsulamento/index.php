<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);
require __DIR__."/classes/App/Template.php";
require __DIR__."/classes/Web/Template.php";

$appTemplate = new App\Template();
$webTemplate = new Web\Template();

var_dump(
    $appTemplate,
    $webTemplate
);
use App\Template;
use Web\Template as WebTemplate;

$appUseTemplate = new Template();
$webUseTemplate = new WebTemplate();

var_dump(
    $appUseTemplate,
    $webUseTemplate
);

/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);
require __DIR__."/source/Qualifield/User.php";

$user = new \Source\Qualifield\User();

//$user->firstName = "Marcondes";
//$user->lastName = "Junior";
//$user->setFirstName("patrick");
//$user->setLastName("brian");
var_dump(
    $user,
    get_class_methods($user)
);

echo "<p>O e-mail de {$user->getFirstName()} é {$user->getEmail()}!</p>";

/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

$marcondes = $user->setUser(
    "Marcondes",
    "Junior",
    "teste@teste.com"
);

if (!$marcondes) {
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

$patrick = new \Source\Qualifield\User();
$patrick->setUser(
    "Patrick",
    "Brian",
    "patrick@gmail.com"
);

$paula = new \Source\Qualifield\User();
$paula->setUser(
    "Zilma",
    "Paula",
    "paula@gmail.com"
);

var_dump(
    $user,
    $patrick,
    $paula
);
