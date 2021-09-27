<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';

session_start();
var_dump($_SESSION['csrf_token']);
$token = $_SESSION['csrf_token'];
var_dump($_POST['token']);
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

//ユーザーに応じた情報を取得
$carts = get_user_carts($db, $user['user_id']);


//金額の計算
$total_price = sum_carts($carts);

include_once VIEW_PATH . 'cart_view.php';