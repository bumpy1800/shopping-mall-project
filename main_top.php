<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	$cookie_no=$_COOKIE[cookie_no];
	$cookie_name=$_COOKIE[cookie_name];

?>
<!DOCTYPE html>
<html lang="ko">
<head>
<link rel="shortcut icon" type="image⁄x-icon" href="images/logo.png">

<!----
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	---->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<title>Bumpy Shop</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="startbootstrap-shop-homepage-gh-pages/startbootstrap-shop-homepage-gh-pages/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="startbootstrap-shop-homepage-gh-pages/startbootstrap-shop-homepage-gh-pages/css/shop-homepage.css" rel="stylesheet">
  <link href="startbootstrap-shop-homepage-gh-pages/startbootstrap-shop-homepage-gh-pages/css/simple-sidebar.css" rel="stylesheet">

<script src="startbootstrap-shop-homepage-gh-pages/startbootstrap-shop-homepage-gh-pages/vendor/jquery/jquery.js"></script>
<script src="startbootstrap-shop-homepage-gh-pages/startbootstrap-shop-homepage-gh-pages/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="startbootstrap-shop-homepage-gh-pages/startbootstrap-shop-homepage-gh-pages/vendor/bootstrap/js/bootstrap.js"></script>
<script language="Javascript" src="include/common.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
 <style>

 

body {

    /*overflow-x: hidden;*/
	

}
 

#page-content-wrapper {

    padding-left: 0;

    -webkit-transition: all 0.5s ease;

    -moz-transition: all 0.5s ease;

    -o-transition: all 0.5s ease;

    transition: all 0.5s ease;

}

 

 

 

/*Sidebar*/

 

#sidebar-wrapper{

  z-index:1;

  position: absolute;

  width: 0;

  height: 100%;

  overflow-y:hidden;

  background:#efefef;

  border: 2px solid red;

  opacity: 0.9;

  -webkit-transition: all 0.5s ease;

  -moz-transition: all 0.5s ease;

  -o-transition: all 0.5s ease;

  transition: all 0.5s ease;

}

 

/*Main Content*/

#page-content-wrapper{

  width: 100%;

  position: absolute;

  padding: 15px;

  border: 5px solid green;

}

 

/*Chang the width of the sidebar to display it */

#wrapper.menuDisplayed #sidebar-wrapper{

  width: 250px;

}

 

/**/

#wrapper.menuDisplayed #page-content-wrapper{

  padding-left:250px;

}

 

/*sider styling*/

.sidebar-nav{

  padding: 0;

  list-style:none;

}

 

.sidebar-nav li{

  text-indent:20px;

  line-height: 60px;

 

}

 

.sidebar-nav li a{

  display: block;

  text-decoration: none;

  color:#585858;

}

 

.sidebar-nav li a:hover{

  background:#FFFFFF;

 

}
.sample_image  img {
    -webkit-transform:scale(1);
    -moz-transform:scale(1);
    -ms-transform:scale(1); 
    -o-transform:scale(1);  
    transform:scale(1);
    -webkit-transition:.3s;
    -moz-transition:.3s;
    -ms-transition:.3s;
    -o-transition:.3s;
    transition:.3s;
}
.sample_image:hover img {
    -webkit-transform:scale(1.1);
    -moz-transform:scale(1.1);
    -ms-transform:scale(1.1);   
    -o-transform:scale(1.1);
    transform:scale(1.1);
}
@import url(https://fonts.googleapis.com/css?family=Raleway:400,500,700);
.snip1273 {
  font-family: 'Raleway', Arial, sans-serif;
  position: relative;
  margin: 10px;
  min-width: 50px ;
  max-width: 200px;
  min-height: 50px ;
  max-height: 200px;
  width: 100%;
  height: 20%;
  color: #ffffff;
  text-align: top;
  background-color: #000000;
  font-size: 16px;
}
.snip1273 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}
.snip1273 img {
  position: relative;
  max-width: 100%;
  vertical-align: top;
}
.snip1273 figcaption {
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  padding: 20px 30px;
}
.snip1273 figcaption:before,
.snip1273 figcaption:after {
  width: 1px;
  height: 0;
}
.snip1273 figcaption:before {
  right: 0;
  top: 0;
}
.snip1273 figcaption:after {
  left: 0;
  bottom: 0;
}
.snip1273 h3,
.snip1273 p {
  line-height: 1.5em;
}
.snip1273 h3 {
  margin: 0 0 5px;
  font-weight: 700;
  text-transform: uppercase;
}
.snip1273 p {
  font-size: 0.8em;
  font-weight: 500;
  margin: 0 0 15px;
}
.snip1273 a {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  z-index: 1;
}
.snip1273:before,
.snip1273:after,
.snip1273 figcaption:before,
.snip1273 figcaption:after {
  position: absolute;
  content: '';
  background-color: #ffffff;
  z-index: 1;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
  opacity: 0.8;
}
.snip1273:before,
.snip1273:after {
  height: 1px;
  width: 0%;
}
.snip1273:before {
  top: 0;
  left: 0;
}
.snip1273:after {
  bottom: 0;
  right: 0;
}
.snip1273:hover img,
.snip1273.hover img {
  opacity: 0.4;
}
.snip1273:hover figcaption,
.snip1273.hover figcaption {
  opacity: 1;
}
.snip1273:hover figcaption:before,
.snip1273.hover figcaption:before,
.snip1273:hover figcaption:after,
.snip1273.hover figcaption:after {
  height: 100%;
}
.snip1273:hover:before,
.snip1273.hover:before,
.snip1273:hover:after,
.snip1273.hover:after {
  width: 100%;
}
.snip1273:hover:before,
.snip1273.hover:before,
.snip1273:hover:after,
.snip1273.hover:after,
.snip1273:hover figcaption:before,
.snip1273.hover figcaption:before,
.snip1273:hover figcaption:after,
.snip1273.hover figcaption:after {
  opacity: 0.1;
}

