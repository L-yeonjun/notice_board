<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/update.css";
    include("functions/header.php");
?>

    <?php
        $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");
        $num = $_GET['num'];
        $sql = "SELECT * FROM board WHERE num = $num";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    
    ?>

    <h1>글수정</h1>

    <?php
    if(!isset($_SESSION['id'])){ ?>
        <script>
            alert("권한이 없습니다.");
            history.back();
        </script>
<?php } 
    else if($_SESSION['id'] == $row['id']){ ?>
        
    <form action="update_ok.php?num=<?=$row['num'];?>" method = "post">
        <table id="update_area">
            <tr>
                <td>제목</td>
                <td><input type="text" name="title" size=60 value="<?= $row['title']; ?>"></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><input type="hidden" name="id" value="<?=$_SESSION['id']?>"><?=$_SESSION['id']?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea type="text" name="message" rows=20 cols=80><?= $row['message']; ?></textarea></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="text" name="pw"></td>
            </tr>
        </table>

        <div id="btn">
            <button type="submit">수정</button>
        </div>
    </form>

    <?php } 
    else { ?>
        <script>
            alert("권한이 없습니다.");
            history.back();
        </script>

    <?php } ?>
    

<?php
    include("functions/footer.php");
?>