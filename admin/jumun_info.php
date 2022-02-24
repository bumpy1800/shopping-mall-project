<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";

	$no=$_REQUEST[no];

	$query="select * from jumun where no10=$no;";

	$result=mysqli_query($db,$query); 
	if (!$result) exit("에러:$query");

	$count=mysqli_num_rows($result);    // 레코드개수

	$row = mysqli_fetch_array($result);	// 1레코드 읽기
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>
<?
	if($row[member_no10]==0)
		$member=$row[o_name10] . " (비회원)";
	else
		$member=$row[o_name10];

	if($row[state10]==5)
		$color="blue";
	else if($row[state10]==6)
		$color="red";
	else
		$color="black";
?>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row[no10]?> (<font color="<?=$color?>"><?=$a_state[$row[state10]]?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[jumunday10]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$member?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_tel10]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email10]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_phone10]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip10]?>) <?=$row[o_juso10]?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_name10]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_tel10]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_email10]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_phone10]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[r_zip10]?>) 서울 노원구 초안산로길</td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row[memo10]?></td>
	</tr>
</table>
<br>
<?
	if($row[pay_method10]==0)
		$pay_method = "카드";
	else
		$pay_method = "무통장";
	
	if($row[card_halbu10]==0)
		$halbu = "일시불";
	else
		$halbu = $row[card_halbu10] . "개월";

	if($row[card_kind10]==1)
		$card="국민카드";
	else if($row[card_kind10]==2)
		$card="신한카드";
	else if($row[card_kind10]==3)
		$card="우리카드";
	else if($row[card_kind10]==4)
		$card="하나카드";

	if($row[bank_kind10]==1)
		$bank="국민은행 000-00000-0000";
	else if($row[card_kind10]==2)
		$bank="신한은행 000-00000-0000";
?>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
<?
	if($row[pay_method10]==0)
		echo("<tr> 
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>지불종류</font></td>
			<td width='300' height='20' bgcolor='#EEEEEE'>$pay_method</td>
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
			<td width='300' height='20' bgcolor='#EEEEEE'>$row[card_okno10]&nbsp</td>
		</tr>
		<tr> 
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>
			<td width='300' height='20' bgcolor='#EEEEEE'>$halbu</td>
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>
			<td width='300' height='20' bgcolor='#EEEEEE'>$card</td>
		</tr>");
		else
		echo("<tr> 
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>무통장</font></td>
			<td width='300' height='20' bgcolor='#EEEEEE'>$bank</td>
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
			<td width='300' height='20' bgcolor='#EEEEEE'>$row[bank_sender10]</td>
		</tr>");
?>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
<?
	$query="select product.name10 as p_name, opts1.name10 as o1_name, opts2.name10 as o2_name, jumuns.num10 as j_num, product.discount10 as p_discount, jumuns.price10 as j_price, jumuns.cash10 as j_cash, jumuns.product_no10 as j_product_no from jumuns, product, opts as opts1, opts as opts2 where jumuns.product_no10=product.no10 and jumuns.opts_no110=opts1.no10 and jumuns.opts_no210=opts2.no10 and jumuns.jumun_no10='$no';";

	$result=mysqli_query($db,$query); 
	if (!$result) exit("에러:$query");

	$count=mysqli_num_rows($result);    // 레코드개수

	$total = 0;

	for($i=0; $i < $count; $i++)
	{
		$row = mysqli_fetch_array($result);	// 1레코드 읽기
		$price=number_format($row[j_price]);
		$cash=number_format($row[j_cash]);

			echo("<tr bgcolor='#EEEEEE' height='20'>	
				<td width='340' height='20' align='left'>$row[p_name]</td>	
				<td width='50'  height='20' align='center'>$row[j_num]</td>	
				<td width='70'  height='20' align='right'>$price</td>	
				<td width='70'  height='20' align='right'>$cash</td>	
				<td width='50'  height='20' align='center'>$row[p_discount]%</td>	
				<td width='60'  height='20' align='center'>$row[o1_name]</td>	
				<td width='60'  height='20' align='center'>$row[o2_name]</td>	
			</tr>");
			$total = $total + $row[j_cash];
	}
	$query="select * from jumuns where jumun_no10='$no';";

	$result=mysqli_query($db,$query); 
	if (!$result) exit("에러:$query");

	$count=mysqli_num_rows($result);    // 레코드개수

	$baesongbi1=number_format($baesongbi);

	for($i=0; $i < $count; $i++)
	{
		$row = mysqli_fetch_array($result);	// 1레코드 읽기

		if($row[product_no10]==0)
		{
			echo("<tr bgcolor='#EEEEEE' height='20'>	
				<td width='340' height='20' align='left'>배송비</td>	
				<td width='50'  height='20' align='center'>1</td>	
				<td width='70'  height='20' align='right'>$baesongbi1</td>	
				<td width='70'  height='20' align='right'>$baesongbi1</td>	
				<td width='50'  height='20' align='center'>&nbsp</td>	
				<td width='60'  height='20' align='center'>&nbsp</td>	
				<td width='60'  height='20' align='center'>&nbsp</td>	
			</tr>");
		}
	}
		if($total < $max_baesongbi)
		{
			$total = $total + $baesongbi;
			$total1=number_format($total);
		}
		else
		{
			$total1=number_format($total);
		}
		echo("</table>");
	
		echo("<img src='blank.gif' width='10' height='5'><br>
		<table width='800' border='1' cellpadding='2' style='border-collapse:collapse'>
			<tr> 
			  <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>총금액</font></td>
				<td width='700' height='20' bgcolor='#EEEEEE' align='right'><font color='#142712' size='3'><b>$total1</b></font> 원&nbsp;&nbsp</td>
			</tr>
		</table>");
?>
<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
