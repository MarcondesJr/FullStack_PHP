<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);
$index = [
    "AC/DC",
    "NIRVANA",
    "SLIPKNOT"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "NIRVANA",
    "band_3" => "SLIPKNOT"
];

array_unshift($index, "","Pearl Jam");
$assoc = ["band_4" => "Pearl Jam", "band_5" => ""] + $assoc;

array_push($index, "");
$assoc = $assoc + ["band_6" => ""];

array_shift($index);
array_shift($assoc);

array_pop($index);
array_pop($assoc);

array_unshift($index, "");
$index = array_filter($index);
$assoc = array_filter($assoc);
var_dump(
    $index,
    $assoc
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index);
$assoc = array_reverse($assoc);

asort($index);//ordenação por valor de variavel - alfabetica ou numeral
asort($assoc);//ordenação por valor de variavel - alfabetica ou numeral

ksort($index);//ordenação crescente por indice - alfabetica ou numeral
ksort($assoc);//ordenação crescente por indice - alfabetica ou numeral

krsort($index);//ordenação decrescente por indice - alfabetica ou numeral
krsort($assoc);//ordenação decrescente por indice - alfabetica ou numeral

sort($index);//reindexação crescente por variavel - alfabetica ou numeral
rsort($index);//reindexação decrescente por variavel - alfabetica ou numeral


var_dump(
    $index,
    $assoc
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump(
    [
        array_keys($assoc),
        array_values($assoc)
    ]
);

if (in_array("AC/DC", $assoc)) {
    echo "<p>Cause I'm Back!</p>";
}

$arrToString = implode(", ", $assoc);
echo "<p>Eu curto {$arrToString} e muitas outras!</p>";

$stringToArray = explode(", ", $arrToString);
var_dump($stringToArray);

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Marcondes",
    "company" => "VAT",
    "mail" => "marcondes.junior@vat.com.br"
];

$template = <<<TPL
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}<br>
        <a href="mailto:{{mail}}" title="Enviar e-mail para {{name}}">Enviar e-mail</a>
        </p>
    </article>
TPL;

$replaces = "{{". implode("}}&{{", array_keys($profile)) ."}}";

echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);