@import url(https://fonts.googleapis.com/css?family=Raleway:300,700);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
figure.snip1384 {
  font-family: 'Raleway', Arial, sans-serif;
  position: relative;
  overflow: hidden;
  margin: 1px;
  min-width: 100px;
  max-width: 210px;
  width: 100%;
  color: #ffffff;
  text-align: left;
  font-size: 16px;
  background-color: #000000;
}
figure.snip1384 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}
figure.snip1384 img {
  max-width: 100%;
  backface-visibility: hidden;
  vertical-align: top;
}
figure.snip1384:after,
figure.snip1384 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
figure.snip1384:after {
  content: '';
  background-color: rgba(0, 0, 0, 0.65);
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
  opacity: 0;
}
figure.snip1384 figcaption {
  z-index: 1;
  padding: 40px;
}
figure.snip1384 h3,
figure.snip1384 .links {
  width: 100%;
  margin: 5px 0;
  padding: 0;
}
figure.snip1384 h3 {
  line-height: 1.1em;
  font-weight: 700;
  font-size: 1.4em;
  text-transform: uppercase;
  opacity: 0;
}
figure.snip1384 p {
  font-size: 0.8em;
  font-weight: 300;
  letter-spacing: 1px;
  opacity: 0;
  top: 50%;
  -webkit-transform: translateY(40px);
  transform: translateY(40px);
}
figure.snip1384 i {
  position: absolute;
  bottom: 10px;
  right: 10px;
  padding: 20px 25px;
  font-size: 34px;
  opacity: 0;
  -webkit-transform: translateX(-10px);
  transform: translateX(-10px);
}
figure.snip1384 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}
figure.snip1384:hover img,
figure.snip1384.hover img {
  zoom: 1;
  filter: alpha(opacity=50);
  -webkit-opacity: 0.5;
  opacity: 0.5;
}
figure.snip1384:hover:after,
figure.snip1384.hover:after {
  opacity: 1;
  position: absolute;
  top: 10px;
  bottom: 10px;
  left: 10px;
  right: 10px;
}
figure.snip1384:hover h3,
figure.snip1384.hover h3,
figure.snip1384:hover p,
figure.snip1384.hover p,
figure.snip1384:hover i,
figure.snip1384.hover i {
  -webkit-transform: translate(0px, 0px);
  transform: translate(0px, 0px);
  opacity: 1;
}

 

    </style>
</head>
<body>

  <div id="wrapper">

<!--sidebar-->

  <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
	<br>
<div id="top"></div>
            <li><a class="dropdown-item" href="product.php?menu=1"><font size="5%">CPU</font></a></li>
            <li><a class="dropdown-item" href="product.php?menu=2"><font size="5%">MainBoard</font></a></li>
            <li><a class="dropdown-item" href="product.php?menu=3"><font size="5%">RAM</font></a></li>
			<li><a class="dropdown-item" href="product.php?menu=4"><font size="5%">GPU</font></a></li>
            <li><a class="dropdown-item" href="product.php?menu=5"><font size="5%">SSD</font></a></li>
            <li><a class="dropdown-item" href="product.php?menu=6"><font size="5%">HDD</font></a></li>
			<li><a class="dropdown-item" href="product.php?menu=7"><font size="5%">CASE</font></a></li>
            <li><a class="dropdown-item" href="product.php?menu=8"><font size="5%">PSU</font></a></li>
            <li><a class="dropdown-item" href="product.php?menu=9"><font size="5%">COOLER</font></a></li>

    </ul>

  </div>

 

<!--page content-->

  </div>
