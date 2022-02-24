<?
	include "../common.php";

	$no1 = $_REQUEST[no1];
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$birthday1 = $_REQUEST[birthday1];
	$birthday2 = $_REQUEST[birthday2];
	$birthday3 = $_REQUEST[birthday3];

	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query = "insert into test2s (name10,test2_no10,birthday10) values ('$name','$no1','$birthday');";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'test2s.php?no1=$no1'</script>");
?>