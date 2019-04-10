<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->

<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->



<!doctype html>



<html lang="en">

<head>

    <meta charset="UTF-8">



    <title>Boardz Demo</title>

    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">

    <meta name="author" content="Burak Karakan">

    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />

    <link rel="stylesheet" href="src/boardz.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>



<body>

<div class="seventyfive-percent  centered-block">

    <!-- Sample code block -->

    <div-->

        <hr class="seperator">



        <!-- Example header and explanation -->

        <div class="text-center">

            <h2>Beautiful <strong>Boardz</strong></h2>

            <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">

                <form class="example" action="board.php" method="POST">

                    <input type="text" placeholder="Search.." name="search">

                    <button type="submit"><i class="fa fa-search"></i></button>

                </form>

            </div>

        </div>



        <!--<hr class="seperator fifty-percent">-->

        <div class="boardz centered-block beautiful">

            <?php

            $connect = mysql_connect("localhost","LKY","1234");    // MySQL 데이터베이스 연결
            mysql_select_db("lky_db", $connect);         // DB 선택
            $sql="select image_url, title, contents from boardz where title like '%$_POST[search]%';";
            $result=mysql_query($sql);



            $count = 1;

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

    </div-->

    <hr class="seperator">

</div>

</body>

</html>