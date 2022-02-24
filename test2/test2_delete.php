<?
	include "../common.php";
	
	$no1 = $_REQUEST[no1];

	$query = "delete from test2 where no10=$no1;";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'test2.php'</script>");
?>