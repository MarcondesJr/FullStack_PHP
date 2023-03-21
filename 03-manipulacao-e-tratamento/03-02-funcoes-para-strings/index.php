<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);
$string = "O último show do AC/DC foi incrível!";
var_dump([
    "string" => $string,
    "strlen" => strlen($string), //contar o tamanho da string - acentos são considerados caracteres
    "mb_strlen" => mb_strlen($string), //contar o tamanho da string - acentos não considerados
    "substr" => substr($string, 14), 
    "mb_substr" => mb_substr($string, 14),
    "strtoupper" => strtoupper($string), //converter toda a string em caixa alta, porem quem possui acento não há conversão
    "mb_strtoupper" => mb_strtoupper($string),  //converter toda a string em caixa alta incluindo letras com acentos
]);
/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);
$mbString = $string;

var_dump([
    "mb_strtoupper" => mb_strtoupper($string),  //converter toda a string em caixa alta incluindo letras com acentos
    "mb_strtolower" => mb_strtolower($string), //converter toda a string em caixa baixa incluindo letras com acentos
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),  //converter toda a string em caixa alta incluindo letras com acentos
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),  //converter toda a string em caixa baixa incluindo letras com acentos
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),  //converter as primeiras letras de toda a string em caixa alta incluindo letras com acentos
]);
/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);
$mbReplace = $mbString . " Fui, iria novamente, e foi épico, ";
var_dump([
    "mb_strlen" => mb_strlen($mbReplace), //conta o tamanho da string.
    "mb_strpos" => mb_strpos($mbReplace, ", "), //identifica primeira posição baseado no ponteiro informado como parametro
    "mb_strrpos" => mb_strrpos($mbReplace ,", "), //identifica ultima posição baseado no ponteiro informado como parametro
    "mb_substr" => mb_substr($mbReplace ,40+2, 14), //mostra sentença de caracteres, com parametro de onde se inicia e parametro indicando o tamanho do resultado da string
    "mb_strstr" => mb_strstr($mbReplace, ", ", true), //identifica a primaira posição informado no ponteiro como parametro, para recortar ate certo ponto(parametro TRUE) ou a partir deste ponto(parametro FALSE)
    "mb_strrchr" => mb_strrchr($mbReplace, ", ", true),//identifica a ultima posição informado no ponteiro como parametro, para recortar ate certo ponto(parametro TRUE) ou a partir deste ponto(parametro FALSE)
]);

$mbReplace = $string;
echo "<p>", $string, "</p>";
echo "<p>", str_replace("AC/DC",  "Nirvana", $mbReplace), "</p>";//permite pesquisar uma ocorrencia informada no 1 parametro, substituir pelo 2 paramento, informando onde quer pesquisar e substituir no 3 parametro.
echo "<p>", str_replace(["AC/DC", "incrível"],  ["Nirvana", "épico"], $mbReplace), "</p>";//permite pesquisar várias ocorrencias informadas no 1 parametro por ordem de execução, substitui-los pelo 2 paramento por ordem de execução, informando onde quer pesquisar e substituir no 3 parametro.

$article = <<<ROCK
    <article>
        <h3>event</h3>
        <p>desc</p>
    </article>
ROCK;

$articleData = [
    "event" => "Rock In Rio",
    "desc" => $mbReplace
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);
//substituir KEYS do array por valores do mesmo array que estão dentro do ARTIGO criado
/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Marcondes&email=marcondes@gmail.com";
mb_parse_str($endPoint, $parseEndPoint);
var_dump([
    $endPoint, //recebendo string por meio de url
    $parseEndPoint, //valores convertidos de string para array
    (object)$parseEndPoint //valores convertidos de array para objeto
]);