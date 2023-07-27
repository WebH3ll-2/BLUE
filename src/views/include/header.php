<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=URLROOT;?>/public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>
        <?=SITENAME;?>
    </title>
</head>

<?php
    use Models\SessionModel;
    SessionModel::lazyInit();
?>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=URLROOT;?>"> <?=SITENAME;?> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-left-menu" aria-current="page" href="<?=URLROOT;?>">홈</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-left-menu" href="<?=URLROOT;?>/about">사이트 소개</a>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            My page
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">내 정보</a></li>
                            <li><a class="dropdown-item" href="<?=URLROOT;?>/bookmark">북마크</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item logout-link" href="#">로그아웃</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <a class="nav-link nav-left-menu" href="<?=URLROOT;?>/register">회원가입</a>
                    <a class="nav-link nav-left-menu" href="<?=URLROOT;?>">로그인</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </nav>

    <script src="<?=URLROOT;?>/js/active_nav.js"></script>
    <script>
    const logoutBtn = document.querySelector('.logout-link');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', () => {
            fetch('<?=URLROOT;?>/api/users/logout', {
                    method: 'POST',
                })
                .then(res => res.json())
                .then(data => {
                    document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

                    if (data.status === 'success') {
                        location.reload();
                    }
                })
                .catch(err => console.log(err));
        });
    }
    </script>