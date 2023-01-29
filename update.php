<?php
ini_set('display_errors', 'On'); // エラーを表示
error_reporting(E_ALL); // 全てのレベルのエラーを表示

// 1. POSTデータ取得
$title = $_POST['title'];
$url = $_POST['url'];
$handle = $_POST['handle'];
$comment = $_POST['comment'];
$rate = $_POST['rate'];
$id = $_POST['id'];

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "UPDATE gs_bm_table 
  SET title=:title, url=:url, handle=:handle, comment=:comment, rate=:rate, reg_date=sysdate()
  where id=:id"
);

// 4. バインド変数を用意
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':handle', $handle, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rate', $rate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)


// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: select.php');
}
?>


