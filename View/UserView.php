<?php
/**
 * Created by PhpStorm.
 * Eneias Silva
 * eneias@eneias.com
 * +55 48 9 9997-1197
 */

class UserView {
    public static function render($file, $user_data=null)
    {
        // conteudo variavel
        $main_content = dirname(__FILE__) . '/../View/User/'.$file;
        if (!file_exists($main_content)){
            die("arquivo $main_content não existe!");
        }

        // conteudo fixo
        require dirname(__FILE__).'/Admin/layout.php';
    }
}