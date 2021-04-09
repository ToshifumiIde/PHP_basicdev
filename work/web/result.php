<?php

require("../app/functions.php");

$message = trim(filter_input(INPUT_GET , "message"));
//trim()メソッドは前後の空白を取り除く。
$message = $message !== "" ? $message : "...";
//三項演算子にて、空じゃなければ$messageをそのまま使用、空の場合「...」を返却

//チェックボックスで選択した色を変数に格納する//
// $colors = filter_input(INPUT_GET, "colors" , FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
// $colors = empty($colors) ?"None Selected" : implode("," , $colors);
//implodeメソッドは、第一引数で指定した文字列で、第二引数に渡された配列を区切って格納する

//ラジオボタンでの選択結果を格納//
// $color = filter_input(INPUT_GET , "color");
// $color = isset($color) ? $color : "None Selected";
// $color = $color ?? "None Selected";//これでも上と同じ表記になる??はnull合体演算子と呼ばれる。上記3行をまとめると下記の通り
$colorFromGet = filter_input(INPUT_GET , "color") ?? "transparent";

//cookieを使用して、ラジオボタンで選択したcolorの情報をGo Back時に保有して、index.phpに引き継ぐ。setcookie()では、この前に何も出力してはいけないルールがある。
// setcookie("color" , $colorFromGet);


$_SESSION["color"] = $colorFromGet;
//session_start()関数を使うと(function.phpで定義)、$_SESSIONという特殊な変数の使用が可能となる。
//サーバー側に値を保存するため、ここでsessionに値をセットした直後から使用可能。


// $username = filter_input(INPUT_GET , "username");
// $today = date("Y-m-d H:i:s l");
$names = [
  // "Taro",
  // "Jiro",
  // "Saburo"
];
  
  include("../app/_parts/_header.php");
?>



<p>

  <?=h($colorFromGet); ?>
  <!-- nl2brメソッドnew_line_to_brはhtml内で改行されたテキスト部分にbrタグを追加するメソッド -->
</p>
<p><a href="./index.php">Go Back</a></p>

<?php
  include("../app/_parts/_footer.php");