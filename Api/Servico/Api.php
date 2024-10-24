<?php

class Api {

    private static $url = 'https://jsonplaceholder.typicode.com/posts/';
    
    public static function buscaTitlePorId($codigoUnico) {
        $retorno = file_get_contents(self::$url.$codigoUnico);
        $dados = json_decode($retorno, true);
        
        return $dados['title'];
    }
}
