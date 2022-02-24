<?
	include "../common.php";

	$no1=$_REQUEST[no1]; // 주옵션
	$no2=$_REQUEST[no2]; // 주옵션
?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>
<?

	$query = "select * from test2s where no10=$no2;";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사
	$row = mysqli_fetch_array($result);	// 1레코드 읽기
	$birthday1=trim(substr($row[birthday10],0,4));      
	$birthday2=trim(substr($row[birthday10],5,2));
    $birthday3=trim(substr($row[birthday10],8,2));
?>
<form name="form1" method="post" action="test2s_update.php">

<input type="hidden" name="no1" value="<?=$no1?>">
<input type="hidden" name="no2" value="<?=$no2?>">

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">가족이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name10]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">생일</td>
    <td width="400" align="left">
      <input type="text" name="birthday1" size="4" maxlength="4" value="<?=$birthday1?>">
      <input type="text" name="birthday2" size="2" maxlength="2" value="<?=$birthday2?>">
      <input type="text" name="birthday3" size="2" maxlength="2" value="<?=$birthday3?>"> 
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
	  <input type="submit" value="저장"> &nbsp
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>