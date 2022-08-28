<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/index.css";
    include("functions/header.php");
?>

<?php
    $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");

    $title = $_POST["title"];
    $id = $_POST["id"];
    $msg = $_POST["message"];
    $pw = $_POST["pw"];
    //$pw = password_hash($_POST["pw"], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO board(id, pw, title, message) values('$id', '$pw', '$title', '$msg')";
    

    
    if($title && $id && $msg){
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('글이 작성되었습니다.');
        location.href='index.php';</script>";
    }else{
        echo "<script>alert('글 작성에 실패했습니다.');
        history.back();</script>";
    }


    mysqli_close($conn);
?>
    
<?php
    include("functions/footer.php");
?>