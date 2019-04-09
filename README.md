# PHP
# TableBoard_Shop

##MySQL 테이블 생성!
    mysql> create tableboard_shop( 
        -> num int not null auto_increment, 
        -> Date date not null, 
        -> Order_ID char(20) not null, 
        -> Name char(20) not null, 
        -> Price int not null, 
        -> Quantity int not null, 
        -> primary key(num) 
        -> );
        
### Note
   + tableboard_shop으로 테이블 이름 생성
   + 테이블 속성 및 type은 맘대로 설정
    
### Index.php
     $connect = mysql_connect("localhost","LKY","1234");        // DB 연결
     mysql_select_db("lky_db", $connect);        // DB 선택
     $sql="select *from tableboard_shop;";       // sql에 테이블값 저장
     $result=mysql_query($sql, $connect);        // result에 sql과 DB 연결
    
    while($row=mysql_fetch_array($result)) // while문으로 하나씩 배열형태로 저장
    
                        {
                            $total = ($row[price] * $row[quantity]);
                            echo("
                             <tr onclick=\"location.href = ('board_form.php?num=$row[num]')\">
                                <td class=\"column1\">$row[date]</td>
                                <td class=\"column2\">$row[order_id]</td>
                                <td class=\"column3\">$row[name]</td>
                                <td class=\"column4\">$$row[price]</td>
                                <td class=\"column5\">$row[quantity]</td>
                                <td class=\"column6\">$$total</td>
                             </tr>                    
                            ");
                        }
                        
### board_form.php
     $connect = mysql_connect("localhost","LKY","1234");        // DB 연결
     mysql_select_db("lky_db", $connect);        // DB 선택
     $sql = "select * from tableboard_shop where num='$_GET[num]'";       // GET[num]으로(한줄마다) sql에 저장된 값을 불러옴
     $result=mysql_query($sql);        // result에 저장
     $row = mysql_fetch_array($result); // 레코드를 배열형태로 불러옴
     
     $total = ($row[price] * $row[quantity]);
                                 if(isset($_GET[num])) { //업데이트 경우
     
                   ?>
                   <td class="column1"> <input name="date" type="text" value="<? echo("$row[date]");#TODO: 정보 표시 ?>" /> </td>
                   <td class="column2"> <input name="order_id" type="number" value="<? echo("$row[order_id]");#TODO: 정보 표시 ?>" /> </td>
                   <td class="column3"> <input name="name" type="text" value="<?  echo("$row[name]");#TODO: 정보 표시 ?>" /> </td>
                   <td class="column4"> <input name="price" type="number" placeholder="$" style="text-align: right;" value="<? echo("$row[price]");#TODO: 정보 표시 ?>" /> </td>
                   <td class="column5"> <input name="quantity" type="number" value="<? echo("$row[quantity]");#TODO: 정보 표시 ?>" style="text-align: right;" /> </td>
                   <td class="column6"> $<span id="total"> <? echo("$total");#TODO: 정보 표시 ?> </span> </td>
                   
   + total값은 별개로 선언
   + 기존의 값을 보여주기 위해 echo("$row[]") 형태로 추가
     
### Function
#### insult
    $connect = mysql_connect("localhost","LKY","1234");        // DB 연결
    mysql_select_db("lky_db", $connect);        // DB 선택
    $sql = "insert into tableboard_shop (date,order_id,name,price,quantity) values ('$_POST[date]','$_POST[order_id]','$_POST[name]',$_POST[price],$_POST[quantity])"; //
    mysql_query($sql, $connect);
   + post를 사용하여 tableboard_shop에 추가
   + qurry를 통해 sql과 connect을 합침
   
#### delete
    $connect = mysql_connect("localhost","LKY","1234");        // MySQL 데이터베이스 연결
    mysql_select_db("lky_db", $connect);        // DB 선택
    $sql = "delete from tableboard_shop where num = $_GET[num];";
    mysql_query($sql, $connect);
   + delete로 GET[num]에 해당하는 사항을 삭제
   + qurry를 통해 sql과 connect을 합침
   
#### update
    $connect = mysql_connect("localhost","LKY","1234");        // MySQL 데이터베이스 연결
    mysql_select_db("lky_db", $connect);       // DB 선택
    $sql="update tableboard_shop set date = '$_POST[date]', order_id = '$_POST[order_id]', name = '$_POST[name]', price = $_POST[price], quantity = $_POST[quantity] where num = $_GET[num];";
    mysql_query($sql, $connect);
   + insert와 비슷하나 update함수를 이용한다.


* date가 오류가 나서 문자열처럼 ''를 추가하여줬습니다. 계속 다른시도를 해보았으나 최선이었습니다.