<?
	include "common.php";
	
	$no=$_REQUEST[no];
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$kor = $_REQUEST[kor];
	$eng = $_REQUEST[eng];
	$mat = $_REQUEST[mat];
	$hap = $_REQUEST[hap];
	$avg = $_REQUEST[avg];

	$query = "update sj set name10='$name', kor10=$kor,
				eng10=$eng, mat10=$mat, hap10=$hap,
				avg10=$avg where no10=$no;";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'sj_list.php'</script>");
?>