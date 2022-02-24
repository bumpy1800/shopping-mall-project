<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_top.php";
	include "common.php";

	$findtext=$_REQUEST[findtext];
	$page=$_REQUEST[page];

	$query = "select * from product where name10 like '%$findtext%' order by name10";
	$result = mysqli_query($db,$query);
    if (!$result) exit("에러: $query");
	$count=mysqli_num_rows($result);           // 출력할 제품 개수
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">
				function SearchProduct() 
				{
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tr><td height="13"></td></tr>
			  <tr>
			    <td height="30" align="center"><p><img src="images/search_title.gif" width="100%" height="30" border="0" /></p></td>
			  </tr>
			  <tr><td height="13"></td></tr>
			</table>

			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="right" valign="middle" colspan="3" height="5">
						<table border="0" cellpadding="0" cellspacing="0" width="90%" >
							<tr><td class="cmfont"><img src="images/search_title1.gif" border="0"></td></tr>
      			  <tr><td height="10"></td></tr>
			      </table>
					</td>
				</tr>
				<tr>
					<td width="100%" align="center" valign="top" bgcolor="#FFFFFF"> 
					<table width="800" border="0" cellpadding=0 cellspacing=0 class="cmfont" align="center">
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
							<tr height="29" bgcolor="EEEEEE"> 
								<td width="80"  align="center">그림</td>
								<td align="center">상품명</td>
								<td width="150" align="right">가격</td>
								<td width="20"></td>
							</tr>
							<?
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

							for($i=0; $i<$page_last; $i++)
							{
								$row=mysqli_fetch_array($result);
								$price1=number_format($row[price10]);
							echo("<tr height='70'>
								<td width='80' align='center' valign='middle'>
									<a href='product_detail.php?no=$row[no10]'><img src='product/$row[image110]' width='60' height='60' border='0'></a>
								</td>
								<td align='left' valign='middle'>
									<a href='product_detail.php?no=$row[no10]'><font color='#4186C7'><b>$row[name10]</b></font></a><br>");
									if($row[icon_new10] == 1)
									echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
									if($row[icon_hit10] == 1)
									echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									if($row[icon_sale10] == 1)
									echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'><font color='red'><br>$row[discount10] %</br></font>");
								echo("</td>");
								if($row[icon_sale10] == 1)
								{
									$sale_price=number_format(round($row[price10]*(100-$row[discount10])/100, -1));
									echo("<td width='150' align='right' valign='middle'><strike>$price1 원</strike><br>$sale_price 원</td>");
								}
								else
									echo("<td width='150' align='right' valign='middle'><br>$price1 원</td>");
								echo("<td width='20'></td></tr>");
							}
							?>
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
						</table>
					</td>
				</tr>
			</table>
			<? 
		$blocks = ceil($pages/$page_block);
		$block = ceil($page/$page_block);
		$page_s = $page_block * ($block-1);
		$page_e = $page_block * $block;
		if($blocks <= $block) $page_e = $pages;

		echo("<table width='100%' border='0'>
				<tr>
					<td height='20' align='center'>");
		
		if($block > 1)		//이전 블록으로
		{
			$tmp = $page_s;
			echo("<a href='product_search.php?page=$tmp&findtext=$findtext'>
						<img src='images/i_prev.gif' align='absmiddle' border='0'>
					</a>&nbsp");
		}

		for($i=$page_s+1; $i<=$page_e; $i++)		//현재 블록의 페이지
		{
			if($page == $i)
				echo("<font color='red'><b>$i</b></font>&nbsp");
			else
				echo("<a href='product_search.php?page=$i&findtext=$findtext'>[$i]</a>&nbsp");
		}
		
		if($block < $blocks)		//다음 블록으로
		{
			$tmp=$page_e+1;
			echo("&nbsp<a href='product_search.php?page=$tmp&findtext=$findtext'>
						<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>");
		}

		echo("	</td>
					</tr>
					</table>");
					
	?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>