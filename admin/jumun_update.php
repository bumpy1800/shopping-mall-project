<?
	include "common.php";

	$no = $_REQUEST[no];		// 혹은 $name = $_POST[name];
	$state = $_REQUEST[state];
	$page = $_REQUEST[page];
	$sel1 = $_REQUEST[sel1];
	$sel2 = $_REQUEST[sel2];
	$text1 = $_REQUEST[text1];
	$day1_y = $_REQUEST[day1_y];
	$day1_m = $_REQUEST[day1_m];
	$day1_d = $_REQUEST[day1_d];
	$day2_y = $_REQUEST[day2_y];
	$day2_m = $_REQUEST[day2_m];
	$day2_d = $_REQUEST[day2_d];

	$query = "update jumun set state10='$state'	where no10=$no;";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'jumun.php?no=$no&state=$state&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'</script>");
?>