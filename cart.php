<?php
require_once "BookFunx.php";
require_once "DvdFunx.php"
?>
<?php
// セッションを開始
session_start();

// セッションからカートを取得
$book_cart = null;
$dvd_cart = null;
if(isset($_SESSION["book_cart"]) or isset($_SESSION["dvd_cart"])){
    if (isset($_SESSION["book_cart"])) {
	$book_cart = $_SESSION["book_cart"];
    }
    if (isset($_SESSION["dvd_cart"])) {
    $dvd_cart = $_SESSION["dvd_cart"];
    }
}else {
	$book_cart = [];
	$dvd_cart = [];
}

// リクエストパラメータを取得
$book_id = -1;
$dvd_id = -1;
if (isset($_REQUEST["book_id"])) {
	$book_id = $_REQUEST["book_id"];
}
if(isset($_REQUEST["dvd_id"])) {
    $dvd_id = $_REQUEST["dvd_id"];
}
//mode
$book_mode = "";
$dvd_mode = "";
if (isset($_REQUEST["book_mode"])) {
	$book_mode = $_REQUEST["book_mode"];
}
if(isset($_REQUEST["dvd_mode"])) {
    $dvd_mode = $_REQUEST["dvd_mode"];
}

// リクエストパラメータに対応する楽器を取得
if($book_id > -1 or $dvd_id > -1){
    if ($book_id > -1) {
        $bookItems = createBookItems();
    	$bookItem = $bookItems[$book_id];
	    // カートに選択された楽器を追加
	    $book_cart[] = $bookItem;
    	// セッションに再設定する
    	$_SESSION["book_cart"] = $book_cart;
    }
    if($dvd_id > -1){
        $dvdItems = createDvdItems();
        $dvdItem = $dvdItems[$dvd_id];
        // カートに選択された楽器を追加
        $dvd_cart[] = $dvdItem;
        // セッションに再設定する
        $_SESSION["dvd_cart"] = $dvd_cart;
    }
}
elseif($book_id > -1 and $dvd_id > -1){
    $bookItems = createBookItems();
    $dvdItems = createDvdItems();
    
	$bookItem = $bookItems[$book_id];
	$dvdItem = $dvdItems[$dvd_id];

	$book_cart[] = $bookItem;
	$dvd_cart[] = $dvdItem;

	$_SESSION["book_cart"] = $book_cart;
	$_SESSION["dvd_cart"] = $dvd_cart;
}

// カートのクリア処理
if ($book_mode === "clear") {
	$book_cart = [];
	$dvd_cart = [];
	unset($_SESSION["book_cart"]);
	unset($_SESSION["dvd_cart"]);
	session_destroy();
}
//HTML ソースコード
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>カート</title>
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/shoppingcart.css" />	
</head>

<body>
	<h1>カート</h1>
	<p><a href="entry.php">買い物を続ける</a>　<a href="cart.php?book_mode=clear">カートをクリアする</a></p>
	<?php $book_position = 0;
	$dvd_position = 0;
	if (count($book_cart) === 0 and count($dvd_cart) === 0) { ?>
		<p>カートに商品は入っていません。</p>
	<?php } elseif(count($book_cart) != 0 or count($dvd_cart) != 0) { ?>
	<?php if(count($book_cart) != 0 and count($dvd_cart) === 0) { ?>
	<table>
		<tr>
		    <th><h3>書籍</h3></th>
			<th>書籍名</th>
			<th>価格</th>
			<th>著者</th>
			<th>ISBN</th>
		</tr>
		<?php foreach ($book_cart as $product) { $book_position++; ?>
		<tr>
		    <td><?= $book_position ?></td>
			<td><?= $product->getBookName() ?></td>
			<td><?= $product->getBookAuthor() ?></td>
			<td><?= $product->getBookPrice() ?>円</td>
			<td><?= $product->getBookCode() ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php }elseif(count($dvd_cart) != 0 and count($book_cart) === 0 ) {  ?>
	<table>
		<tr>
		    <th><h3>DVD</h3></th>
			<th>タイトル</th>
			<th>価格</th>
			<th>収録時間</th>
		</tr>
		<?php foreach ($dvd_cart as $product) { $dvd_position++; ?>
		<tr>
		    <td><?= $dvd_position ?></td>
			<td><?= $product->getDvdName() ?></td>
			<td><?= $product->getDvdPrice() ?>円</td>
			<td><?= $product->getDvdTime() ?>分</td>
		</tr>
		<?php } ?>
		</table>
		<?php }elseif(count($dvd_cart) != 0 and count($book_cart) != 0) { ?>
		<table>
		<tr>
		    <th><h3>書籍</h3></th>
			<th>書籍名</th>
			<th>価格</th>
			<th>著者</th>
			<th>ISBN</th>
		</tr>
		<?php foreach ($book_cart as $product) { $book_position++; ?>
		<tr>
		    <td><?= $book_position ?></td>
			<td><?= $product->getBookName() ?></td>
			<td><?= $product->getBookAuthor() ?></td>
			<td><?= $product->getBookPrice() ?>円</td>
			<td><?= $product->getBookCode() ?></td>
		</tr>
		<?php } ?>
		</table>
	    <table>
		<tr>
		    <th><h3>DVD</h3></th>
			<th>タイトル</th>
			<th>価格</th>
			<th>収録時間</th>
		</tr>
		<?php foreach ($dvd_cart as $product) { $dvd_position++; ?>
		<tr>
		    <td><?= $dvd_position ?></td>
			<td><?= $product->getDvdName() ?></td>
			<td><?= $product->getDvdPrice() ?>円</td>
			<td><?= $product->getDvdTime() ?>分</td>
		</tr>
		<?php } ?>
		</table>
		<?php }} ?>
	</table>
</body>

</html>
