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

if (!function_exists('url_cloud_front')) {
    function url_cloud_front($caminho = false)
    {
        $url = "https://cdn.conect.app/";
        $key = $caminho;

        return $url . $key;
    }
}


if (!function_exists('convertToEmbedUrl')) {
    function convertToEmbedUrl($url)
    {
        // Verificar se a URL contém o domínio "youtube.com" ou "youtu.be"
        if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
            // Extrair o ID do vídeo
            $videoId = '';
            if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $match)) {
                $videoId = $match[1];
            } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $match)) {
                $videoId = $match[1];
            }
            // Verificar se o ID do vídeo foi encontrado
            if (!empty($videoId)) {
                // Retornar a URL do formato de embed
                return 'https://www.youtube.com/embed/' . $videoId;
            }
        }
        // Se a URL não é do YouTube ou se houver um erro, retornar a URL original
        return $url;
    }
}

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phoneNumber)
    {
        // Remove caracteres especiais e espaços em branco do número
        $phoneNumber = preg_replace('/[\s\-\.()]/', '', $phoneNumber);

        // Se o número começa com o símbolo de "+" já é um número internacional válido
        if (substr($phoneNumber, 0, 1) == '+') {
            return $phoneNumber;
        }

        // Se o número não começa com o símbolo de "+", trata-se de um número nacional
        // Verifica se o número tem exatamente 10 ou 11 dígitos (com ou sem o DDD)
        if (preg_match('/^([1-9]{2})?([0-9]{8,9})$/', $phoneNumber, $matches)) {
            // Se tiver 9 dígitos, adiciona o DDD 11 (São Paulo)
            if (strlen($matches[2]) == 9) {
                $phoneNumber = '11' . $matches[2];
            } else {
                $phoneNumber = $matches[1] . $matches[2];
            }
            // Adiciona o código de país (55) para envio nacional no Brasil
            return '+55' . $phoneNumber;
        }

        // Caso o número não tenha 10 ou 11 dígitos, considera-se que é um número internacional
        // Adiciona o símbolo de "+" para indicar que é um número internacional
        return '+' . $phoneNumber;
    }
}
if (!function_exists('converterParaTimestamp')) {
    function converterParaTimestamp($data)
    {
        $timestamp = strtotime($data);
        return $timestamp;
    }
}


if (!function_exists('format_date')) {
    function format_date($data)
    {
        $formatted_date = date('d/m/Y \á\s H:i:s', strtotime($data));
        return $formatted_date;
    }
}
