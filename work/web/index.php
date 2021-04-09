<?php
// $today = date("Y-m-d H:i:s l");
$names = [
  "Taro",
  "Jiro",
  "Saburo"
];

//result.phpにて作成した setcookie()で引き継いだcolorの情報を、filter_input()を用いて取得する
// $color = filter_input(INPUT_COOKIE , "color") ?? "transparent";
//null合体演算子を使用する。ただ、ページが増えるたびにこのコードをページ毎に書くのは面倒。よってheaderに移動させる。



require("../app/functions.php");
include("../app/_parts/_header.php");
?>

  <p>Hello, <?= htmlspecialchars($names[1],ENT_QUOTES,"UTF-8")?></p>
  <p>Hello, <?= h($names[0])?></p>
  <p>Today: 
    <?php echo date("Y-m-d H:i:s l");
    ?>
  </p>
  <p>Today: 
    <?= date("Y-m-d H:i:s l");
    ?>
  </p>
  <ul>
<?php if(empty($names)):?>
  <li>Nobody</li>
<?php else: ?>
    <?php foreach($names as $name): ?>
    <li>
      <?= h($name); ?>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
  </ul>

<form action="result.php" method="get">
  <!-- <input type="text" name="message"> -->
  <!-- <input type="text" name="username"> -->
      <!-- <textarea name="message" id="" cols="30" rows="10"></textarea> -->
      <!-- <select name="colors[]" multiple>
        <option value="orange">Orange</option>
        <option value="pink">Pink</option>
        <option value="gold">Gold</option>
      </select> -->
      <!-- <label for=""><input type="checkbox" name="colors[]" value="orange">Orange</label>
      <label for=""><input type="checkbox" name="colors[]" value="pink">Pink</label>
      <label for=""><input type="checkbox" name="colors[]" value="gold">Gold</label> -->
      <label for=""><input type="radio" name="color" value="orange">Orange</label>
      <label for=""><input type="radio" name="color" value="pink">Pink</label>
      <label for=""><input type="radio" name="color" value="gold">Gold</label>
  <button>SEND</button>
  <a href="reset.php">[reset]</a>
</form>

  <?php include("../app/_parts/_footer.php");