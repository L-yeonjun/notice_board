<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $main_title; ?></title>
    <link rel="stylesheet" href="<?= $style ?>">
    <script src="script/jquery.js"></script>
    <script src="script/AP.js"></script>
    
    <script>
        function checkid(){
            window.open("checkid.php?id=" + document.idcheck.id.value,"ID-check","left=700,top=300,width=300,height=100")
        }
    </script>

</head>

    <body>
        <div class="wrap">

            <div id="login">
            <?php
            session_start();
            if(isset($_SESSION['id'])){?>
                <p><?php echo $_SESSION['id'];?> 님 안녕하세요</p>
                <button class="out" onclick="location.href='check.php?mode=logout'">로그아웃</button>
            <?php
            }
            else{
                ?>
                <!-- <form action="login.php" method="get">
                    <button type="submit">로그인</button>
                </form> -->
                <button class="member" onclick="location.href='member.php'">회원가입</button>
                <button class="in" onclick="location.href='login.php'">로그인</button>
            <?php
            }?>
            </div>
            
        <header>
            <div><a href="#"><img src="images/logo.png" alt="로고"></a></div>
            <nav>
                <ul>
                    <li class="main">
                        <a href="#">소개</a>
                        <ul class="sub">
                            <li><a href="#">배경</a></li>
                            <li><a href="#">기획의도</a></li>
                            <li><a href="#">제품소개</a></li>
                            <li><a href="#">팀원소개</a></li>
                        </ul>
                    </li>

                    <li class="main">
                        <a href="#">제품사용법</a>
                        <ul class="sub">
                            <li><a href="#">하드웨어</a></li>
                            <li><a href="#">소프트웨어</a></li>
                            <li><a href="#">휴대폰 어플</a></li>
                            <li><a href="#">　</a></li>
                        </ul>
                    </li>

                    <li class="main">
                        <a href="#">자료실</a>
                        <ul class="sub">
                            <li><a href="#">소프트웨어</a></li>
                            <li><a href="#">휴대폰어플</a></li>
                            <li><a href="#">제품사진</a></li>
                            <li><a href="#">　</a></li>
                        </ul>
                    </li>

                    <li class="main">
                        <a href="#">고객서비스</a>
                        <ul class="sub">
                            <li><a href="index.php">상담문의</a></li>
                            <li><a href="#">AS 유지보수</a></li>
                            <li><a href="#">공지사항</a></li>
                            <li><a href="#">　</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>