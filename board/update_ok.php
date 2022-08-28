<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/index.css";
    include("functions/header.php");
?>
    
<?php

    $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");

    $num = $_GET["num"];
    $title = $_POST["title"];
    $id = $_POST["id"];
    $msg = $_POST["message"];
    $pw = $_POST["pw"];
    //$user_pw = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "UPDATE board SET id = '$id', message = '$msg', title = '$title', pw = '$pw' WHERE num = $num";
    $result = mysqli_query($conn, $sql);

    if($result){ ?>
        <script>
            alert("글이 수정되었습니다.");
            location.replace("view.php?num=<?php echo $num;?>");
        </script>
    <?php }
    else{ ?>
        <script>
            alert('글 수정에 실패했습니다.');
            history.back();
        </script>
    <?php } ?>

<?php
    mysqli_close($conn);
?>

<?php
    include("functions/footer.php");
?>