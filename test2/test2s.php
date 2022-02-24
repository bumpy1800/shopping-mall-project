<?
	include "../common.php";

	$no1=$_REQUEST[no1]; // 주옵션

	$query = "select * from test2 where no10=$no1 order by no10;";		// sql 정의
	
	$result = mysqli_query($db,$query);					// sql 실행
	if(!$result) exit("에러 : $query");						// 에러조사

	$count = mysqli_num_rows($result);					// 전체 레코드개수

	$row = mysqli_fetch_array($result);	// 1레코드 읽기
?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<input type="hidden" name="no1" value="<?=$no1?>">

<table width="300" border="0">
	<tr>
		<td align="left"  width="300" valign="bottom">
			직원이름 : <font color="blue"><b><?=$row[name10]?></b></font>
		</td>
		<td align="right" width="200" valign="bottom">
			<a href="test2s_new.php?no1=<?=$no1?>">입력</a>
		</td>
	</tr>
</table>

<table width="300" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">가족이름</td>
    <td width="100" align="center">기족생일</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>
<?
	$query = "select * from test2s where test2_no10=$no1 order by no10;";		// sql 정의
	
	$result = mysqli_query($db,$query);					// sql 실행
	if(!$result) exit("에러 : $query");						// 에러조사

	$count = mysqli_num_rows($result);					// 전체 레코드개수
	for($i = 0; $i < $count; $i++)
	{
		$row = mysqli_fetch_array($result);	// 1레코드 읽기
		$birthday1=trim(substr($row[birthday10],0,4));      
		$birthday2=trim(substr($row[birthday10],5,2));
	    $birthday3=trim(substr($row[birthday10],8,2));
		$birthday=$birthday1."-".$birthday2."-".$birthday3;
	echo("<tr>
    <td width='100' align='center'>$row[name10]</td>
    <td width='100' align='center'>$birthday</td>
    <td width='100' align='center'>
		<a href='test2s_edit.php?no1=$no1&no2=$row[no10]'>수정</a> / 
		<a href='test2s_delete.php?no1=$no1&no2=$row[no10]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
  </tr>");
	}
 ?>
</table>

<table width="300" border="0">
	 <tr height="35">
		<td align="center"> 
			<input type="button" value="가족 목록화면으로" onclick="javascript:location.href='test2.php';">
		</td>
	</tr>
</table>

</body>
</html>
