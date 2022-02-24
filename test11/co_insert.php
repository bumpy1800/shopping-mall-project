<?
	include "common.php";
	
	$coname = $_REQUEST[coname];		// 혹은 $name = $_POST[name];
	$phone1 = $_REQUEST[phone1];
	$phone2 = $_REQUEST[phone2];
	$phone3 = $_REQUEST[phone3];
	$gubun = $_REQUEST[gubun];
	$startday1 = $_REQUEST[startday1];
	$startday2 = $_REQUEST[startday2];
	$startday3 = $_REQUEST[startday3];
	$address = $_REQUEST[address];

	$phone = sprintf("%-3s%-3s%-4s", $phone1, $phone2, $phone3);
	$startday = sprintf("%04d-%02d-%02d", $startday1, $startday2, $startday3);

	$query = "insert into co (coname10, phone10, gubun10, startday10, address10)
					values ('$coname', '$phone', '$gubun', '$startday', '$address');";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'co_list.php'</script>");
?>