<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/member.css";
    include("functions/header.php");
?>



<h1>회원가입</h1>
    <form action="check.php?mode=idcheck" method = "post" name="idcheck">
        <table id="member">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
                <td><input type="button" value="중복확인" onclick="checkid();"></td>
            </tr>
            <tr>
                <td>PW</td>
                <td><input type="password" name="pw1"></td>
            </tr>
            <tr>
                <td>PW_check</td>
                <td><input type="password" name="pw2"></td>
            </tr>
            <tr>
                <td>name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>sex</td>
                <td>
                    <input type="radio" name="sex" value="male">남&nbsp;&nbsp;
                    <input type="radio" name="sex" value="female">여
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" placeholder="000-0000-0000"></td>
            </tr>
        </table>

        <div id="btn">
            <button type="submit">회원가입</button>
        </div>
    </form>

<?php

    include("functions/footer.php");

?>