<?php

/**
 * Created by PhpStorm.
 * Eneias Silva
 * eneias@eneias.com
 * +55 48 9 9997-1197
 */

class SiteView {
    public static function render($file, $data=null)
    {
        // conteudo variavel
        $main_content = dirname(__FILE__) . '/../View/Site/'.$file;
        if (!file_exists($main_content)){
            die("arquivo $main_content não existe!");
        }

        // conteudo fixo
        require dirname(__FILE__).'/Site/layout.php';
    }

    public static function render_login()
    {
        require dirname(__FILE__).'/Site/login.php';
    }
}