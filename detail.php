<?php
//select.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET['id'];
// echo $id;

// function bindvalue(){

// }

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where id=:id"); //大事をとってバインド変数を使用
$stmt ->bindValue(':id',$id,PDO::PARAM_INT) ;
$status = $stmt -> execute();

//4．データ表示
if($status == false){
        //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $result = $stmt->fetch();
    // var_dump($result);
}


?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
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
<form method="POST" action="update.php">
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
        </label>

     <!-- idを隠して送信 -->
     <input type="hidden" name="id" value="<?=$row["id"]?>">

     <input type="submit" value="更新">
    </fieldset>
  </div>
</form>

<a href="select.php"><button>保存しないで戻る</button></a>
<!-- Main[End] -->