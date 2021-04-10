<?php
require("../app/functions.php");

// $today = date("Y-m-d H:i:s l");
$names = [
  "Taro",
  "Jiro",
  "Saburo"
];

define("FILENAME" , "../app/messages.txt");

//result.phpにて作成した setcookie()で引き継いだcolorの情報を、filter_input()を用いて取得する//
// $color = filter_input(INPUT_COOKIE , "color") ?? "transparent";
//null合体演算子を使用する。ただ、ページが増えるたびにこのコードをページ毎に書くのは面倒。よってheaderに移動させる。


//messageがpostされず直接result.phpにアクセスされるとemssages.txtには「...」のデータが追加されてしまう。
//それを回避するために、以下のif文で条件分岐する。
if($_SERVER["REQUEST_METHOD"] === "POST"){
  $message = trim(filter_input(INPUT_POST , "message"));
  //index.phpのinputから送信されたname="message"のデータを取得する
  //trim()関数で前後の余計な空白を取り除き、filter_input()関数でデータを取得する。
  $message = $message !=="" ? $message : "...";
  //三項演算子にて入力が空白だった場合、"..."を表示させる。
  
  $fp =fopen(FILENAME , "a");
  fwrite($fp, $message . "\n");
  fclose($fp);

  header("Location: http://localhost:8080/result.php");
  exit;
} 
// else {
//   exit("Invalid access");
//   //以降の処理は実行されなくなる。JSのreturnと似たようなもの
// }

//ファイルもそのまま格納可能
$messages = file(FILENAME , FILE_IGNORE_NEW_LINES);
//file()関数を用いて中身を配列で取得する。ここの改行は無視したいので、第二引数にはFILE_IGNORE_NEW_LINESを渡す。
//こうすると、配列を取得可能になる


include("../app/_parts/_header.php");
?>

<ul>
<?php foreach($messages as $message):?>
<li><?= h($message);?></li>
<?php endforeach;?>
</ul>

<form 
  action="" 
  method="post"
  >
  <!-- データ処理もindex.phpにて実行する場合、action属性はindex.phpまたは""空でもOK -->
<input type="text" name="message">
  <button>Post</button>
</form>

  <?php include("../app/_parts/_footer.php");