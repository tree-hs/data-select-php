<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sql_where ="where";
        $sql_where .= "(bo_table ='테이블명' and mb_id = '회원_ID') and ";
        $sql = "select * from 알람_테이블 {$sql_where} order by mb_no desc";
        $result = sql_query($sql);
        $row = sql_fetch($sql);
    ?>
    <ul class="alarm_list">
        <?php
            if($row){
                for($i=0;$row=sql_fetch_array($result);$i++){
                    $list[] = $row;
                    switch($list[$i]['bo_table']){
                        case '테이블A' :
                            $text = '게시판A';
                            break;
                        case '테이블B' :
                            $text = '게시판B';
                            break;
                        default :
                            $text = '기본 게시판';
                            break;
                    }
        ?>
                <li>
                    <div class="chk">
                        <input type="checkbox" name="ckn<?=$list[$i]['mb_no']?>" id="chk<?=$list[$i]['mb_no']?>">
                    </div>
                    <div class="info">
                        <a href="#" onclick="visitEvt(<?=$list[$i]['mb_no']?>,<?=$list[$i]['mb_table']?>,<?=$list[$i]['mb_no']?>)"><?=$txt?>에 게시물이 등록되었습니다.</a>
                        <?php if($list[$i]['wr_visit'] == false){ ?>
                        <span>new</span>
                        <?php } ?>
                    </div>
                </li>
        <?php
                }
            }else{
        ?>
            <li class="none-list">등록된 게시물이 없습니다.</li>
        <?php } ?>
    </ul>
    <script>
        function visitEvt(e,b_no,wr_no){
            location.href = "list_visit.php?mb_no"+ e +"&b_no="+ b_no + "&wr_no" + wr_no;
        }
    </script>
</body>
</html>