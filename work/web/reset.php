<?php

require("../app/functions.php");

// setcookie("color" , "");
//setcookie()メソッドの第二引数を空文字列にした場合、PHPが内部的にCookieの有効期限を過去日付にセットしてくれってcookieが削除される仕組みになっている。


unset($_SESSION["color"]);

header("Location: http://localhost:8080/index.php");
//header関数を使って、ロケーションを指定すれば、ページのリダイレクトが可能。
//Locationの最初のLは大文字、:の後には半角スペースが必須。