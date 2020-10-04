<?php

require dirname(__FILE__) . '/../View/SiteView.php';
require dirname(__FILE__) .'/../Model/UserModel.php';

class SiteController{

    /**
     * Busca no banco de dados a lista de usuario e carrega a página inicial
     * do site - área pública do site
     */
    public static function index()
    {
        $users = UserModel::get_all();
        SiteView::render('home.php', $users);
    }

    /**
     * Renderiza (exibe) a tela de login
     */
    public static function show_login_page()
    {
        SiteView::render_login('login.php');
    }

    /**
     * Verifica se as credenciais do usuário são válidas, consultando no banco de dados
     * na tabela de usuário
     *
     * @param string $email
     * @param string $pass
     * @return array retorna um array com as chaves:
     *                                        `success` (bool) true em caso de sucesso
     *                                        `message` (string) mensagem de erro ou string nula em caso de sucesso
     */
    public static function login($email, $pass)
    {
        $user = UserModel::get_one_by_email($email);
        $res = array();
        if ($user!=false){
            if ($user->password == md5($pass)) {
                $res['success'] = true;
                $res['name'] = $user->name;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->name;
                $_SESSION['user_email'] = $user->email;

            } else {
                $res['success'] = false;
                $res['message'] = "Senha incorreta!";
            }
        } else {
            $res['success'] = false;
            $res['message'] = "Usuário inexistente!";
        }

        return $res;
    }

    /**
     * Destrói a sessão atual do usuário logado, deslogando-o
     */
    public static function logout() {
        session_destroy();
    }

}