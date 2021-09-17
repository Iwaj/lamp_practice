<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

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
