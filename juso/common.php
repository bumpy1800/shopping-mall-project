<?
	$db = mysqli_connect("localhost","shop10","1234","shop10");
	if (!$db) exit("DB연결에러");

	$page_line=5;			//페이지당 line 수
	$page_block=5;		//블록당 page 수
?>