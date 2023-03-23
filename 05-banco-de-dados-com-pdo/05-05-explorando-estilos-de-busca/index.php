<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use source\Database\Conx;

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);
$conx = Conx::getInstance();

$read = $conx->query("SELECT * FROM users LIMIT 3");

if (!$read->rowCount()) {
    echo "<p class='trigger warning'>Não obteve resultados.!</p>";
}else{
    //var_dump($read->fetch());
    while ($user = $read->fetch()){
        var_dump($user);
    }
}
/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);
$read = $conx->query("SELECT * FROM users LIMIT 3,2");

//while ($user = $read->fetchAll()){
//    var_dump($user);
//}
foreach ($read->fetchAll() as $user) {
    var_dump($user);
}

/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);
$read = $conx->query("SELECT * FROM users LIMIT 5,2");
$result = $read->fetchAll();
var_dump(
    $result
);
/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);
$read = $conx->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll() as $user) {
    var_dump($user);
}
$read = $conx->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_NUM) as $user) {
    var_dump($user, $user[1]);
}
$read = $conx->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $user) {
    var_dump($user, $user['first_name']);
}
 "----------";
$read = $conx->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_CLASS, \Source\Database\Entity\UserEntity::class) as $user) {
    /** @var \Source\Database\Entity\UserEntity $user */
    var_dump($user, $user->getFirstName());
}
