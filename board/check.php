<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/index.css";
    include("functions/header.php");
?>

<?php
    $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");

    switch ($_GET['mode']){

        // 회원가입
        case 'idcheck':
            $id = $_POST['id'];
            $pw1 = $_POST['pw1'];
            $pw2 = $_POST['pw2'];
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            
            if($pw1 == $pw2){
                $sql = "INSERT INTO member(id, pw, name, sex, email, phone) VALUES('$id', '$pw1', '$name', '$sex', '$email', '$phone')";
                $result = mysqli_query($conn, $sql);

                // num 초기화
                $sql_auto_1 = "ALTER TABLE member auto_increment = 1";
                $result = mysqli_query($conn, $sql_auto_1);
                $sql_auto_2 = "set @count = 0";
                $result = mysqli_query($conn, $sql_auto_2);
                $sql_auto_3 = "UPDATE member SET num = @count:=@count + 1";
                $result = mysqli_query($conn, $sql_auto_3);
                
            ?>
                <script>
                    alert("가입 되었습니다.");
                    location.replace("login.php");
                </script>
            <?php
            }
            else{
            ?>
            <script>
                alert("비밀번호가 일치하지 않습니다.");
                history.back();
            </script>
            <?php    
            }
            
            break;

        // 로그인
        case 'login':
            $id = $_POST['id'];
            $pw = $_POST['pw'];
            $sql = "SELECT * FROM member WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if(!$id){ ?>
                <script>
                    alert("아이디를 입력해주세요.");
                    history.back();
                </script>
            <?php }
            else if($id != $row['id']){ ?>
                <script>
                    alert("존재하지 않는 아이디 입니다.");
                    history.back();
                </script>
            <?php }
            else if(!$pw){?>
                <script>
                    alert("비밀번호를 입력해주세요.");
                    history.back();
                </script>
            <?php }
            else if($pw != $row['pw']){ ?>
                <script>
                    alert("비밀번호가 일치하지 않습니다.");
                    history.back();
                </script>
            <?php } 
            else{ 
                $_SESSION['id'] = $row['id'];
            ?>
                <script>
                    alert("로그인 되었습니다.");
                    location.replace("index.php");
                </script>
            <?php }
            
            break;

        // 로그아웃
        case 'logout':
            session_unset();
            ?>
            <script>
                alert("로그아웃 되었습니다.");
                location.replace("index.php");
            </script>
            <?php

            break;
    }
?>

<?php

include("functions/footer.php");

?>