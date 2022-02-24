<?
	include "common.php";

	$no1 = $_REQUEST[no1];
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];

	$query = "update opt set name10='$name' where no10='$no1';";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'opt.php?no1=$no1'</script>");
?>