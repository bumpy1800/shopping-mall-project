<?
	include "common.php";
	
	$no = $_REQUEST[no];

	$query = "delete from juso where no10=$no;";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'juso_list.php'</script>");
?>