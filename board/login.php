<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/login.css";
    include("functions/header.php");
?>

    <div id="login_page">
        <form action="check.php?mode=login" method="post">
            <table>
                <tr>
                    <td>ID &nbsp</td>
                    <td><input type="text" name="id"></td>
                </tr>
                <tr>
                    <td>PW &nbsp</td>
                    <td><input type="password" name="pw"></td>
                </tr>
            </table>

            <div id="btn">
            <button type="submit">로그인</button>
            </div>
        </form>
    </div>
    <div id="member">
            <button type="submit" onclick="location.href='member.php'">회원가입</button>
        </div>
    


<?php

include("functions/footer.php");

?>