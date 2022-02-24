<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_top.php";
	include "common.php";

	$no=$_REQUEST[no];

	$query="select * from product where no10=$no;";
	$result = mysqli_query($db,$query);
	if (!$result) exit("에러: $query");
	$count=mysqli_num_rows($result);           // 출력할 제품 개수
    $row=mysqli_fetch_array($result);
	$price1=number_format($row[price10]);
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function Zoomimage(no) 
			{
				window.open("zoomimage.php?no="+no, "", "menubar=no, scrollbars=yes, width=560, height=640, top=30, left=50");
			}

			function check_form2(str) 
			{
				if (form2.opts1.value==0) {
						alert("옵션1을 선택하십시요.");
						form2.opts1.focus();
						return;
				}
				if (form2.opts2.value==0) {
						alert("옵션2를 선택하십시요.");
						form2.opts2.focus();
						return;
				}
				if (form2.num.value==0) {
						alert("수량을 입력하십시요.");
						form2.num.focus();
						return;
				}
				if (str == "D") {
					form2.action = "cart_edit.php";
					form2.kind .value = "order";
					form2.submit();
				}
				else {
					form2.action = "cart_edit.php";
					form2.submit();
				}
			}

			</script>

				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/product.png" width="100%" height="30" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
		
			<!-- form2 시작  -->
			<form name="form2" method="post" action="">
			<input type="hidden" name="no" value="<?=$no?>">
			<input type="hidden" name="kind" value="insert">

			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="335" align="center" valign="top">
						<!-- 상품이미지 -->
						<table border="0" cellpadding="0" cellspacing="1" width="100%" height="315" bgcolor="D4D0C8">
							<tr>
								<td bgcolor="white" align="center">
									<div class="sample_image"><img src="product/<?=$row[image210]?>" height="100%" border="0" align="absmiddle" ONCLICK="Zoomimage('<?=$no?>')" STYLE="cursor:hand"></div>
								</td>
							</tr>
						</table>
					</td>
					<td width="100% " align="center" valign="top">
						<!-- 상품명 -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" class="cmfont">
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<tr>
								<td width="80" height="45" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>제품명</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<font color="282828"><?=$row[name10]?></font><br>
									<?
									if($row[icon_new10] == 1)
									echo("<img src='images/new.png' align='absmiddle' vspace='1'>");
									if($row[icon_hit10] == 1)
									echo("<img src='images/hit.png' align='absmiddle' vspace='1'>");
									if($row[icon_sale10] == 1)
									echo("<img src='images/sale.png' align='absmiddle' vspace='1'><font color='red'><br>$row[discount10] %</br></font>");
									?>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 시중가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>소비자가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td width="289" style="padding-left:10px"><font color="666666"><?=$price1?> 원</font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 판매가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>판매가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<?
								if($row[icon_sale10] == 1)
								{
								$sale_price=number_format(round($row[price10]*(100-$row[discount10])/100, -1));
								echo("<td style='padding-left:10px'><font color='0288DD'><strike>$price1 원</strike><b>=> $sale_price 원</b></font></td>");
								}
								else
								echo("<td style='padding-left:10px'><font color='0288DD'><b>$price1 원</b></font></td>");
								?>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 옵션 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>옵션선택</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
								<?
								$query = "select * from opts where opt_no10=$row[opt110];";
								$result=mysqli_query($db,$query); 
								if (!$result) exit("에러:$query");
								$count=mysqli_num_rows($result);    // 레코드개수
									echo("<select name='opts1' class='cmfont1'>");
									if($row[opt110]==0)
								        echo("<option value='0' selected>옵션선택</option>");
										else
								        echo("<option value='0'>옵션선택</option>");
									for ($i=0; $i<$count; $i++)
									{
										$row1 = mysqli_fetch_array($result);	// 1레코드 읽기
		
									    if ($row[opt110]==$row1[no10])
								        echo("<option value='$row1[no10]' selected>$row1[name10]</option>");
									    else
					   			        echo("<option value='$row1[no10]'>$row1[name10]</option>");
									}
									
									echo("</select> &nbsp;");
								$query = "select * from opts where opt_no10=$row[opt210];";
								$result=mysqli_query($db,$query); 
								if (!$result) exit("에러:$query");
								$count=mysqli_num_rows($result);    // 레코드개수
									echo("<select name='opts2' class='cmfont1'>");
									if($row[opt210]==0)
								        echo("<option value='0' selected>옵션2선택</option>");
										else
								        echo("<option value='0'>옵션2선택</option>");
									for ($i=0; $i<$count; $i++)
									{
										$row1 = mysqli_fetch_array($result);	// 1레코드 읽기
		
									    if ($row[opt210]==$row1[no10])
								        echo("<option value='$row1[no10]' selected>$row1[name10]</option>");
									    else
					   			        echo("<option value='$row1[no10]'>$row1[name10]</option>");
									}
									echo("</select>");
								?>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 수량 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>수량</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<input type="text" name="num" value="1" size="3" maxlength="5" class="cmfont1"> <font color="666666">개</font>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="70" align="center">
								<figure class="snip1273">
								<img src="images/money.png" border="0" align="absmiddle" width="100%" height="100%">
								<figcaption>
								<h3>즉시 구매</h3>
								</figcaption><a href="javascript:check_form2('D')"></a>&nbsp;&nbsp;&nbsp;
								</figure>
								<figure class="snip1273">
								<img src="images/cart.png"  border="0" align="absmiddle" width="100%" height="100%">
								<figcaption>
								<h3>장바구니 담기</h3>
								</figcaption><a href="javascript:check_form2('C')"></a>&nbsp;&nbsp;&nbsp;
								</figure>
								</td>
							</tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="30" align="center">
									<img src="images/product_text1.gif" border="0" align="absmiddle">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->

			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr><td height="22"></td></tr>
			</table>

			<!-- 상세설명 -->
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td height="30" align="center">
						<img src="images/detail_view.png" width="100%" height="30" border="0">
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size:9pt">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="200" valign=top style="line-height:14pt">
						
						<br>
						<br>
						<center>
						<img src="product/<?=$row[image310]?>" width="570"><br><br><br>
						</center>
					</td>
				</tr>
			</table>

			<!-- 교환배송정보 -->
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td align="center" class="cmfont"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>