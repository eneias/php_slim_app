<?php

require dirname(__FILE__) . '/../View/UserView.php';

class UserController
{
    /**
     * Busca no banco de dados a lista de usuario e a exibe na tela de admin
     * é necessario estar logado para ver essa tela
     */
    public static function show_users()
    {
        $users = UserModel::get_all();
        UserView::render('list.php', $users);
    }

    /**
     * Busca no banco de dados os dados usuario com o $id e os exibe
     * no formulario, na area de admin
     *
     * @param $id integer id do usuario
     */
    public static function edit_user($id)
    {
        $user = UserModel::get_one_by_id($id);
        UserView::render('form.php', $user);
    }

    /**
     * Exibe o formulario para inserção de um usuário, na area de admin
     *
     */
    public static function add_user()
    {
        UserView::render('form.php');
    }

    /**
     * Salva no banco de dados os dados usuario com o $id ou
     * cria um usuario com os dadod de $_POST e exibe
     * a lista de usuários, na area de admin
     *
     * @param $id integer id do usuario
     */
    public static function save_user($id = null)
    {
        if ($id == null)
            $sucesso = UserModel::insert($_POST)!=null;
        else
            $sucesso = UserModel::update($_POST,$id);

        $app = \Slim\Slim::getInstance();
        if ($sucesso)
            $app->flashNow('info', 'Registro salvo com sucesso!');
        else
            $app->flashNow('error', 'Erro ao salvar registro!');

        self::show_users();
    }

    /**
     * Exclui o usuario com o $id do banco de dados os dados  e exibe
     * a lista de usuários, na area de admin
     *
     * @param $id integer id do usuario
     */
    public static function delete_user($id)
    {
        UserModel::delete($id);

        $sucesso = $app = \Slim\Slim::getInstance();
        if ($sucesso)
            $app->flashNow('info', 'Registro excluido com sucesso!');
        else
            $app->flashNow('error', 'Erro ao salvar registro!');


        self::show_users();
    }
}