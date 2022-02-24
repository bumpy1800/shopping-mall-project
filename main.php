<?
	include "main_top.php";
	include "common.php";

	$query="select * from product where icon_new10=1 and status10=1 order by rand() limit 12";
	$result = mysqli_query($db,$query);
    if (!$result) exit("에러: $query");
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->
	<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10">
	<!-- Indicators -->
	<ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>&nbsp&nbsp
		<li data-target="#myCarousel" data-slide-to="1"></li>&nbsp&nbsp
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
          <div class="carousel-inner" role="listbox">
		  <div class="container">
            <div class="carousel-item active">
              <a href="https://event1.pping.kr/detail/688/"><img class="d-block img-fluid" width="100%" src="https://cdnimg.happyshopping.kr/img_static/img_evt/688/770.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <a href="https://event1.pping.kr/detail/717/"><img class="d-block img-fluid" width="100%" src="https://cdnimg.happyshopping.kr/img_static/img_evt/717/770.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <a href="https://event1.pping.kr/detail/729/"><img class="d-block img-fluid" width="100%" src="https://cdnimg.happyshopping.kr/img_static/img_evt/729/770.png" alt="Third slide">
            </div>
			</div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
		</div>
		</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="60">
						<img src="images/new_arrival.jpg" width="100%" height="40">
					</td>
				</tr>
			</table>		
				<!---1번째 줄-->			
					<?
						$num_col=4;   $num_row=3;                   // column수, row수
						$count=mysqli_num_rows($result);           // 출력할 제품 개수
						$icount=0;       // 출력한 제품개수 카운터
							echo("<table border='0' width='100%' cellpadding='0' cellspacing='0'>");
								for ($ir=0; $ir<$num_row; $ir++)
								{
							     echo("<tr>");
								     for ($ic=0;  $ic<$num_col;  $ic++)
								    {
								         if ($icount < $count)
								        {
								             $row=mysqli_fetch_array($result);
											 $price1=number_format($row[price10]);
								             echo("<td width='150' height='205' align='center' valign='top'>
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
									echo("<img src='images/new1.gif' align='absmiddle' vspace='1'>");
									if($row[icon_hit10] == 1)
									echo("<img src='images/hit.png' align='absmiddle' vspace='1'>");
									if($row[icon_sale10] == 1)
									echo("<img src='images/sale.png' align='absmiddle' vspace='1'><font color='red'><br>$row[discount10] %</br></font>");

							if($row[icon_sale10] == 1)
							{
								$sale_price=number_format(round($row[price10]*(100-$row[discount10])/100, -3));
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
					</tr>
				<tr><td height="10"></td></tr>
			</table>
		</div>
			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>