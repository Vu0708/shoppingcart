<?php
require_once "BookFunx.php";
require_once("DvdFunx.php");
?>
<?php
$BookItem = [];
$BookItem = createBookItems();
$DvdItem = [];
$DvdItem = createDvdItems();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>課題・商品検索アプリケーション</title>
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/shoppingcart.css" />
</head>

<body id="products" class="list">
	<header>
		<h1>商品検索アプリケーション</h1>
	</header>

	<main>
		<article id="result">
			<h2>商品検索 - 検索結果</h2>
			<section>
				<h3>商品一覧</h3>
				<table>
					<caption><a href="entry.php">検索画面に戻る</a>　<a href="cart.php">カートの中身を見る</a></caption>
			<?php
			if (isset($_GET["category"])){
			    $result = $_GET["category"];
			    if($result == "book"){ ?>
			        <tr>
						<th>書籍名</th>
						<th>価格</th>
						<th>著者</th>
						<th>ISBN</th>
						<th></th>
					</tr>
					<?php for ($i=0 ; $i < count($BookItem) ; $i++) { ?>
					<tr> 
					<td> <?= $BookItem[$i]->getBookName() ?> </td> 
					<td> <?= $BookItem[$i]->getBookAuthor() ?> </td>
					<td> <?= $BookItem[$i]->getBookPrice() ?>円 </td>
					<td> <?= $BookItem[$i]->getBookCode() ?> </td>
					<td><a href="cart.php?book_id=<?= $i ?>">カートに入れる</a></td>
					</tr>
					<?php } ?>
					<?php }elseif ($result == "dvd"){ ?>
					<tr>
						<th>タイトル</th>
						<th>価格</th>
						<th>収録時間</th>
						<th></th>
					</tr>
					   <?php for($i = 0 ; $i < count($DvdItem) ; $i++ ) { ?>
					<tr> 
					<td> <?= $DvdItem[$i]->getDvdName() ?> </td> 
					<td> <?= $DvdItem[$i]->getDvdPrice() ?>円 </td>
					<td> <?= $DvdItem[$i]->getDvdTime() ?>分 </td>
					<td><a href="cart.php?dvd_id=<?= $i ?>">カートに入れる</a></td>
					</tr>
					<?php } ?>
					<?php }
					}else { ?>
					<tr>
					    <th><h3>書籍</h3></th>
						<th>書籍名</th>
						<th>価格</th>
						<th>著者</th>
						<th>ISBN</th>
						<th></th>
					</tr>
					<?php for ($i=0 ; $i < count($BookItem) ; $i++) { ?>
					<tr> 
					<td></td>
					<td> <?= $BookItem[$i]->getBookName() ?> </td> 
					<td> <?= $BookItem[$i]->getBookAuthor() ?> </td>
					<td> <?= $BookItem[$i]->getBookPrice() ?>円 </td>
					<td> <?= $BookItem[$i]->getBookCode() ?> </td>
					<td><a href="cart.php?book_id=<?= $i ?>">カートに入れる</a></td>
					</tr>
					<?php } ?>
					<br><br>
					<tr>
					    <th><h3>DVD</h3></th>
						<th>タイトル</th>
						<th>価格</th>
						<th>収録時間</th>
						<th></th>
					</tr>
					<?php for($j = 0 ; $j < count($DvdItem) ; $j++ ) { ?>
					<tr> 
					<td></td>
					<td> <?= $DvdItem[$j]->getDvdName() ?> </td> 
					<td> <?= $DvdItem[$j]->getDvdPrice() ?>円 </td>
					<td> <?= $DvdItem[$j]->getDvdTime() ?>分 </td>
					<td><a href="cart.php?dvd_id=<?= $j ?>">カートに入れる</a></td>
					</tr>
					<?php } ?>
					<?php
					}
					?>
				</table>
			</section>
		</article>
	</main>

	<footer>
		<div id="copyright">(C) 2019 The Advanced Course on Web System Development</div>
	</footer>
</body>

</html>