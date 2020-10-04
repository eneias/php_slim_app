<?php
/**
 * Created by PhpStorm.
 * Eneias Silva
 * eneias@eneias.com
 * +55 48 9 9997-1197
 */


require 'Controller/SiteController.php';

$app->get('/', function () use ($app) {
    SiteController::index();
});

$app->get('/login', function () {
    SiteController::show_login_page();
});

$app->get('/logout', function () use ($app){
    SiteController::logout();
    $app->redirect('/utech/public');
});

$app->post('/login/', function () use ($app) {
    $ret = SiteController::login($_POST['email'], $_POST['senha']);

    if( $ret['success'] ) {
        $app->redirect('/utech/public/admin');
    } else {
        $app->flashNow('error', $ret['message']);
        $app->redirect('/utech/public/login');
    }

});

