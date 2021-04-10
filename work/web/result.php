<?php

require("../app/functions.php");

//messageがpostされず直接result.phpにアクセスされるとemssages.txtには「...」のデータが追加されてしまう。
//それを回避するために、以下のif文で条件分岐する。
if($_SERVER["REQUEST_METHOD"] === "POST"){
  $message = trim(filter_input(INPUT_POST , "message"));
  //index.phpのinputから送信されたname="message"のデータを取得する
  //trim()関数で前後の余計な空白を取り除き、filter_input()関数でデータを取得する。
  $message = $message !=="" ? $message : "...";
  //三項演算子にて入力が空白だった場合、"..."を表示させる。
  
  $filename = "../app/messages.txt";
  $fp =fopen($filename , "a");
  fwrite($fp, $message . "\n");
  fclose($fp);

} else {
  exit("Invalid access");
}




include("../app/_parts/_header.php");
?>

<p>Message added!!</p>
<p><a href="./index.php">Go Back</a></p>

<?php
  include("../app/_parts/_footer.php");