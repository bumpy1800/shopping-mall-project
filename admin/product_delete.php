<?
	include "common.php";
	
	$no = $_REQUEST[no];

	$query = "delete from product where no10=$no;";		// sql ����
	$result = mysqli_query($db,$query);					// sql ����
	if (!$result) exit("���� : $query");						// ��������

	echo("<script>location.href = 'product.php'</script>");
?>