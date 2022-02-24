<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];
?>
<html>
<head>
	<title>주소록 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="600" border="0">
	<form name="form1" method="post" action="juso_list.php">
	<tr>
		<td>
		이름 : <input type="text" name="text1" size="5" value="<?=$text1?>">
		<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align = "right"><a href = "juso_new.html">입력</a></td>
	</tr>
	</form>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="70" align="center">이름</td>
    <td width="120"  align="center">전화</td>
    <td width="40"  align="center">음/양</td>
    <td width="100"  align="center">생일</td>
    <td width="280"  align="center">주소</td>
    <td width="50"  align="center">삭제</td>
  </tr>
<?
	if(!$text1)
		$query = "select * from juso order by name10;";		// sql 정의
	else
		$query = "select * from juso where name10 like '%$text1%' order by name10;";	

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
		if($row[sm10]==0) $sm="양력"; else $sm="음력";
		$tel1=trim(substr($row[tel10],0,3));
		$tel2=trim(substr($row[tel10],3,4));
		$tel3=trim(substr($row[tel10],7,4));
		$tel=$tel1."-".$tel2."-".$tel3;

	  echo("<tr bgcolor='lightyellow'>
		    <td align = 'center'>&nbsp
			<a href='juso_edit.php?no=$row[no10]'>$row[name10]</a>
			</td>
			 <td align = 'center'>&nbsp $tel</td>
		    <td align = 'center'>&nbsp $sm</td>
		    <td align = 'center'>&nbsp $row[birthday10]</td>
		    <td align = 'center'>&nbsp $row[juso10]</td>
			<td align = 'center'>
				<a href = 'juso_delete.php? no=$row[no10]'
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
			echo("<a href='juso_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_prev.gif' align='absmiddle' border='0'>
					</a>&nbsp");
		}

		for($i=$page_s+1; $i<=$page_e; $i++)		//현재 블록의 페이지
		{
			if($page == $i)
				echo("<font color='red'><b>$i</b></font>&nbsp");
			else
				echo("<a href='juso_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
		}
		
		if($block < $blocks)		//다음 블록으로
		{
			$tmp=$page_e+1;
			echo("&nbsp<a href='juso_list.php?page=$tmp&text1=$text1'>
						<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>");
		}

		echo("	</td>
					</tr>
					</table>");
	?>
</body>
</html>