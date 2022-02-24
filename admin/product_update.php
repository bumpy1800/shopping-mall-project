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
	$imagename1 = $_REQUEST[imagename1];
	$imagename2 = $_REQUEST[imagename2];
	$imagename3 = $_REQUEST[imagename3];
	$sel1=$_REQUEST[sel1];
	$sel2=$_REQUEST[sel2];
	$sel3=$_REQUEST[sel3];
	$sel4=$_REQUEST[sel4];
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];
	$no=$_REQUEST[no];
	$checkno1=$_REQUEST[checkno1];
	$checkno2=$_REQUEST[checkno2];
	$checkno3=$_REQUEST[checkno3];

	$contents=addslashes($contents);
	$name=addslashes($name);

	$regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);
	
	$fname1=$imagename1;
	if ($checkno1=="1") $fname1="";
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
	$fname2=$imagename2;
	if ($checkno2=="1") $fname2="";
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
	$fname3=$imagename3;
	if ($checkno3=="1") $fname3="";
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

	$query = "update product set menu10='$menu',
				code10='$code', name10='$name', coname10='$coname', price10='$price', opt110='$opt1', opt210='$opt2', contents10='$contents', status10='$status', icon_new10='$icon_new', icon_hit10='$icon_hit', icon_sale10='$icon_sale', discount10='$discount', regday10='$regday', image110='$fname1', image210='$fname2', image310='$fname3'
				where no10=$no;";	// sql 정의
	$result = mysqli_query($db,$query);					// sql 실행
	if (!$result) exit("에러 : $query");						// 에러조사

	echo("<script>location.href = 'product.php?no=$no&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>