<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

var_dump($_SESSION['csrf_token']);
$token = $_SESSION['csrf_token'];
var_dump($_POST['token']);
//is_valid_csrf_token($_SESSION['csrf_token']);
//if($_SESSION['csrf_token'] === $_POST['csrf_token']){

//}
//ユーザーidがなかったらログイン画面に移動
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

//'db.php'にある データベースに接続
$db = get_db_connect();

//ユーザーid取得
$user = get_login_user($db);

//ユーザーtypeを確認
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}


$items = get_all_items($db);

include_once VIEW_PATH . '/admin_view.php';
