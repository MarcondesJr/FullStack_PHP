<?php

/**
 * @param string $email
 * @return string
 */
function is_email(string $email): string
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

function str_slug (string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_UNSAFE_RAW);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyrr                                 ';
    $slug = str_replace(["-----", "----", "---", "--"],
        "-",
        str_replace(
            [" ", "-","_",","],
            "-",
            trim(
                strtr(
                    mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8'),
                    mb_convert_encoding($formats, 'ISO-8859-1', 'UTF-8'),
                    $replace
                )
            )
        )
    );
    return htmlspecialchars($slug);
}

/**
 * @param string $string
 * @return string
 */
function str_studly_case(string $string): string
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "", mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE));
    return $studlyCase;
}

/**
 * @param string $string
 * @return string
 */
function str_camel_case(string $string): string
{
    return lcfirst(str_studly_case($string));
}

/**
 * @param string $string
 * @return string
 */
function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_words(string $string, int $limit, string $pointer = " ...[leia mais]"): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords <= $limit){
        return $string;
    }
    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limits_chars(string $string, int $limit, string $pointer = " ...[leia mais]"): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if(mb_strlen($string) <= $limit) {
        return $string;
    }
    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
    return "{$chars}{$pointer}";
}