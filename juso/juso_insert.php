<?
	include "common.php";
	
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$tel1 = $_REQUEST[tel1];
	$tel2 = $_REQUEST[tel2];
	$tel3 = $_REQUEST[tel3];
	$sm = $_REQUEST[sm];
	$birthday1 = $_REQUEST[birthday1];
	$birthday2 = $_REQUEST[birthday2];
	$birthday3 = $_REQUEST[birthday3];
	$juso = $_REQUEST[juso];

	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query = "insert into juso (name10, tel10, sm10, birthday10, juso10)
					values ('$name', '$tel', '$sm', '$birthday', '$juso');";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'juso_list.php'</script>");
?>