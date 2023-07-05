<?php
// 配列に「日本,アメリカ,イギリス,フランス」を格納し、foreach文を使って順番に下記のフォーマットで出力して下さい。
// 要素番号:国名
$country = ['日本','アメリカ','イギリス','フランス'];
 
foreach ($country as $value){
    echo $value.'<br/>';
}
?>


<?php
// 連想配列に下記の国と都市をそれぞれkey,valueとして格納し,foreach文を使ってフォーマットのとおりに連続で出力して下さい。

// 国名 key
// 日本、アメリカ、イギリス、フランス

// 首都名 value
// 東京、ワシントン、ロンドン、パリ

// フォーマット
// ○○の首都は○○です。
$country = [
  '日本' => '東京',
  'アメリカ' => 'ワシントン',
  'イギリス' => 'ロンドン',
  'フランス' => 'パリ'
];

foreach($country as $key => $value){
  echo $key.'の首都は'.$value.'です。<br/>';
}
?>


<?php
// for文を使って1～100までの各数字を連続して出力して下さい。
// それぞれの数字の後に改行を入れて縦に出力して下さい。

  for($i = 1; $i < 101; $i++){
    echo $i. '<br/>';
  }
?>


<?php
// 以下をfor文を使用して表示してください。

// 1
// 21
// 321
// 4321
// 54321
// 654321
// 7654321
// 87654321
// 987654321
//

//下記の変数を起点にして作るようにして下さい。
for($i = 9 ; $i >= 0 ; $i -- ){
  for($input = 9 ; $input >= $i+1 ; $input --){
    echo $input-$i;
  }
  echo "<br>";
}

// ループ処理は何万回もの処理が繰り返される場合でも正常に機能する必要があるため
// 数字を直接記述するようなコードでは意味がありません。
// 下記のように変数を一箇所変えるだけで同じような規則性で動作するように実装して下さい。

//$input = 6;

// 1
// 21
// 321
// 4321
// 54321
// 654321
//

for($input = 1 ; $input<=7 ; $input++) {
  for($i = 1 ; $input >= $i+1 ; $i++) {
    echo $input-$i;
  }
  echo "<br>";
}
?>


<?php
// 以下をfor文を使用して表示してください。
// ヒント: forの中でforを３回使用

// ********1
// *******121
// ******12321
// *****1234321
// ****123454321
// ***12345654321
// **1234567654321
// *123456787654321
// 12345678987654321

for($a = 1 ; $a <= 9  ; $a ++){
  for($b = 8 ; $b >= $a ; $b --){
      echo "*";
    }
    for($c = 1 ; $c <=$a ; $c++){
      echo $c;
    }
    for($d = 3 ; $d >=6-$c ; $d--){
      echo $d-(4-$a);
    }
    echo "<br />";
}

?>


<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];

$row_total = [
    'r1' => array_sum($arr['r1']),
    'r2' => array_sum($arr['r2']),
    'r3' => array_sum($arr['r3']),
];

$column_total = [
    'c1' => array_sum(array_column($arr, 'c1')),
    'c2' => array_sum(array_column($arr, 'c2')),
    'c3' => array_sum(array_column($arr, 'c3')),
];

$all_total = 0;
    foreach ($column_total as $total) {
        $all_total = $all_total + $total;
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
    <body>
        <!-- ここにテーブル表示 -->
        <table>
        <?php
        echo "<tr><td></td><td>c1</td><td>c2</td><td>c3</td><td>横合計</td></tr>";
        
        for ($i = 1; $i <= count($arr); $i++) {
        $row_key = "r{$i}";
        echo "<tr><td>{$row_key}</td>";
        for ($j = 1; $j <= count($arr[$row_key]); $j++) {
        $column_key = "c{$j}";

        echo "<td>{$arr[$row_key][$column_key]}</td>";
        }
        echo "<td>{$row_total[$row_key]}</td></tr>";
        }
        echo "<tr><td>縦合計</td>";

        for ($j = 1; $j <= count($column_total); $j++) {
        $column_key = "c{$j}";
        echo "<td>{$column_total[$column_key]}</td>";
        }

        echo "<td>{$all_total}</td></tr>";
        ?>
        </table>
    </body>
</html>


<?php
// 以下はランダムな数字を格納した配列を表示するプログラムです。
// 配列内の隣合う数字を比較して左側から小さい順に表示されるよう配列の中身を並び替えてください。
// 並び替えはfor文を使用すること
// (sort関数などを使用すれば実装は可能ですが、for文を使って一つ一つの値を比較・操作して並べ替えを実装してみてください。)

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// 例）
// 4, 3, 1, 2
// ↓
// 3, 4, 1, 2
// ↓
// 3, 1, 4, 2
// ↓
// 3, 1, 2, 4
// ↓
// 1, 3, 2, 4
// ↓
// 1, 2, 3, 4　←これが画面に表示される

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];
$count = count($arr);

for( $i=0;$i<$count;$i++ ) {
    for( $b=1;$b<$count;$b++) {
        $a = $b - 1;
        if($arr[$a] > $arr[$b]) {
            $temp = $arr[$b];
            $arr[$b] = $arr[$a];
            $arr[$a] = $temp;
        }
    }
}
// ここで並び替え処理
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>数字並び替えプログラム</title>
</head>
<body>
    <!-- ここに並び替え後を表示 -->
<?php
$arr_str = "";
foreach ( $arr as $key => $value ){
    $arr_str .= strval($value);

    if (count($arr)-1 > $key){
        $arr_str .= ",";
    }
}
$arr_str .= "";

echo $arr_str;
?>
</body>
</html>

