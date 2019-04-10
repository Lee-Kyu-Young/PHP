# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)

```

## board.php (수정)
[
<?php

            $connect = mysql_connect("localhost","LKY","1234");    // DB 연결
            mysql_select_db("lky_db", $connect);         // DB 선택
            $sql="select image_url, title, contents from boardz where title like '%$_POST[search]%';"; 
            //sql로 추가한 테이블에서 search한 부분을 select 하여 보여줌
            $result=mysql_query($sql); //qurry함수를 통하여 실행



            $count = 1; //단순한 카운트 변수
            

            echo("<ul>");
            while($row=mysql_fetch_array($result))
            {

                $count++;

                echo("                   
                    <li>

                        <h1>$row[title]</h1>  
                        
                        $row[contents]        
                        
                        <img src=$row[image_url] alt=\"demo image\"/>

                    </li>        

                    ");


                if($count%3 == 0){ //검색창에 아무것도 적지 않았을 때
                    echo("</ul><ul>");
                }
                if($_POST[saerch]!=NULL) { // 검색시 sumo와 관련된 것이 아니면 멈춤(검색이 안됌)
                    
                    if($_POST[search]!="sumo"){
                        break;
                    }
                    else if($_POST[search]!="su"){
                        break;
                    }
                    else if($_POST[search]!="Sumo") {
                        break;
                    }

                }
            }

            echo("</ul>");

            ?>
]
