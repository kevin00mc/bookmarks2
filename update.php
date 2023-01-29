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


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>漫画データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">☆☆漫画村☆☆</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>漫画登録</legend>
     <label>漫画のタイトル：<input type="text" name="title"></label><br>
     <label>URL：<input type="text" name="url"></label><br>
     <label>ハンドルネーム：<input type="text" name="handle"></label><br>
     <label>コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <label>評価：
     <div class="evaluation">
          <input id="star1" type="radio" name="rate" value="⭐️⭐️⭐️⭐️⭐️" />
          <label for="star1"><span class="text">最高</span>★</label>
          <input id="star2" type="radio" name="rate" value="⭐️⭐️⭐️⭐️" />
          <label for="star2"><span class="text">良い</span>★</label>
          <input id="star3" type="radio" name="rate" value="⭐️⭐️⭐️" />
          <label for="star3"><span class="text">普通</span>★</label>
          <input id="star4" type="radio" name="rate" value="⭐️⭐️" />
          <label for="star4"><span class="text">悪い</span>★</label>
          <input id="star5" type="radio" name="rate" value="⭐️" />
          <label for="star5"><span class="text">最悪</span>★</label>
        </div>
      </lable>

     <!-- idを隠して送信 -->
     <input type="hidden" name="id" value="<?=$row["id"]?>">

     <input type="submit" value="更新">
    </fieldset>
  </div>
</form>

<a href="select.php"><button>保存しないで戻る</button></a>
<!-- Main[End] -->

