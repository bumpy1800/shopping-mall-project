<?
	include "common.php";
	
	$name = $_REQUEST[name];		// 혹은 $name = $_POST[name];
	$kor = $_REQUEST[kor];
	$eng = $_REQUEST[eng];
	$mat = $_REQUEST[mat];
	$hap = $_REQUEST[hap];
	$avg = $_REQUEST[avg];

	$query = "insert into sj (name10, kor10, eng10, mat10, hap10, avg10)
					values ('$name', $kor, $eng, $mat, $hap, $avg);";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'sj_list.php'</script>");
?>