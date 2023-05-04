<?php 
 include '../admin/classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUser = $_POST['adminUser']; 
    $adminPass = md5($_POST['adminPass']);

    $login_check = $class ->login_admin($adminUser,$adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">
<head runat="server">
	<meta charset="utf-8" />
	<title>FreshFood Administrator</title>
	<link href="../admin/images/logo/favicon.ico" rel="shortcut icon" />
	<link href="Content/bootstrap.css" rel="stylesheet" />
	<link href="Content/font-awesome.css" rel="stylesheet" />
	<link href="Content/login-style.css" rel="stylesheet" />
	<link href="Content/util.css" rel="stylesheet" />
</head>
<body>
	<form action="login.php" method="POST">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178 p-b-40">
					<span class="login100-form-title">
						FreshFood Administrator
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input name="adminUser" class="input100" type="text" placeholder="Tài Khoản">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input name="adminPass" class="input100" type="password" placeholder="Mật Khẩu">
						<span class="focus-input100"></span>
					</div>
                    <?php
                            if(isset($login_check)){
                                echo $login_check;
                            }
                            ?>
					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Quên
						</span>

						<a href="#" class="txt2">
							tài khoản / mật khẩu?
						</a>
					</div>
					<div class="container-login100-form-btn mb-2">
                        <span class="pull-right"><input type="submit" class="login100-form-btn" value="Đăng nhập" /></span>
					</div>
				</div>
			</div>
		</div>
	</div>
		</form>
</body>
</html>