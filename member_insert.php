<?
	include "common.php";

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

	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
	$phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query = "insert into member (uid10, pwd10, name10, birthday10, sm10, tel10, phone10, email10, zip10, juso10, gubun10)
					values ('$uid', '$pwd', '$name', '$birthday', '$sm', '$tel', '$phone', '$email', '$zip', '$juso', 0);";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'member_joinend.php'</script>");
?>