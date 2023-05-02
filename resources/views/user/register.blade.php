<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="/css/registerpage.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/images/fav.png" rel="shortcut icon" type="image/x-icon" />
        <title><?= $title; ?></title>
    </head>
    <body>
    <div id="container">
			<div id="containerbox">
				<div id="containerbg" class="clearfix">
					<div class="contkiri">
						<div class="contkiriimg">
							<img src="/images/login2.webp" alt="">
						</div>
					</div>
					<div class="contkanan">
						<div id="form">
							<div id="formlogin">
								<div id="formcover">
									<div class="formcovertitle">
										REGISTER
									</div>
									<div class="formcoversubtitle">
										ACCOUNT
									</div>
									<form action="{{ route('register.action') }}" method="POST">
										@csrf
										<input name="name" type="text" class="formcoverinput" placeholder="Name" required />
										<input name="username" type="text" class="formcoverinput" placeholder="Username" required />
										<input name="password" type="password" class="formcoverinput" placeholder="Password" required />
										<input name="password_confirm" type="password" class="formcoverinput" placeholder="Password Confirm" required />
										<div class="formcoverbutton">
											<input type="submit" value="REGISTER" name="regis" class="loginbutton">
										</div>
									</form>
								</div>
							</div>
						</div>
						<div id="copyright">
							<div class="copyrightlink">
							<a href='/'>LOGIN</a>
						</div>
							<div class="copyrightcopy">
								&copy 2023 all right reserved
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>