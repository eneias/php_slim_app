<?php

class AdminController
{
    /**
     * Verifica se usuário está autenticado (logado)
     *
     * @return bool retorna true se o usuario estiver logado
     */
    public static function check_user_session()
    {
        if ($_SESSION['user_id'] ) {
            return true;
        } else {
            return false;
        }

    }
}