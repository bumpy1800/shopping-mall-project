	<?
	$db = mysqli_connect("localhost","shop10","1234","shop10");
	if (!$db) exit("DB연결에러");

	date_default_timezone_set("Asia/Seoul");

	$a_idname=array("전체","이름", "ID");     //  2줄은 common.php에 작성.
	$n_idname=count($a_idname);

	$a_menu=array("분류선택","CPU","MainBoard","RAM","GPU","SSD","HDD","CASE","PSU","Cooler"); // 메뉴 분류
	$n_menu=count($a_menu);	// 분류 갯수

	$admin_id  = "admin";
    $admin_pw = "1800";

	$page_line=5;			//페이지당 line 수
	$page_block=5;		//블록당 page 수

	$a_status=array("상품상태","판매중","판매중지","품절");
	$n_status=count($a_status);

	$a_sort=array("신상품순 정렬","고가격순 정렬","저가격순 정렬","상품명 정렬");
	$n_sort=count($a_sort);

	$a_icon=array("아이콘","New","Hit","Sale");
	$n_icon=count($a_icon);

	$a_text1=array("","제품이름","제품번호");   // for문의 $i는 1부터 시작
	$n_text1=count($a_text1);

	$a_state=array("전체","주문신청","주문확인","입금확인","배송중","주문완료","주문취소");
	$n_state=count($a_state);

	$a_state1=array("주문번호","제품명","고객명");
	$n_state1=count($a_state1);

	$a_m=array("1","2","3","4","5","6","7","8","9","10","11","12");
	$n_m=count($a_m);

	$a_d=array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
	$n_d=count($a_d);

	$baesongbi = 2500;
    $max_baesongbi = 1000000;

	$cookie_admin=$_COOKIE[cookie_admin];
	if($cookie_admin != "yes")
	echo("<script>location.href='login.html'</script>");
?>