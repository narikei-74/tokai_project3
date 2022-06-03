<?php
$input_text = $_POST['text'];

$encode = mb_detect_encoding($input_text, ['UTF-8' ,'ASCII','EUC-JP','ISO-2022-JP','Shift-JIS']);

if ($encode != "UTF-8") {
  $input_text = mb_convert_encoding($input_text, 'UTF-8', 'auto');
}

if (is_numeric(trim($input_text))) {
  $type1 = "数値";
} elseif (is_string(trim($input_text))) {
  $type1 = "文字列";
}

if (strlen($input_text) === mb_strlen($input_text)) {
  $type2 = "半角";
} else {
  $type2 = "全角";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>東海課題3</title>
</head>
<body>
  <h1>制作物3　テキスト処理</h1>
  <p>
    入力文字：
    <br>
    <?= nl2br(htmlspecialchars($input_text)); ?>
  </p>
  <p>
    文字種別：
    <br>
    <?= $type1 ?>/<?= $type2 ?>
  </p>
  <a href="./index.php">戻る</a>
</body>
</html>