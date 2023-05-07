<?php

if (!function_exists('get_subdomain')) {
    function get_subdomain($url)
    {
        $parsed_url = parse_url($url);
        $host = $parsed_url["host"];
        return explode(".", $host)[0];
    }
}

if (!function_exists('alter_text_emoji')) {
    function alter_text_emoji($text)
    {
        $emoji = [
            '🙏',
            '👏',
            '❤️',
            '👍',
            '🔥'
        ];

        if (in_array(trim($text), $emoji)) {
            $text = "<h1>{$text}</h1>";
        } else {
            if (substr($text, 0, 1) == '_' && substr($text, -1) == '_') {
                $text = '<i>' . esc(substr($text, 1, -1)) . '</i>';
            } elseif (substr($text, 0, 1) == '*' && substr($text, -1) == '*') {
                $text = '<b>' . esc(substr($text, 1, -1)) . '</b>';
            } else {
                $text = esc($text);
            }
        }

        return $text;
    }
}

if (!function_exists('formatar_valor_monetario')) {
    function formatar_valor_monetario($valor_monetario)
    {
        $valor_numerico = preg_replace('/[^0-9,.]/', '', $valor_monetario);
        $valor = number_format(str_replace(',', '.', str_replace('.', '', $valor_numerico)), 2, '.', '');
        return ($valor) ? $valor : false;
    }
}

if(!function_exists('url_cloud_front')){
    function url_cloud_front($caminho = false)
    {
        $url = "https://d32f79cgiemeee.cloudfront.net/";
        $key = $caminho;

        return $url.$key;
    }
}
