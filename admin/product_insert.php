<?
	include "common.php";
	
	$menu = $_REQUEST[menu];		// 혹은 $name = $_POST[name];
	$code = $_REQUEST[code];
	$name = $_REQUEST[name];
	$coname = $_REQUEST[coname];
	$price = $_REQUEST[price];
	$opt1 = $_REQUEST[opt1];
	$opt2 = $_REQUEST[opt2];
	$contents = $_REQUEST[contents];
	$status = $_REQUEST[status];
	$icon_new = $_REQUEST[icon_new];
	$icon_hit = $_REQUEST[icon_hit];
	$icon_sale = $_REQUEST[icon_sale];
	$discount = $_REQUEST[discount];
	$regday1 = $_REQUEST[regday1];
	$regday2 = $_REQUEST[regday2];
	$regday3 = $_REQUEST[regday3];
	$image1 = $_REQUEST[image1];
	$image2 = $_REQUEST[image2];
	$image3 = $_REQUEST[image3];

	$regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

	if (!$icon_new)   // 진혁이형한테 물어보기
	$icon_new=0;
	else
	$icon_new=1;

	if (!$icon_hit)   
	$icon_hit=0;
	else
	$icon_hit=1;

	if (!$icon_sale)   
	$icon_sale=0;
	else
	$icon_sale=1;    

	$contents=addslashes($contents);
	$name=addslashes($name);

	$fname1="";
	if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
	{
	    $fname1=$_FILES["image1"]["name"];
	    //$fsize=$_FILES["image1"]["size"];
	    //$newfname="fname1";
		
		//if (file_exists("../product/" . $fname1)) exit("동일한 파일이 있음");
	    if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
	        "../product/" . $fname1)) exit("업로드 실패");

	    //echo("파일이름 : $newfname<br> 파일크기 : $fsize");
	}
	$fname2="";
	if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
	{
	    $fname2=$_FILES["image2"]["name"];
	    //$fsize=$_FILES["image2"]["size"];
	    //$newfname="fname1";
		
		//if (file_exists("../product/" . $fname2)) exit("동일한 파일이 있음");
	    if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
	        "../product/" . $fname2)) exit("업로드 실패");

	    //echo("파일이름 : $newfname<br> 파일크기 : $fsize");
	}
	$fname3="";
	if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
	{
	    $fname3=$_FILES["image3"]["name"];
	    //$fsize=$_FILES["image3"]["size"];
	    //$newfname="fname1";
		
		//if (file_exists("../product/" . $fname3)) exit("동일한 파일이 있음");
	    if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
	        "../product/" . $fname3)) exit("업로드 실패");

	    //echo("파일이름 : $newfname<br> 파일크기 : $fsize");
	}


	$query = "insert into product (menu10, code10, name10, coname10, price10, opt110, opt210, contents10, status10, icon_new10, icon_hit10, icon_sale10, discount10,  regday10, image110, image210, image310) values ('$menu', '$code', '$name', '$coname', '$price', '$opt1', '$opt2', '$contents', '$status', '$icon_new', '$icon_hit', '$icon_sale', '$discount', '$regday', '$fname1', '$fname2', '$fname3');";		// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'product.php'</script>");
?>