<?
	include "common.php";

	$cart = $_COOKIE[cart]; // 상품에 대한 정보
	$n_cart = $_COOKIE[n_cart]; // 상품의 종류의 수

	$kind = $_REQUEST[kind];
	$pos = $_REQUEST[pos];
	$no = $_REQUEST[no];
	$num = $_REQUEST[num];
	$opts1 = $_REQUEST[opts1];
	$opts2 = $_REQUEST[opts2];

	if (!$n_cart) $n_cart=0;   // 제품개수 0으로 초기화

	switch ($kind)
	{
		case "insert":      // 장바구니 담기
			$n_cart++;
			setcookie("n_cart",$n_cart);
			$cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
			setcookie("cart[$n_cart]",$cart[$n_cart]);
			break;
	    case "order":      // 바로 구매하기
			$n_cart++;
			setcookie("n_cart",$n_cart);
			$cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
			setcookie("cart[$n_cart]",$cart[$n_cart]);
	        break;
	    case "delete":      // 제품삭제
		    setcookie("cart[$pos]","");
	        break;
	    case "update":     // 수량 수정
	        //$pos번째 제품번호, 옵션값들 알아내기.
			list($no, $num, $opts1, $opts2)=explode("^", $cart[$pos]);
	        //이전 값에 새 수량으로 제품정보 합치기.
			$num = $_REQUEST[num];
			$cart[$pos] = implode("^", array($no, $num, $opts1, $opts2));
	        //$pos번째에 제품정보 저장.
			setcookie("cart[$pos]",$cart[$pos]);
	        break;
	    case "deleteall":    // 장바구니 전체 비우기
	        for($i=1;$i<=$n_cart;$i++)
	        {
				if($cart[$i])
					setcookie("cart[$i]",""); 
			}
	        $n_cart = 0;
			setcookie("n_cart","0"); 
			break;
	}

	if ($kind=="order")
	    echo("<script>location.href='order.php'</script>");
	else
	    echo("<script>location.href='cart.php'</script>");
?>