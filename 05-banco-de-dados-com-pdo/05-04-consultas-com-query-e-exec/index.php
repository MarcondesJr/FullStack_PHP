<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Conx;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);
$insert = "
INSERT INTO users (first_name,  last_name, email, document)
VALUES ('Marcondes', 'Junior', 'teste@teste.com', '12345678900')
";
try {
    //$exec = Conx::getInstance()->exec($insert);
    //var_dump(Conx::getInstance()->lastInsertId());
    $exec = null;
    $query = Conx::getInstance()->query($insert);
    var_dump(Conx::getInstance()->lastInsertId());
    var_dump(
        $exec,
        $query
    );
}catch (PDOException $exception){
    var_dump($exception);
}

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try {
    $query = Conx::getInstance()->query("SELECT * FROM users LIMIT 3");
    var_dump([
        $query,
        $query->rowCount(),
        $query->fetchAll()
    ]);
}catch (PDOException $exception){
    var_dump($exception);
}
/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try {
    $exec = Conx::getInstance()->exec("
        UPDATE users SET first_name = 'Junior', last_name = 'Correa', email = 'email@email.com', document = '0987654321'
        WHERE id = '1'
    ");
    var_dump($exec);
}catch (PDOException $exception){
    var_dump($exception);
}
/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try {
    $exec = Conx::getInstance()->exec("DELETE FROM users WHERE id > 50");
    var_dump($exec);
}catch (PDOException $exception){
    var_dump($exception);
}