<?php
// $today = date("Y-m-d H:i:s l");
$names = [
  "Taro",
  "Jiro",
  "Saburo"
];

//result.phpにて作成した setcookie()で引き継いだcolorの情報を、filter_input()を用いて取得する//
// $color = filter_input(INPUT_COOKIE , "color") ?? "transparent";
//null合体演算子を使用する。ただ、ページが増えるたびにこのコードをページ毎に書くのは面倒。よってheaderに移動させる。

$filename = "../app/messages.txt";
//ファイルもそのまま格納可能
$messages = file($filename , FILE_IGNORE_NEW_LINES);
//file()関数を用いて中身を配列で取得する。ここの改行は無視したいので、第二引数にはFILE_IGNORE_NEW_LINESを渡す。
//こうすると、配列を取得可能になる


require("../app/functions.php");
include("../app/_parts/_header.php");
?>

<ul>
<?php
foreach($messages as $message):

?>
<li>
<?= h($message);?>
</li>

<?php
endforeach;
?>
</ul>

<form action="result.php" method="post">
<input type="text" name="message">
  <button>Post</button>
</form>

  <?php include("../app/_parts/_footer.php");