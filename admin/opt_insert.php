<?
	include "common.php";
	
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];

	$query = "insert into opt (name10) values ('$name');";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'opt.php'</script>");
?>