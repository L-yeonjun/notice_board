<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/index.css";
    include("functions/header.php");
?>
    <h1>상담문의</h1>

    <?php
        $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");
    
        // if(!$conn){
        //     echo "db에 연결하지 못했습니다.".mysqli_connect_error(); //연결 에러
        // }
        // else{
        //     echo "db에 접속했습니다.";
        // }
        // num 초기화
        $sql_auto_1 = "ALTER TABLE board auto_increment = 1";
        $result = mysqli_query($conn, $sql_auto_1);
        $sql_auto_2 = "set @count = 0";
        $result = mysqli_query($conn, $sql_auto_2);
        $sql_auto_3 = "UPDATE board SET num = @count:=@count + 1";
        $result = mysqli_query($conn, $sql_auto_3);

        // msg_board 테이블 조회
        $sql = "SELECT * FROM board"; 
        $result = mysqli_query($conn, $sql);

        // echo 값을 그대로 출력. echo $result;
        // print 값을 그대로 출력. print $result;
        // print_r 배열, 객체 모양을 그대로 출력. print_r($result);
        // var_dump print_r보다 더욱 상세하게. var_dump($result);
    ?>

<table>
    <thead id="table_head">
        <tr>
            <th width="100">번호</th>
            <th width="500">제목</th>
            <th width="200">글쓴이</th>
            <th width="200">작성일</th>
            <th width="100">조회수</th>
        </tr>
    </thead>

    <?php
        include ("functions/page_1.php");
        ?>

    <?php
        $sql2 = "SELECT * FROM board ORDER BY num desc LIMIT $start_num, $list";
        $result2 = mysqli_query($conn, $sql2);
        ?>
        
        <?php
        while($row = mysqli_fetch_array($result2)){
            //title변수에 DB에서 가져온 title을 선택
            $title = $row["title"]; 
            
            if(strlen($title)>25){ 
                //title이 25을 넘어서면 ...표시
                $title = str_replace($row["title"],mb_substr($row["title"],0,25,"utf-8")."...",$row["title"]);
            }
        ?>

        <?php 
            $write_time = date("Y-m-d", strtotime($row['date']));
            $now_time = date("Y-m-d");
            
            if($write_time == $now_time){
                $img = "<img src='images/new.png' alt='new'>";
            }
            else{
                $img = "";
            }
            ?>

        <tbody id="table_body">
            <tr>
                <td width="100"><?php echo $row['num']; ?></td>
                <td class="msg" width="500"><a href="view.php?num=<?= $row['num']; ?>"><?php echo $row['title'], $img;?></a></td>
                <td width="200"><?php echo $row['id'];?></td>
                <td width="200"><?php echo date("Y-m-d H:i", strtotime($row['date'])) ?></td>
                <td width="100"><?php echo $row['hit']; ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>

    <?php
        include ("functions/page_2.php");
    ?>

    <div id="write">
        <button><a href = "write.php">글 쓰기</a></button>
    </div>

    <div class="search">
        <form action = "search.php" method = "get">
            <select name="category">
                <option value="title">제목</option>
                <option value="id">글쓴이</option>
                <option value="message">내용</option>
            </select>

            <input type = "text" id = "search" name = "search" placeholder="검색어를 입력해주세요." size=30>
            <button type = "submit">검색</button>
        </form>
    </div>

<?php
    include("functions/footer.php");
?>