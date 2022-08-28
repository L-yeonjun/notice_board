<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID-check</title>
</head>

<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");
    $id = $_GET['id'];
    $sql = "SELECT * FROM member WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if(!$id){
        echo "<p>아이디를 입력해주세요.</p>
        <center><input type=button value=창닫기 onclick='self.close()'></center>";
    }
    else {
        if(!isset($row['id'])){
            echo "<p>사용가능한 아이디 입니다.</p>
            <center><input type=button value=창닫기 onclick='self.close()>'</center>";
        }
        else {
            echo "<p>이미 존재하는 아이디 입니다.</p>
            <center><input type=button value=창닫기 onclick='self.close()>'</center>";
        }
    }
?>

</html>