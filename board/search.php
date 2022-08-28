<?php
    $main_title = "A.P 애니멀 프로텍터";
    $style = "css/index.css";
    include("functions/header.php");
?>

    <h1>검색 결과</h1>

    <?php
        $conn = mysqli_connect("localhost", "root", "animal3#", "animalprotect");
        $category = $_GET["category"];
        $search = $_GET["search"];

        if($category == "title"){
            $catego = "제목";
        }
        else if($category == "id"){
            $catego = "작성자";
        }
        else if($category == "message"){
            $catego = "내용";
        }
    ?>
    
    <h3><?php echo $catego; ?>에서 "<?php echo $search; ?>"검색결과</h3>

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
    // msg_board 테이블 에서 글 조회
    $sql = "SELECT * FROM board WHERE $category LIKE '%$search%' ORDER BY num DESC";
    $result = mysqli_query($conn, $sql);
    $list = "";

    while($row = mysqli_fetch_array($result)){
        //title변수에 DB에서 가져온 title을 선택
        $title = $row["title"];

        if(strlen($title)>25){ 
            //title이 25을 넘어서면 ...표시
            $title = str_replace($row["title"],mb_substr($row["title"],0,25,"utf-8")."...",$row["title"]);
        }
    ?>

    <tbody id="table_body">
        <tr>
            <td width="100"><?php echo $row['num']; ?></td>
            <td class="msg" width="500"><a href="view.php?num=<?= $row['num']; ?>"><?php echo $row['title'];?></a></td>
            <td width="200"><?php echo $row['id'];?></td>
            <td width="200"><?php echo date("y-m-d H:i", strtotime($row['date']));?></td>
            <td width="100"><?php echo $row['hit']; ?></td>
        </tr>
    </tbody>
    <?php } ?>
</table>

    <div class="go_index">
        <a href = "index.php">[메뉴]</a>
    </div>

<?php
    include("functions/footer.php");
?>