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
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/libs/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-latest.min.js" ></script>
    <script  charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="/libs/sweetalert2.min.js"></script>
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
						<i class="fas fa-chart-line"></i> Dashboard
					</div>
					<div class="sidebarlink" id="nav">
						<ul>
							<li><a href="index.php?m=dashboard">Dashboard</a></li>
							<li><a href="index.php?m=admin">Admin</a></li>
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
								<a><i class="fa fa-bars" onclick="btntoogle();"></i></a> <h1>@yield('title', $title)</h1>
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
</body>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("nav");
var btns = header.getElementsByClassName("navlink");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

function btntoogle(){
	var nav = document.getElementById("sidebar");
	nav.classList.toggle("active");
}
</script>
</html>