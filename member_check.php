<?
	include "common.php";

	$uid =$_POST[uid];
	$pwd=$_POST[pwd];

		$query="select no10, name10 from member where uid10='$uid' and pwd10='$pwd';";

		$result = mysqli_query($db,$query);					// sql 실행
		if(!$result) exit("에러 : $query");						// 에러조사

		$count = mysqli_num_rows($result);					// 전체 레코드개수

		if($count>0)
		{
		
			$row = mysqli_fetch_array($result);	// 1레코드 읽기

			setcookie("cookie_no",$row[no10]);
			setcookie("cookie_name",$row[name10]);

			echo("<script>location.href='index.html'</script>");

		}
		else
		{

			echo("<script>location.href='member_login.php'</script>");

		}
?>
