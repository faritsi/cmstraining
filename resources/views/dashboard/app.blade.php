<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="generator" content="cms-phpnative">
	<meta name="robots" content="index, follow">
	<meta name="developer" content="dickydarmawan">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="Maliniart Olshop">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Maliniart Olshop" />
	<meta property="og:site_name" content="olshop maliniart" />
	<meta property="article:tag" content="online shop jakarta">
	<meta property="article:tag" content="market place jakarta">
	<meta property="article:tag" content="website jakarta">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="/images/fav.png" rel="shortcut icon" type="image/x-icon" />
    <link href="/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="/css/table.css" rel="stylesheet" type="text/css" />
	<script src="/libs/ckeditor/ckeditor.js"></script>
	<script src="/libs/ckeditor/samples/sample.js"></script>
	<link href="/libs/ckeditor/samples/sample.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-latest.min.js" ></script>
    <script  charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "iDisplayLength": 10
            } );
        } );
    </script>
     <title>@yield('title', $title)</title>
</head>
<body>
	@auth
    <div id="bgfirst">
        <div id="bofirst" class="clearfix">
			<div class="firstbackground">
				<div class="sidebar" id="sidebar">
					<div class="closebar" onclick="btntoogle();">
						<i class="fa fa-times"></i>
					</div>
					<div class="sidebarimg">
						<img src="/images/logo.png" alt="">
					</div>
					<div class="sidebartit">
						<i class="fas fa-chart-line"></i> {{ Auth::user()->name }}
					</div>
					<div class="sidebarlink" id="nav">
						<ul class="menu">
							<li><a href="{{ route('dashboard') }}" class="navlink active">Dashboard</a></li>
							<li><a href="{{ route('admin') }}" class="navlink">Admin</a></li>
						</ul>
					</div>
					<div class="sidebarview">
						<a href="https://olshop.maliniart.com" class="btnview" target="_blank">View Website</a>
					</div>	
					<div class="sidebarlogout">
						<a href="#" class="btnlogout">Logout</a>
					</div>
				</div>
				<div class="content">
					<div id="bgtop">
						<div id="botop" class="clearfix">
							<div class="tooglebar">
								<a><i class="fa fa-bars" onclick="btntoogle();"></i></a> <span>@yield('title', $title)</span>
							</div>
							<div class="avatar">
								<div class="avatarsetting">
									<i class="fa fa-cog"></i>
									<div class="dropdown-content">
									  <div class="dropdown-title">Setting Dashboard</div>
									  <a href="?m=adminsetting">Profile</a>
									  <a href="?m=logosetting">Logo</a>
									  <a href="?m=metadatasetting">Metadata</a>
									  <a href="?m=logsvisitor">Logs Visitor</a>
									</div>
								</div>
								<div class="avatarsetting">
									<div class="avatarnotif">
											<i class="fa fa-bell"></i>
									</div>	
									<div class="dropdown-content2">
									  <div class="dropdown-title2">Notification</div>
									  <a href="?m=logscontent">See All</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="bgcont">
						<div id="bocont">
							@yield('content')
						</div>
					</div>
				</div>
			</div>	
        </div>
    </div>
	@endauth
</body>
<script>
const menu = document.querySelector(".menu");

// 2. jika element dengan class menu diklik
menu.addEventListener('click', function(e) {
    // 3. maka ambil element apa yang diklik oleh user
    const targetMenu = e.target;

    // 4. lalu cek, jika element itu adalah link dengan class menu__link
    if(targetMenu.classList.contains('navlink')) {
            
        // 5. maka ambil menu link yang aktif
        const menuLinkActive = document.querySelector("ul li a.active");

        // 6. lalu cek, Jika menu link active ada dan menu yang di klik user adalah menu yang tidak sama dengan menu yang aktif, (cara cek-nya yaitu dengan membandingkan value attribute href-nya)
        if(menuLinkActive !== null && targetMenu.getAttribute('href') !== menuLinkActive.getAttribute('href')) {

            // 7. maka hapus class active pada menu yang sedang aktif
            menuLinkActive.classList.remove('active');
        }

        // 8. terakhir tambahkan class active pada menu yang di klik oleh user
        targetMenu.classList.add('active');
    }
});
</script>
</html>