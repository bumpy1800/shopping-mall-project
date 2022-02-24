<?
	include "common.php";

	$cookie_no=$_COOKIE[cookie_no];
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$pwd1 = $_REQUEST[pwd1];
	$tel1 = $_REQUEST[tel1];
	$tel2 = $_REQUEST[tel2];
	$tel3 = $_REQUEST[tel3];
	$phone1 = $_REQUEST[phone1];
	$phone2 = $_REQUEST[phone2];
	$phone3 = $_REQUEST[phone3];
	$sm = $_REQUEST[sm];
	$birthday1 = $_REQUEST[birthday1];
	$birthday2 = $_REQUEST[birthday2];
	$birthday3 = $_REQUEST[birthday3];
	$zip = $_REQUEST[zip];
	$juso = $_REQUEST[juso];
	$email = $_REQUEST[email];

	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
	$phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	if(!$pwd1)
	{  //새 비번을 입력하지 않았을시
		$query = "update member set name10='$name', birthday10='$birthday', sm10='$sm', tel10='$tel', phone10='$phone', email10='$email', zip10='$zip', juso10='$juso'
				where no10=$cookie_no;";	// sql 정의
	}
	else
	{
		$query = "update member set pwd10='$pwd1', name10='$name', birthday10='$birthday', sm10='$sm', tel10='$tel', phone10='$phone', email10='$email', zip10='$zip', juso10='$juso'
				where no10=$cookie_no;";	// sql 정의
	}
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

    $query="select * from member where no10=$cookie_no;";
	$result = mysqli_query($db,$query);					// sql 실행
	if(!$result) exit("에러 : $query");						// 에러조사
	$row = mysqli_fetch_array($result);	// 1레코드 읽기

	setcookie("cookie_name",$row[name10]);

	echo("<script>location.href = 'member_edit.php'</script>");
?>