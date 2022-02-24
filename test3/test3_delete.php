<?	

	$data=$_COOKIE[data];//번호^^제품명^^수량
	$n_data=$_COOKIE[n_data];
	
	$no = $_REQUEST[no];
	$name = $_REQUEST[name];
	$num = $_REQUEST[num];

	setcookie("data[$no]","");

	echo("<script>location.href='test3.php'</script>");
?>