<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/view.css";
    include("functions/header.php");
?>

    <h1>게시판</h1>

    <?php
        $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");

        // msg_board 테이블 에서 글 조회
        $num = $_GET['num'];
        $hit = "UPDATE board SET hit = hit+1 WHERE num = $num";
        $result = mysqli_query($conn, $hit);

        $sql = "SELECT * FROM board WHERE num = $num";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>
    
    
        <div class="head">
            <h2><?php echo $row['title']; ?></h2><br>
            <p><?php echo $row['id']; ?><br> <?php echo date("Y-m-d H:i", strtotime($row['date'])); ?>&nbsp&nbsp&nbsp조회: <?php echo $row['hit']; ?></p>
        </div>
        <div class="body">
            <?php echo("$row[message]"); ?>
        </div>
    

    <div class="list">
        <ul>
            <li><a href="index.php">[목록]</a></li>&nbsp&nbsp
            <li><a href="update.php?num=<?=$row['num'];?>">[수정]</a></li>&nbsp&nbsp
            <li><a href="delete.php?num=<?=$row['num'];?>">[삭제]</a></li>
        </ul>
    </div>
    
    <?php
        mysqli_close($conn);
    ?>
    
<?php
    include("functions/footer.php");
?>