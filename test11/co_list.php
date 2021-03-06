<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2.4)                                                           -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];
?>
<html>
<head>
	<title>거래처 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="750" border="0">
	<form name="form1" method="post" action="co_list.php">
	<tr>
		<td width="300">&nbsp
			거래처명 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
    <td align="right"><a href="co_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="750"  border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#555555">
    <td width="150" align="center"><font color="white">거래처명</font></td>
    <td width="100" align="center"><font color="white">전화</font></td>
    <td width="100" align="center"><font color="white">소매/도매</font></td>
    <td width="100" align="center"><font color="white">창립일</font></td>
    <td width="250" align="center"><font color="white">주소</font></td>
    <td width="50"  align="center"><font color="white">삭제</font></td>
<?
	if(!$text1)
		$query = "select * from co order by coname10;";		// sql 정의
	else
		$query = "select * from co where coname10 like '%$text1%' order by coname10;";	

	$result = mysqli_query($db,$query);					// sql 실행
	if(!$result) exit("에러 : $query");						// 에러조사

	$count = mysqli_num_rows($result);					// 전체 레코드개수

	if(!$page) $page=1;
	$pages=ceil($count/$page_line);		// 전체 페이지수 : 65/20 = 3.25 -> 4

	// 현재 페이지가 몇 번째 자료부터 시작하는지 계산 : 20(2-1) = 20
	$first=1;
	if($count>0) $first=$page_line*($page-1);

	// 현재 페이지에 표시할 수 있는 줄 수 : 모든 페이지는 20줄씩 표시되지만,
	//		맨 끝 페이지인 경우는 65-60 = 5 줄만 표시 됨.
	$page_last=$count - $first;
	if($page_last > $page_line) $page_last=$page_line;

	if($count>0) mysqli_data_seek($result,$first);

	for($i = 0; $i < $page_last; $i++)
	{
		$row = mysqli_fetch_array($result);	// 1레코드 읽기
		if($row[gubun10]==0) $gubun="소매"; else $gubun="도매";
		$phone1=trim(substr($row[phone10],0,3));
		$phone2=trim(substr($row[phone10],3,3));
		$phone3=trim(substr($row[phone10],6,5));
		$phone=$phone1."-".$phone2."-".$phone3;

	  echo("<tr bgcolor='#DDDDDD'>
		    <td align = 'left'>&nbsp
			<a href='co_edit.php? no=$row[no10]'>$row[coname10]</a>
			</td>
			 <td align = 'center'>&nbsp $phone</td>
		    <td align = 'center'>&nbsp $gubun</td>
		    <td align = 'center'>&nbsp $row[startday10]</td>
		    <td align = 'left'>&nbsp $row[address10]</td>
			<td align = 'center'>
				<a href = 'co_delete.php? no=$row[no10]'
					onClick = 'javascript:return confirm(\"삭제할까요 ? \");'>
					삭제
				</a>
			</td>
  </tr>");
	}
?>
</table>

<?
		$blocks = ceil($pages/$page_block);
		$block = ceil($page/$page_block);
		$page_s = $page_block * ($block-1);
		$page_e = $page_block * $block;
		if($blocks <= $block) $page_e = $pages;

		echo("<table width='600' border='0'>
				<tr>
					<td height='20' align='center'>");
		
		if($block > 1)		//이전 블록으로
		{
			$tmp = $page_s;
			echo("<a href='co_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_prev.gif' align='absmiddle' border='0'>
					</a>&nbsp");
		}

		for($i=$page_s+1; $i<=$page_e; $i++)		//현재 블록의 페이지
		{
			if($page == $i)
				echo("<font color='red'><b>$i</b></font>&nbsp");
			else
				echo("<a href='co_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
		}
		
		if($block < $blocks)		//다음 블록으로
		{
			$tmp=$page_e+1;
			echo("&nbsp<a href='co_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>");
		}

		echo("	</td>
					</tr>
					</table>");
	?>

</body>
</html>
