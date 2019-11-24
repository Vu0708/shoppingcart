<?php
require_once "BookItem.php";
?>
<?php
/**
 * 商品の配列を生成する。
 * @return array Itemクラスのインスタンスを要素とする配列
 */
function createBookItems():array {
	$BookItems = array(
		new BookItem("Head First PHP & MySQL","Lynn Beighley",4650,"978-4873114446"),
		new BookItem("リーダブルコード","Dustin Boswell",2600,"978-4873115658"),
		new BookItem("Head First デザインパターン", "Eric Freeman",5060,"978-4873112497"),
		new BookItem("PHP によるデザインパターン入門", "下岡秀幸",2400,"978-4798015163")
	);
	return $BookItems;
}
?>
