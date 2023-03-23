<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.06 - Desmistificando transações");

require __DIR__ . "/../source/autoload.php";

use source\Database\Conx;

/*
 * [ transaction ] https://pt.wikipedia.org/wiki/Transa%C3%A7%C3%A3o_em_base_de_dados
 *
 * [ Atomicidade ] Resumo: Todas as ações que compõem a unidade de trabalho da transação
 * devem ser concluídas com sucesso, para que seja efetivada.
 *
 * [ Consistência ] Resumo: Todas as regras e restrições definidas no banco de dados devem
 * ser obedecidas. (relacionamentos, tipos, restrições, etc.)
 *
 * [ Isolamento ] Resumo: Cada transação funciona completamente à parte de outras estações e
 * todas as operações são parte de uma transação única.
 *
 * [ Durabilidade ] Resumo: Os efeitos de uma transação em caso de sucesso (commit) devem
 * persistir no banco de dados (Uma transação só tem sentido se houver gravação)
 */
fullStackPHPClassSession("transaction", __LINE__);


try {
    $pdo = Conx::getInstance();
    $pdo->beginTransaction();
    $pdo->query("
        INSERT INTO users (first_name, last_name, email, document) 
        VALUES ('Nunes', 'Correa', 'email@email.com', '000.000.000-00')
    ");
    $userId = $pdo->lastInsertId();
    $pdo->query("
        INSERT INTO address (user_id, street, number, complement)
        VALUES ('{$userId}', 'Rua projetada', '04', 'Proximo a escola estadual vasco vasques')
    ");
    $pdo->commit();
    echo "<p class='trigger accept'>Cadastro com sucesso.!</p>";
}catch (PDOException $exception){
    $pdo->rollBack();
    var_dump($exception);
}