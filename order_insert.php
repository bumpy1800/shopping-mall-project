<?
	include "common.php";

	$cookie_no = $_COOKIE[cookie_no];
	$cart = $_COOKIE[cart];
	$n_cart = $_COOKIE[n_cart];

	//$o_no=$_REQUEST[o_no];
	$o_name=$_REQUEST[o_name];
	$o_zip=$_REQUEST[o_zip];
	$o_addr=$_REQUEST[o_addr];
	$o_tel=$_REQUEST[o_tel];
	$o_phone=$_REQUEST[o_phone];
	$o_email=$_REQUEST[o_email];
	$o_etc=$_REQUEST[o_etc];

	//$r_no=$_REQUEST[r_no];
	$r_name=$_REQUEST[r_name];
	$r_zip=$_REQUEST[r_zip];
	$r_addr=$_REQUEST[r_addr];
	$r_tel=$_REQUEST[r_tel];
	$r_phone=$_REQUEST[r_phone];
	$r_email=$_REQUEST[r_email];

	$pay_method=$_REQUEST[pay_method];
	$card_okno=$_REQUEST[card_okno];
	$card_halbu=$_REQUEST[card_halbu];
	$card_kind=$_REQUEST[card_kind];
	$bank_kind=$_REQUEST[bank_kind];
	$bank_sender=$_REQUEST[bank_sender];
	//$total_cash=$_REQUEST[total_cash];

	if($pay_method==1)
		$card_halbu=0;	

	$query = "select no10 from jumun where jumunday10=curdate() order by no10 desc";
		$result = mysqli_query($db,$query);					// sql 실행
		if (!$result) exit("에러 : $query");						// 에러조사
		$count=mysqli_num_rows($result);           // 출력할 제품 개수
		$row = mysqli_fetch_array($result);	// 1레코드 읽기
		
		if($count > 0)
			$jumun_no = date("ymd").sprintf("%04d",substr($row[no10],-4)+1);
		else
			$jumun_no = date("ymd")."0001";

		$total = 0;
		$product_nums = 0;
		$product_names = "";

		for($i=1; $i<=$n_cart; $i++)
		{
			if($cart[$i])
			{

				list($product_no, $num, $opts1, $opts2)=explode("^", $cart[$i]);

				$query = "select * from product where no10=$product_no;";
				$result = mysqli_query($db,$query);					// sql 실행
				if (!$result) exit("에러 : $query");						// 에러조사
				$count=mysqli_num_rows($result);           // 출력할 제품 개수
				$row = mysqli_fetch_array($result);	// 1레코드 읽기

				if($row[icon_sale10]==1)
					$price1=(round($row[price10]*(100-$row[discount10])/100, -1));
				else
					$price1=$row[price10];

				$total_price=$num*$price1;

				$query = "insert into jumuns (jumun_no10, product_no10, num10, price10, cash10, discount10, opts_no110, opts_no210)
					values ('$jumun_no', '$product_no', '$num', '$price1', '$total_price', '$row[discount10]', '$opts1', '$opts2');";		// sql 정의
				$result = mysqli_query($db,$query);					// sql 실행
				if (!$result) exit("에러 : $query");						// 에러조사

				setcookie("cart[$i]","");

				$total = $total + $total_price;

				$product_nums = $product_nums + 1;
				if($product_nums==1)
					$product_names = $row[name10];
			}
		}

		if($product_nums > 1) // 제품수가 2개 이상인 경우만, "외 ?" 추가
		{
			$tmp = $product_nums-1;
			$product_names = $product_names. " 외 " . $tmp;
		}

		if($total < $max_baesongbi)		// 배송비가 있는 경우
		{
			$query = "insert into jumuns (jumun_no10, product_no10, num10, price10, cash10, discount10, opts_no110, opts_no210)
					values ('$jumun_no', '0', '1', '$baesongbi', '$baesongbi', '0', '0', '0');";		// sql 정의
				$result = mysqli_query($db,$query);					// sql 실행
				if (!$result) exit("에러 : $query");						// 에러조사
			$total=$total+$baesongbi;
		}

		// 주문자가 회원인지 비회원인지 조사
		if($cookie_no)
			$member_no=$cookie_no;
		else
			$member_no=0;

		$day1=date("Y");
		$day2=date("m");
		$day3=date("d");
		$day=$day1."-".$day2."-".$day3;
		
		$query = "insert into jumun (no10, member_no10, jumunday10, product_names10, product_nums10, o_name10, o_tel10, o_phone10, o_email10, o_zip10, o_juso10, r_name10, r_tel10, r_phone10, r_email10, r_zip10, r_juso10, memo10, pay_method10, card_okno10, card_halbu10, card_kind10, bank_kind10, bank_sender10, total_cash10, state10)
					values ('$jumun_no', '$member_no', '$day', '$product_names', '$product_nums', '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_addr', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_addr', '$o_etc', '$pay_method', '$jumun_no', '$card_halbu', '$card_kind', '$bank_kind', '$bank_sender', '$total', '1');";		// sql 정의
				$result = mysqli_query($db,$query);					// sql 실행
				if (!$result) exit("에러 : $query");	
	
	echo("<script>location.href = 'order_ok.php'</script>");
?>