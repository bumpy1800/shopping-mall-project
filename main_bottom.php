		</td>
	</tr>
</table>
<br><br>
<!-- 화면 하단 부분 시작 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->
<table width="959" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

				<td><img src="images/bottom.png"></td>
											
</table>
</div>
</div>
<!-- 화면 하단 부분 끝 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->
&nbsp
</center>
<script>

  $("#menu-toggle").click(function(e) {

      e.preventDefault();
		scrollTo(0,0);
      $("#wrapper").toggleClass("menuDisplayed");

  });
      // Activate Carousel
	$("#myCarousel").Carousel();

$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);


</script>
  <div style="position: fixed; bottom: 5px; right: 5px;">
<a href="javascript:scrollTo(0,0);">TOP
<img src="images/타이틀1.bmp" title="위로 가기">
</a>
</div>
</body>
</html>