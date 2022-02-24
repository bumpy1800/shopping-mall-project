<?
	include "common.php";

	$no = $_REQUEST[no];
	$uid = $_REQUEST[uid];
	$pwd = $_REQUEST[pwd];
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$birthday1 = $_REQUEST[birthday1];
	$birthday2 = $_REQUEST[birthday2];
	$birthday3 = $_REQUEST[birthday3];
	$sm = $_REQUEST[sm];
	$tel1 = $_REQUEST[tel1];
	$tel2 = $_REQUEST[tel2];
	$tel3 = $_REQUEST[tel3];
	$phone1 = $_REQUEST[phone1];
	$phone2 = $_REQUEST[phone2];
	$phone3 = $_REQUEST[phone3];
	$email = $_REQUEST[email];
	$zip = $_REQUEST[zip];
	$juso = $_REQUEST[juso];
	$gubun = $_REQUEST[gubun];

	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
	$phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query = "update member set pwd10='$pwd',
				name10='$name', birthday10='$birthday', sm10='$sm', tel10='$tel', phone10='$phone', email10='$email', zip10='$zip', juso10='$juso', gubun10='$gubun'
				where no10=$no;";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'member.php'</script>");
?>