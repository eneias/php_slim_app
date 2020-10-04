<?php
/**
 * Created by PhpStorm.
 * Eneias Silva
 * eneias@eneias.com
 * +55 48 9 9997-1197
 */


$auth = function () use($app) {
    require 'Controller/AdminController.php';
    if ( !AdminController::check_user_session() ) {
        $app->redirect('/utech/public/login');
    }
};

$app->group('/admin', $auth, function () use ($app) {
    require 'Controller/UserController.php';

    $app->get('/', function () use ($app) {
        $app->redirect('./user');
    });

    $app->group('/user', function () use ($app) {
        $app->get('/', function () {
            UserController::show_users();
        });
        $app->get('/incluir/', function () {
            UserController::add_user();
        });

        $app->post('/incluir/', function () {
            UserController::save_user();
        });
        $app->get('/:id/excluir/', function ($id) {
            UserController::delete_user($id);
        });

        $app->get('/:id/editar/', function ($id) {
            UserController::edit_user($id);
        });
        $app->post('/:id/editar/', function ($id) {
            UserController::save_user($id);
        });
    });
});
