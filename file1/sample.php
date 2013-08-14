<?php
  header("Content-Type: text/html; charset=UTF-8");
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "1234";
  $dbName = "twonessdb";

  $db = mysqli_connect( $dbHost, $dbUser, $dbPass );
  mysqli_query($db,"SET NAMES sjis");
  mysqli_select_db( $db, $dbName )
    or die("データベース" . $dbName . "との接続に失敗しました。");
  $query = "SELECT aaa , bbb" . " FROM tbl01" ;
  $result = mysqli_query( $db , $query )
    or die("データの読み込みに失敗しました:\n " . mysqli_error( $db ) );
    

?>
<html>
<head>
<title>PHP+MySQLの接続確認</title>
</head>
<body>
<font size= "2">MySQLデータの取得と表示</font>
  <TABLE border="1" cellspacing=0 cellpadding=2 width="200">
    <TBODY>
        <TR bgcolor="#cccccc">
          <TD width="25">No</TD>
	  <TD width="160"><center>コード</center></TD>	
          <TD width="160"><center>名称</center></TD>
          <TD width="180">番号</TD>
        </TR>
        <?php
         $data_cnt = 0;
             while ( $row = mysqli_fetch_array( $result ) ){
               $data_cnt = $data_cnt + 1;
               print "<TR>";
               print "<TD width=\"20\">$data_cnt</TD>";
               print "<TD width=\"160\">$row[0]</TD>";
	       print "<TD width=\"160\">$row[1]</TD>";
		$data_cnt1 = $data_cnt +100;
               print "<TD width=\"180\">$data_cnt1</TD>";
               print "</TR>";
             }
         ?>
    </TBODY>
  </TABLE>
</body>
</html>
