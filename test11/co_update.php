<?
	include "common.php";

	$no = $_REQUEST[no];

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

	$query = "update co set coname10='$coname', phone10='$phone',
				gubun10='$gubun', startday10='$startday', address10='$address'
				where no10=$no;";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'co_list.php'</script>");
?>