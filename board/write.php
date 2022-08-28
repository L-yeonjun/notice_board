<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/update.css";
    include("functions/header.php");
?>

<?php

    //session_start();

    if(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("로그인이 필요합니다.");
            location.replace("<?php echo 'login.php' ?>")
        </script>
    <?php } 
    ?>

    <h1>글쓰기</h1>
    <form action="write_ok.php" method = "post">
        <table id="wirte_area">
            <tr>
                <td>제목</td>
                <td><input type="text" name="title" size=60></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><input type="hidden" name="id" value="<?=$_SESSION['id']?>"><?=$_SESSION['id']?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea type="text" name="message" rows=20 cols=80></textarea></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="text" name="pw"></td>
            </tr>
        </table>

        <div id="btn">
            <button type="submit">작성</button>
        </div>
    </form>

<?php
    include("functions/footer.php");
?>