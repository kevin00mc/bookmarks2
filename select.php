<?php
//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr>";
    $view .= "<td>".$result["id"]."</td><td>".$result["title"]."</td><td><a href=".$result["url"].">"."☆"."</a></td><td>".$result["comment"]."</td><td>".$result["handle"]."</td><td>".$result["reg_date"]."</td>";
    // $view .= "<td>".$result['reg_date'].' / '.$result['title'].' / '.$result['url'].' / '.$result['comment'];
    $view .= "</tr>";

  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>漫画一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">漫画一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<div class="container jumbotron"><table><th>ID</th><th>タイトル</th><th>URL</th><th>コメント</th><th>ハンドルネーム</th><th>登録日時</th><?=$view?></table></div>
</div>
<!-- Main[End] -->

</body>
</html>

</div>
<!-- Main[End] -->

</body>
</html>
