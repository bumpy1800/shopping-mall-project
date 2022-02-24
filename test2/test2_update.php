<?
	include "../common.php";

	$no1 = $_REQUEST[no1];
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$tel1 = $_REQUEST[tel1];
	$tel2 = $_REQUEST[tel2];
	$tel3 = $_REQUEST[tel3];

	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

	$query = "update test2 set name10='$name',tel10='$tel' where no10='$no1';";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'test2.php?no1=$no1'</script>");
?>