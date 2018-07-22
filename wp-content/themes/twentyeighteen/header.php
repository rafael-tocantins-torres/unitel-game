

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/html5shiv.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.svg"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>	
		<?php wp_head(); ?>
	</head>
	
	<body>


	<div class="preload">
		<img id="preload-img" class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
	</div>

	<div class="search-page">
		<div class="close-btn-rft"><i class="fa fa-times"></i></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-xs-12 col-sm-12">
					<div class="wrap wrap-rft">
						<p class="form-title">
							Search</p>
						<form action="search" method="GET" class="search">
						<input type="text" placeholder="Search" name="search"/>
						<input type="submit" value="search" class="btn btn-success btn-sm" />
						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

		$url = $_SERVER['REQUEST_URI'];
					
		$split_url = explode('/', $url);
		$slug = $split_url[1];

	?>

	<div id="wrapper">
        <div class="overlay"></div>
	
		
		

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand" style="">
					<div class="top-nav-header">
						<div class="container">
						<h5>PORTAL DE <strong>JOGOS</strong></h5>
						</div>
					</div>
					<div class="profile-rft">
						<div class="container">
							<div class="row">
								<div class="col-5 col-xs-5 col-sm-5">
									<i class="fa fa-user-circle"></i>
								</div>
								<div class="col-7 col-xs-7 col-sm-7 ml-extra">
									<p style="margin:0;font-size:14px;margin-top:1.5em;color:#FF5F00;" class="rft-msisdn">999 999 999</p>
									<div style="margin-top:-2em;font-size:14px;color:#5C0F8B;" class="rft-fb-connect">Connect to Facebook</div>
								</div>
							</div>
						</div>
					</div>
                </li>
                <li>
                    <a href="#">MEU PERFIL <i class="fa fa-chevron-right"></i></a>
                </li>
                <li>
				<a href="#"><i class="fa fa-th"></i><img class="nav-logo-rft" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>"></a>
				</li>
					<div class="nav-submenu-one-rft">
						<div class="first-menu-title text-center">
							<h5><strong>MINHA GAMEBOX</strong></h5>
						</div>
						<li>
							<a href="#"><i class="fa fa-download"></i><h5><strong class="rft-ml">MEUS APLICATIVOS</strong></h5></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-users"></i><h5><strong class="rft-ml">APPS DOS MEUS AMIGOS</strong></h5></a>
						</li>
					</div>
				
				<!-- DROPDOWN SE FOR NECESSÁRIO -->
				<!--
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
				</li>
				-->
				<div class="nav-submenu-two-rft">
					<div class="first-menu-title text-center">
						<h5><strong>SERVIÇO GAMEBOX</strong></h5>
					</div>
					<li>
						<a href="#"><i class="fa fa-question-circle"></i><h5><strong class="rft-ml">APPS DOS MEUS AMIGOS</h5></strong></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-heart"></i><h5><strong class="rft-ml">SOBRE</h5></strong></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-file"></i><h5><strong class="rft-ml">TERMOS & CONDIÇÕES</h5></strong></a>
					</li>
				</div>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

	<?php 
		

		if( $slug == 'category' || $slug == 'product' ){
	?>

	<?php		
		}else{
	?>

		        <!-- Page Content -->
				<div id="page-content-wrapper">
					<div class="container-fluid">
						<div class="row clearfix">
							<div class="col-2 col-xs-2 col-sm-2">
								<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
									<span class="hamb-top"></span>
									<span class="hamb-middle"></span>
									<span class="hamb-bottom"></span>
								</button>
							</div>
							<div class="col-7 col-xs-7 col-sm-7">
								<div class="logo">
									<img id="rft-logo" class="" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
								</div>
							</div>
							<div class="col-3 col-xs-3 col-sm-3">
								<div id="open-search" class="rft-search pull-right">
									<i style="color:#FF5F00;font-size:22px;margin-top:15px;margin-right:5px;" class="fa fa-search"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
				}
				?>
				<?php
				if($slug !== 'tutorial' && $slug != 'product' && $slug !== 'category'){
				?>
				<!-- HEADER BOTTOM -->
				<div class="header-btm-wrapper">
					<nav class="rft-header-top">

						<?php
						
						$nav = getWPMenu('top_mid_menu');
						$menu_items = $nav->items;

						?>
						
								<ul class="rft-nav-bottom">
									<?php foreach($menu_items as $items){ ?>
									<li class="rtf-nav-li">
										<a href="<?php echo $items->url; ?>" class="rft-nav-link"><?php echo $items->attr_title; ?></a>
									</li>
									<?php } ?>		
								</ul>
						
					</nav>
				</div>
				<!-- END OF HEADER BOTTOM -->
				
				<?php
				}elseif($slug == 'category' || $slug == 'product'){
				?>

				<div class="header-ctm-wrapper">
					<nav class="rft-header-top">
						<div class="container-fluid">
							<div class="row clearfix">
								<div class="col-6 col-xs-6 col-sm-6">
									<span class="go_back"><i class="fa fa-chevron-left"></i><h5><strong>ARCADE</h5></strong></span>
								</div>
								<div class="col-6 col-xs-6 col-sm-6">
									<img class="nav-logo-rft logo-indicator pull-right" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
								</div>
							</div>
						</div>
					</nav>
				</div>		
				
				
				<?php
				}elseif($slug == "tutorial"){
				?>

				<div class="header-dtm-wrapper">
					<nav class="rft-header-top">
						<div class="container-fluid">
							<img class="center-block logo-dtm" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
						</div>
					</nav>
				</div>


				<?php
				}
				?>
