<?
	$data=$_COOKIE[data];//번호^^제품명^^수량
	$n_data=$_COOKIE[n_data];

	$name = $_REQUEST[name];
	$num = $_REQUEST[num];

	$n_data++;
		setcookie("n_data",$n_data);
		$data[$n_data] = implode("^^", array($n_data, $name, $num));
		setcookie("data[$n_data]",$data[$n_data]);

	echo("<script>location.href='test3.php'</script>");
?>