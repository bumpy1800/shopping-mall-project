<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_top.php";
	include "common.php";
	$menu=$_REQUEST[menu];
	$page=$_REQUEST[page];
	$sort=$_REQUEST[sort];
	$text1=$_REQUEST[text1];
	$query="select * from product where status10=1 and menu10=$menu order by no10;";
	$result = mysqli_query($db,$query);
	if (!$result) exit("에러: $query");
	$count=mysqli_num_rows($result);           // 출력할 제품 개수
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

      <!-- 하위 상품목록 -->

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="100%" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="90%" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="#C83762" class="cmfont"><b><?=$a_menu[$menu]?> &nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">
														<?/*
														if ($sort=="up")            // 고가격순
														{
														$query="select * from product where menu10=$menu order by price10 desc";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>
																<option value='new'>신상품순 정렬</option>
																<option value='up' selected>고가격순 정렬</option>
																<option value='down'>저가격순 정렬</option>
																<option value='name'>상품명 정렬</option>
															</select>");
														}
														elseif ($sort=="down")  // 저가격순
														{
													    $query="select * from product where menu10=$menu order by price10";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>
																<option value='new'>신상품순 정렬</option>
																<option value='up'>고가격순 정렬</option>
																<option value='down' selected>저가격순 정렬</option>
																<option value='name'>상품명 정렬</option>
															</select>");
														}
														elseif ($sort=="name")  // 이름순
														{
													    $query="select * from product where menu10=$menu order by name10";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>
																<option value='new'>신상품순 정렬</option>
																<option value='up'>고가격순 정렬</option>
																<option value='down'>저가격순 정렬</option>
																<option value='name' selected>상품명 정렬</option>
															</select>");
														}
														elseif ($sort=="new")                   // 신상품순
														{
													    $query="select * from product where menu10=$menu order by no10 desc";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>
																<option value='new' selected>신상품순 정렬</option>
																<option value='up'>고가격순 정렬</option>
																<option value='down'>저가격순 정렬</option>
																<option value='name'>상품명 정렬</option>
															</select>");
														}*/
														if ($sort==1)            // 고가격순
														{
														$query="select * from product where menu10=$menu order by price10 desc";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														
														}
														elseif ($sort==2)  // 저가격순
														{
													    $query="select * from product where menu10=$menu order by price10";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														
														}
														elseif ($sort==3)  // 이름순
														{
													    $query="select * from product where menu10=$menu order by name10";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														}
														elseif ($sort==0)                   // 신상품순
														{
													    $query="select * from product where menu10=$menu order by no10 desc";
														$result = mysqli_query($db,$query);
														if (!$result) exit("에러: $query");
														$count=mysqli_num_rows($result);           // 출력할 제품 개수
														}
														echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>");
															for ($i=0; $i<$n_sort; $i++)
															{
															   if ($sort==$i)
															       echo("<option value='$i' selected>$a_sort[$i]</option>");
																   else
															       echo("<option value='$i'>$a_sort[$i]</option>");
															}
														echo("</select>");
														
														?>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

			<table border="0" cellpadding="0" cellspacing="0">
				<!--- 1 번째 줄 -->
				<?
						$num_col=4;   $num_row=4;                   // column수, row수
						$icount=0;       // 출력한 제품개수 카운터
						$page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수
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

							echo("<table border='0' cellpadding='0' cellspacing='0'>");
								for ($ir=0; $ir<$num_row; $ir++)
								{
							     echo("<tr>");
								     for ($ic=0;  $ic<$num_col;  $ic++)
								    {
								         if ($icount < $page_last )
								        {
								             $row=mysqli_fetch_array($result);
											 $price1=number_format($row[price10]);
								             echo("
											 <td width='500' height='205' align='center' valign='top'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' class='cmfont'>
							<tr> 
								<td align='center'> 
								<figure class='snip1384'>
								<img src='product/$row[image110]' width='100%' height='140' border='0'><figcaption><h3>구매하러가기</h3>
										<i class='ion-ios-arrow-right'></i>
									  </figcaption>
									<a href='product_detail.php?no=$row[no10]'>
									</figure></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> <br>
								<td height='20' align='center'>
									<a href='product_detail.php?no=$row[no10]'><font color='444444'>$row[name10]</font></a></br>&nbsp"); 
									if($row[icon_new10] == 1)
									echo("<img src='images/new.png' align='absmiddle' vspace='1'>");
									if($row[icon_hit10] == 1)
									echo("<img src='images/hit.png' align='absmiddle' vspace='1'>");
									if($row[icon_sale10] == 1)
									echo("<img src='images/sale.png' align='absmiddle' vspace='1'><font color='red'><br>$row[discount10] %</br></font>");

							if($row[icon_sale10] == 1)
							{
								$sale_price=number_format(round($row[price10]*(100-$row[discount10])/100, -1));
								echo("</td></tr><tr><td height='20' align='center'><strike>$price1 원</strike><br><b>$sale_price 원</b></td></tr></table></td>");
					        }
							else
							echo("</td></tr><tr><td height='20' align='center'><b>$price1 원</b></td></tr></table></td>");
									}
							        else									
						            echo("<td></td>");      // 제품 없는 경우
							        $icount++;			
									}
								    echo("</tr>");
								}
							echo("</table>");
					?>

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
			echo("<a href='product.php?page=$tmp&text1=$text1'>
						<img src='images/i_prev.gif' align='absmiddle' border='0'>
					</a>&nbsp");
		}

		for($i=$page_s+1; $i<=$page_e; $i++)		//현재 블록의 페이지
		{
			if($page == $i)
				echo("<font color='red'><b>$i</b></font>&nbsp");
			else
				echo("<a href='product.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
		}
		
		if($block < $blocks)		//다음 블록으로
		{
			$tmp=$page_e+1;
			echo("&nbsp<a href='product.php?page=$tmp&text1=$text1'>
						<img src='images/i_next.gif' align='absmiddle' border='0'>
					</a>");
		}

		echo("	</td>
					</tr>
					</table></div>");
					
	?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>