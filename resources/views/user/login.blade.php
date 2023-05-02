<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="/css/loginpage.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/images/fav.png" rel="shortcut icon" type="image/x-icon" />
        <title><?= $title; ?></title>
    </head>
    <body>
    <div id="container">
			<div id="containerbox">
			@if(session('success'))
				<p class="alert alert-success">{{ session('success') }}</p>
			@endif
			@if($errors->any())
				@foreach($errors->all() as $err)
					<p class="alert alert-danger">{{ $err }}</p>
				@endforeach
			@endif
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
										LOGIN
									</div>
									<div class="formcoversubtitle">
										Dashboard
									</div>
									<form action="{{ route('login.action') }}" method="POST">
										@csrf
										<input name="username" type="text" class="formcoverinput" placeholder="Username" required />
										<input name="password" type="password" class="formcoverinput" placeholder="Password" required />
										<div class="formcoverbutton">
											<input type="submit" value="LOGIN" name="login" class="loginbutton">
										</div>
									</form>
								</div>
							</div>
						</div>
						<div id="copyright">
							<div class="copyrightlink">
							<a href="{{ route('register') }}" >REGISTER</a>
						</div>
						<div id="copyright">
							<div class="copyrightlink">
							<a href='https://olshop.maliniart.com/' target='_blank'>VIEW WEBSITE</a>
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