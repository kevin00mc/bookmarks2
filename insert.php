<?php
ini_set('display_errors', 'On'); // エラーを表示
error_reporting(E_ALL); // 全てのレベルのエラーを表示

// 1. POSTデータ取得
$title = $_POST['title'];
$url = $_POST['url'];
$handle = $_POST['handle'];
$comment = $_POST['comment'];
$rate = $_POST['rate'];

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table ( id, title, url, handle, comment, rate, reg_date )
  VALUES( NULL, :title, :url, :handle, :comment, :rate, sysdate())"
);

// 4. バインド変数を用意
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':handle', $handle, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rate', $rate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>
