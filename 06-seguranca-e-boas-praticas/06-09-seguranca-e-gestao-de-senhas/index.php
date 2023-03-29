<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";
session_start();
/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);

$pass = password_hash(12345, PASSWORD_DEFAULT);
echo $pass;
var_dump([
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify(123445, $pass)
]);

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);
$user = (new \Source\Models\User())->load(1);
$user->password = password_hash(12345, PASSWORD_DEFAULT);
$user->save();

var_dump(password_verify(12345, $user->password));

/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);
$login = (new \Source\Models\User())->find("robson1@email.com.br");
var_dump($login);
if (!$login){
    echo message()->info("Email não encontrado");
}elseif(!password_verify(12345, $login->password)){
    echo message()->error("Senha Inválida");
}else{
    $login->password = password_hash(12345, PASSWORD_DEFAULT);
    $login->save();

    session()->set("login", $login->data());
    echo message()->success("Bem vindo(a) de volta {$login->first_name} !");
    var_dump(session()->all());
}

/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

$pass = "2314134";

var_dump([
    $passwd = passwd($pass),
    passwd_verify(547132, $passwd),
    passwd_rehash($passwd)
]);