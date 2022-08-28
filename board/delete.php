<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/index.css";
    include("functions/header.php");
?>

<?php
    $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");
    $num = $_GET["num"];
    $sql = "SELECT * FROM board WHERE num = $num";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>

    <?php
    if(!isset($_SESSION['id'])){ ?>
        <script>
            alert("권한이 없습니다.");
            history.back();
        </script>
<?php }
    else if($_SESSION['id'] == $row['id']){
        $sql = "DELETE FROM board WHERE num = $num";
        $result = mysqli_query($conn, $sql);
        
        ?>
        <script>
            alert("글이 삭제되었습니다.");
            location.replace("index.php");
        </script>

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