<?php
    $sqlVst = "update 알람_테이블 set visit = 'true' where mb_no ='{$_GET['mb_no']}' and bo_table = '{$_GET['b_no']}' and wr_no ='{$_GET['wr_no']}'";
    sql_query($sqlVst);
    header('location:index.php>bo_table='.$_GET['b_no'].'&wr_id='.$_GET['wr_no']);
?>