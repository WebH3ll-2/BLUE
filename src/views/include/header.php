<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= URLROOT;?>/public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<title> <?= SITENAME; ?> </title>
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= URLROOT; ?>"> <?= SITENAME; ?> </a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
				<a class="nav-link nav-left-menu" aria-current="page" href="<?= URLROOT; ?>">홈</a>
			</li>
			<li class="nav-item">
				<a class="nav-link nav-left-menu" href="<?= URLROOT; ?>/about">사이트 소개</a>
			</li>
		</ul>
		<div class="navbar-nav ms-auto">
			<?php if(isset($_SESSION['user_id'])) : ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						My page
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">내 정보</a></li>
						<li><a class="dropdown-item" href="<?= URLROOT; ?>/bookmark">북마크</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="<?= URLROOT; ?>/api/users/logout">로그아웃</a></li>
					</ul>
				</li>
			<?php else : ?>
				<a class="nav-link nav-left-menu" href="<?= URLROOT; ?>/register">회원가입</a>
				<a class="nav-link nav-left-menu" href="<?= URLROOT; ?>">로그인</a>
			<?php endif; ?>
		</div>
		</div>
	</div>
	</nav>
	<!-- make nav-link active depending on the page -->
    <script>
		const navLinks = document.querySelectorAll('.nav-link.nav-left-menu');
		const currentLocation = location.href.replace(/\/$/, "");
		const menuLength = navLinks.length;
		for (let i = 0; i < menuLength; i++) {
			if (navLinks[i].href === currentLocation) {
				navLinks[i].className = "nav-link nav-left-menu active";
			}
		}
	</script>