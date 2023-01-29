<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>漫画データ登録</title>
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
          <input id="star1" type="radio" name="rate" value="★★★★★" />
          <label for="star1"><span class="text">最高</span></label>
          <input id="star2" type="radio" name="rate" value="★★★★" />
          <label for="star2"><span class="text">良い</span></label>
          <input id="star3" type="radio" name="rate" value="★★★" />
          <label for="star3"><span class="text">普通</span></label>
          <input id="star4" type="radio" name="rate" value="★★" />
          <label for="star4"><span class="text">悪い</span></label>
          <input id="star5" type="radio" name="rate" value="★" />
          <label for="star5"><span class="text">最悪</span></label>
        </div>
      </lable>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
