<?
	include "main_top.php";
	include "common.php";

	$cart = $_COOKIE[cart];
	$n_cart = $_COOKIE[n_cart];
	
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function cart_edit(kind,pos) 
			{
				if (kind=="deleteall") 
				{
					location.href = "cart_edit.php?kind=deleteall";
				} 
				else if (kind=="delete")	
				{
					location.href = "cart_edit.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	
				{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	
				{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

			<!-- form2 시작  -->
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td height="30" align="left"><img src="images/cart1.png" width="100%" height="30" border="0"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="30%" class="cmfont">
				<tr>
					<td><img src="images/cart_title1.gif" border="0" align="right"></td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC" align="center">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="420" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="80"  align="center">가격</td>
					<td width="90"  align="center">합계</td>
					<td width="50"  align="center">삭제</td>
				</tr>

				<form name="form2" method="post">
			<?
				$total=0;
					if (!$n_cart) $n_cart=0;
					for ($i=1;  $i<=$n_cart;  $i++)
					{
					    if ($cart[$i])
						{
							list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
							$query = "select * from product where no10=$no;";
							$result = mysqli_query($db,$query);					// sql 실행
							if(!$result) exit("에러 : $query");						// 에러조사

							$row = mysqli_fetch_array($result);	// 1레코드 읽기

							if($row[icon_sale10]==0)
							{
								$price=number_format($row[price10]);
								$total_price=number_format($row[price10]*$num);
							}
							else
							{
								$price1=(round($row[price10]*(100-$row[discount10])/100, -1));
								$total_price=number_format($price1*$num);
								$price=number_format($price1);
							}

							$query = "select * from opts where no10=$opts1;";
							$result = mysqli_query($db,$query);					// sql 실행
							if(!$result) exit("에러 : $query");						// 에러조사

							$row_opts1 = mysqli_fetch_array($result);	// 1레코드 읽기

							$query = "select * from opts where no10=$opts2;";
							$result = mysqli_query($db,$query);					// sql 실행
							if(!$result) exit("에러 : $query");						// 에러조사

							$row_opts2 = mysqli_fetch_array($result);	// 1레코드 읽기
						    //제품($no), 옵션 ($opts1, $opts2) 정보 알아내기
						    echo("<tr>
									<td height='60' align='center' bgcolor='#FFFFFF'>
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td width='60'>
													<a href='product_detail.php?no=$row[no10]'><img src='product/$row[image110]' width='50' height='50' border='0'></a>
												</td>
												<td class='cmfont'>
													<a href='product_detail.php?no=$row[no10]'>$row[name10]</a><br>
													<font color='#0066CC'>[옵션사항]</font> $row_opts1[name10] / $row_opts2[name10]
												</td>
											</tr>
										</table>
									</td>
									<td align='center' bgcolor='#FFFFFF'>
										<input type='text' name='num$i' size='3' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
									</td>
									<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price 원</font></td>
									<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$total_price 원</font></td>
									<td align='center' bgcolor='#FFFFFF'>
										<a href = 'javascript:cart_edit(\"update\",\"$i\")'><img src='images/b_edit1.gif' border='0'></a>&nbsp<br>
										<a href = 'javascript:cart_edit(\"delete\",\"$i\")'onClick = 'javascript:return confirm(\"삭제할까요 ? \")'><img src='images/b_delete1.gif' border='0'></a>&nbsp
									</td>
								</tr>");
						    //금액=수량*단가 (sale인 경우는 할인된 단가)
							if($row[icon_sale10]==0)
								$total=$total+($row[price10]*$num);
							else
								$total=$total+($price1*$num);
						}
					}
					$total1=number_format($total);
					$baesongbi1=number_format($baesongbi);
					if (($total < $max_baesongbi) && $total > 0)
					{
						$total2=$total + $baesongbi;
						$total3=number_format($total2);
						echo("<tr>
						<td colspan='5' bgcolor='#F0F0F0'>
							<table width='100%' border='0' cellpadding='0' cellspacing='0' class='cmfont'>
								<tr>
									<td bgcolor='#F0F0F0'><img src='images/cart_image1.gif' border='0'></td>
									<td align='right' bgcolor='#F0F0F0'>
										<font color='#0066CC'><b>총 합계금액</font></b> : 상품대금($total1 원) + 배송료($baesongbi1 원) = <font color='#FF3333'><b>$total3 원</b></font>&nbsp;&nbsp
									</td>
								</tr>");
					}
					else
					{
						echo("<tr>
						<td colspan='5' bgcolor='#F0F0F0'>
							<table width='100%' border='0' cellpadding='0' cellspacing='0' class='cmfont'>
								<tr>
									<td bgcolor='#F0F0F0'><img src='images/cart_image1.gif' border='0'></td>
									<td align='right' bgcolor='#F0F0F0'>
										<font color='#0066CC'><b>총 합계금액</font></b> : 상품대금($total1 원) + 배송료(0 원) = <font color='#FF3333'><b>$total1 원</b></font>&nbsp;&nbsp
									</td>
								</tr>");
					}
			?>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="44">
					<td width="710" align="center" valign="middle">
						<a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
						<a href="javascript:cart_edit('deleteall',0)"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
						<a href="order.php"><img src="images/b_order1.gif" border="0"></a>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>