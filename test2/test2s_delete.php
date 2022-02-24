<?
	include "../common.php";
	
	$no1 = $_REQUEST[no1];
	$no2 = $_REQUEST[no2];

	$query = "delete from test2s where no10=$no2;";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'test2s.php?no1=$no1'</script>");
?>