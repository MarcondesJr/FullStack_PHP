<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use source\Database\Conx;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

$stmt = Conx::getInstance()->prepare("SELECT * FROM users LIMIT 1");
$stmt->execute();
var_dump(
    $stmt,
    $stmt->rowCount(),
    $stmt->columnCount(),
    $stmt->fetch()
);

/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);
$stmt = Conx::getInstance()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (?, ?)
");
$stmt->bindValue(1, "Junior");
$stmt->bindValue(2, "Junior");
$stmt->execute();
var_dump(
    $stmt->rowCount(),
    Conx::getInstance()->lastInsertId()
);

$stmt = Conx::getInstance()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (:first_name, :last_name)
");
$stmt->bindValue(":first_name", "João");
$stmt->bindValue(":last_name", "das neves");
$stmt->execute();
var_dump(
    $stmt->rowCount(),
);
/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);
$stmt = Conx::getInstance()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (:first_name, :last_name)
");
$firstName = "João";
$lastName = "das Neves";
$stmt->bindParam(":first_name", $firstName);
$stmt->bindParam(":last_name", $lastName);
$stmt->execute();
var_dump(
    $stmt->rowCount(),
);
/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);
$stmt = Conx::getInstance()->prepare("
    INSERT INTO users (first_name, last_name)
    VALUES (:first_name, :last_name)
");

$user = [
    "first_name" => "Patrick",
    "last_name" => "Brian"
];
$stmt->execute($user);
var_dump(
    $stmt->rowCount(),
);

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);
$stmt = Conx::getInstance()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();
$stmt->bindColumn("first_name", $nome);
$stmt->bindColumn("email", $email);
while ($user = $stmt->fetch()){
    var_dump($user);
    echo "<p class='trigger accept'>O email de {$nome} é {$email}.!</p>";
}