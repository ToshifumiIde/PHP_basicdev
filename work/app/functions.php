<?php



function h($str)
{
  return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

function createToken()
{
  if(!isset($_SESSION["token"])){
    $_SESSION["token"] = bin2hex(random_bytes(32));
    //tokenが存在しなかった場合、randomで32bytesの文字列をtokenに格納する
    //random_bytes()で生成される文字列はバイナリ文字列
    //bin2hex()関数で16進数に変更
  }
}

function validateToken()
{
  if(
    empty(
      $_SESSION["token"] || 
      $_SESSION["token"] !== filter_input(INPUT_POST, "token")
    )
  ){
    exit("Invalid post request");
  }
}

session_start();