<center>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
	<ul class="navbar-nav ml-auto mt-auto mt-lg-0">

		<input type="button" style="margin:auto;width:90px;height:40px;font-size:15px;" class="btn btn-primary btn-sm" id="menu-toggle" value="카테고리">

	  <li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<font color="FFFFFF" size="3%"> 고객문의 </font>
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		  <br>	  
			<a class="dropdown-item" href="faq.php"><font size="2%">자주찾는질문</font></a><br>
			<a class="dropdown-item" href="qa.php"><font size="2%">문의 게시판</font></a><br>	
      </li>
	</ul>



      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html"><font size="3%">Home</font>
              <span class="sr-only">(current)</span>
            </a>
          </li>
		  <?
		  	if(!$cookie_no)
			{
			  echo("<li class='nav-item'>
				<a class='nav-link' href='member_login.php'><font size='3%'>Login</font></a>
			  </li>");
			  echo("<li class='nav-item'>
				<a class='nav-link' href='member_agree.php'><font size='3%'>Sign up</font></a>
			  </li>");
			}
			else
			{
			  echo("<li class='nav-item'>
				<a class='nav-link' href='member_logout.php'><font size='3%'>Logout</font></a>
			  </li>");
			  echo("<li class='nav-item'>
				<a class='nav-link' href='member_edit.php'><font size='3%'>Modified</font></a>
			  </li>");
			}
		  ?>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><font size="3%">Cart</font></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jumun_login.php"><font size="3%">Jumun</font></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td><a href="index.html"><img src="images/top_logo.gif" width="182" height="30" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="bottom"> -------------------------------------------->
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="index.html"><img src="images/top_menu01.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<?
					if(!$cookie_no)
					{
						echo("<td><a href='member_login.php'><img src='images/top_menu02.gif' border='0'></a></td>
						<td><img src='images/top_menu_line.gif' width='11'></td>
						<td><a href='member_agree.php'><img src='images/top_menu03.gif' border='0'></a></td>
						<td><img src='images/top_menu_line.gif' width='11'></td>");
					}
					else
					{
						echo("<td><a href='member_logout.php'><img src='images/top_menu02_1.gif' border='0'></a></td>
						<td><img src='images/top_menu_line.gif' width='11'></td>
						<td><a href='member_edit.php'><img src='images/top_menu03_1.gif' border='0'></a></td>
						<td><img src='images/top_menu_line.gif' width='11'></td>");
					}
					?>
					<td><a href="cart.php"><img src="images/top_menu05.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<td><a href="jumun_login.html"><img src="images/top_menu06.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif"width="11"></td>
					<td><img src="images/top_menu08.gif" onclick="javascript:Add_Site();" style="cursor:hand"></td>
				</tr>
			</table>
			---->
		</td>
	</tr>
</table>

<!--  메인 이미지 --------------------------------------------------->
<div class="container">
<br>
	<tr>
		<td><a href="index.html"><img src="images/banner5.jpg" width="97%" height="100%" border="0"></a></td>
	</tr>
</div>
<br><br>
<!--  Category 메뉴 : 가로형인 경우  -------------------------------------->

<!-- 상품 검색 ------------------------------------->
<div class="container" >
<table width="97%" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<hr align="center" style="width: 95%;">
	<tr bgcolor="#FFFFFF">
		<td width="181" align="center"><font color="#666666">&nbsp <b>
		<?
				if(!$cookie_no)
				{
					echo("환영합니다 고객님.");
				}
				else
				{
					echo("환영합니다 $cookie_name 님.");
				}
		?>
		</b></font></td>

		<td style="font-size:9pt;color:#666666;font-family:돋움;padding-left:5px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;font-family:돋움;"><b>상품검색 ▶&nbsp</b></td>
		<!-- form1 시작 -->
		<form name="form1" method="post" action="product_search.php">
		<td width="135">
			 <input class="form-control" type="text" name="findtext" placeholder="Search">
		</td>
		</form>
		<!-- form1 끝 -->
		<td width="65" align="center"><a href="javascript:Search()"><img src="images/search.png" border="0"></a></td>
	</tr>
	<tr></tr>
</table><hr align="center" style="width: 95%;">
</div>
<div class="container" >
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 세로인 경우 
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr><td height="3"  bgcolor="#bfbfbf"></td></tr>
							<tr><td height="30" bgcolor="#f0f0f0" align="center" style="font-size:12pt;color:#333333"><b>Category</b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=1"><img src="images/main_menu01_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=2"><img src="images/main_menu02_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=3"><img src="images/main_menu03_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=4"><img src="images/main_menu04_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=5"><img src="images/main_menu05_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=6"><img src="images/main_menu06_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=7"><img src="images/main_menu07_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=8"><img src="images/main_menu08_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=9"><img src="images/main_menu09_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=10"><img src="images/main_menu10_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				------------------------------------------------------------------------>
				<tr><td height="10"></td></tr>
				<tr> 
					<td> 
						<!--  Custom Service 메뉴(QA, FAQ...) -->
						<!-- 
						<table width="100%"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr><td height="3"  bgcolor="#a0a0a0"></td></tr>
							<tr><td height="25" bgcolor="#f0f0f0" align="center" style="font-size:11pt;color:#333333"><b>Customer Service</b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="qa.html"><img src="images/main_left_qa.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="faq.html"><img src="images/main_left_faq.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			-->
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
		</td>
		<div class="container">
		<td width="10"></td>
		<td valign="top">