
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="Wlogsky">
    <link rel=icon href="pic/icon.jpg">
    <title>サモンズボード</title>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>

    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase.js"></script>    <!-- FireBase -->
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.1.1/firebase.js'></script>
    <style type="text/css">
        * { font-family: 'Microsoft JhengHei'; }
    </style>

    <style>
        .fixed {
            position: fixed;
            top: 10px;
            right: 0;
            width: 200px;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class=container>
        <div class=masthead>
            <h3 class=text-muted>サモンズボード　データベース</h3>
            <div role=navigation>
                <ul class="nav nav-justified">
                    <li class=active><a href=home.php>Home</a></li>
                    <li><a href=search.php>図鑑</a></li>
                    <li><a href=team.php>Team</a></li>
                    <li><a href=download.php>Downloads</a></li>
                    <li><a href=login.php>Manage</a></li>
                    <li><a href=about.php>About</a></li>
                </ul>
            </div>
        </div>
        <div class = "fixed">
            <p><a class="btn btn-lg btn-success" href='logout.php' role=button style="background-color:rgb(0,122,122);margin-top:0px;margin-right:0px">登出</a></p> 
        </div>
        <div class=jumbotron style="background-image:url('pic/kanban3.jpg');background-repeat:no-repeat;background-size:100% 100%">
            <h1>&nbsp;</h1>
            <p class=lead>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-lg btn-success" href='https://sb.gungho.jp/' role=button style="margin-bottom:-90px;margin-left:-90px">官方網站</a></p></div>
        <div class=row>
            <div class=col-lg-4>
                <h2>Add/Update</h2>
                <div id="Add">
                    <table style="text-align: right;" width="330" border="0">
                    <tr><td><label for="id">ID</label></td>
                    <td><input type="text" name="addid"></td></tr>
                    <tr><td><label for="name">Name</label></td>
                    <td><input type="text" name="name"></td></tr>
                    <tr><td><label for="property">屬性</label>
                    <td><input type="text" name="property"></td></tr>
                    <tr><td><label for="star">Star</label>
                    <td><input type="text" name="star"></td></tr>
                    <tr><td><label for="level">Level</label>
                    <td><input type="text" name="level"></td></tr>
                    <tr><td><label for="cost">Cost</label>
                    <td><input type="text" name="cost"></td></tr>

                    <tr><td><label for="type1">屬性一</label></td>
                    <td style="text-align: center;"><select name="type1" >
                    <option value=""></option>
                    <option value="HP type">HP type</option>
                    <option value="攻擊type">攻擊type</option>
                    <option value="平衡type">平衡type</option>
                    </select> </td></tr>

                    <tr><td><label for="type2">屬性二</label></td>
                    <td style="text-align: center;"><select name="type2" >
                    <option value=""></option>
                    <option value="防禦type">防禦type</option>
                    <option value="輔助type">輔助type</option>
                    <option value="強襲type">強襲type</option>
                    <option value="技能type">技能type</option>
                    <option value="反擊type">反擊type</option>
                    </select></td></tr>

                    <tr><td><label for="hp">HP</label>
                    <td><input type="text" name="hp"></td></tr>
                    <tr><td><label for="atk">Attack</label>
                    <td><input type="text" name="atk"></td></tr>

                    <tr><td><label for="as">主動技名稱</label>
                    <td><input type="text" name="as"></td></tr>
                    <tr><td><label for="asd">敘述</label>
                    <td><input type="text" name="asd"></td></tr>
                    <tr><td><label for="round">回數</label>
                    <td><input type="text" name="round"></td></tr>

                    <tr><td><label for="ls">隊長技名稱</label>
                    <td><input type="text" name="ls"></td></tr>
                    <tr><td><label for="lsd">敘述</label>
                    <td><input type="text" name="lsd"></td></tr>
                    
                    <tr><td><label for="sp1">能力一</label>
                    <td><input type="text" name="sp1"></td></tr>
                    <tr><td><label for="sp2">能力二</label>
                    <td><input type="text" name="sp2"></td></tr></table>

                    <input id="file" name="file" type="file">

                    <input type="hidden" name="action_add" value="submit">
                    <input type="submit" value="新增/更新">


                   <!--  <?php
                    if($_POST["action_add"] == "submit")
                    {
                        $addid = $_POST["addid"];

                        if( $addid == '' )
                        {
                            echo "<script>alert('Add:請輸入寵物ID。')</script>";
                            echo "Add:請輸入寵物ID。";
                            //die("Add:請輸入寵物ID。");
                        }
                        else
                        {
                            if($_FILES['file']['error'] == 0 ){
                                move_uploaded_file($_FILES['file']['tmp_name'],'pic/'.$addid.'.gif'); //複製檔案
                                echo '<img src ="'.'pic/'.$addid.'.gif'.'">' ;
                            }

                            $search_addid = "SELECT * FROM pet where ID = $addid";
                            $result2 = mysql_query($search_addid);
                            $record2 = mysql_fetch_object($result2);

                            if(!$record2)
                            {//add pet as_ ls useas usels

                                $add_cmd = "INSERT INTO pet(ID,name,HP,Attack,Cost,Star,Property,Type,Type2,SA,SA2,lv) VALUES('".$_POST["addid"]."','".$_POST["name"]."','".$_POST["hp"]."','".$_POST["atk"]."','".$_POST["cost"]."','".$_POST["star"]."','".$_POST["property"]."','".$_POST["type1"]."','".$_POST["type2"]."','".$_POST["sp1"]."','".$_POST["sp2"]."','".$_POST["level"]."');";

                                $add_useas = "INSERT INTO useas(ID,Title,Round) VALUES('".$_POST["addid"]."','".$_POST["as"]."','".$_POST["round"]."');";
                                $add_usels = "INSERT INTO usels(ID,Title) VALUES('".$_POST["addid"]."','".$_POST["ls"]."');";
                                mysql_query($add_cmd);
                                mysql_query($add_useas);
                                mysql_query($add_usels);

                                $addas = $_POST["as"];
                                if ($addas != '') {
                                    $search_as = "SELECT * FROM as_ WHERE Title = $addas";
                                    $result_as = mysql_query($search_as);
                                    //$record_as = mysql_fetch_object($result_as);

                                    if (!$reult_as) {
                                        $add_as_cmd = "INSERT INTO as_(Title,Description) VALUES('".$_POST["as"]."','".$_POST["asd"]."');";
                                        mysql_query($add_as_cmd);
                                    }
                                    else{
                                    //已存在as
                                    }
                                }
                                

                                $addls = $_POST["ls"];
                                if ($addls != '') {
                                    $search_ls = "SELECT * FROM ls WHERE Title = $addls";
                                    $result_ls = mysql_query($search_ls);
                                    //$record_ls = mysql_fetch_object($result_ls);

                                    if (!$result_ls) {
                                        $add_ls_cmd = "INSERT INTO ls(Title,Description) VALUES('".$_POST["ls"]."','".$_POST["lsd"]."');";
                                        mysql_query($add_ls_cmd);
                                    }
                                    else{
                                    //已存在ls
                                    }
                                }

                                echo "<script>alert('已新增 No.".$_POST["addid"]." ".$_POST["name"]."')</script>";
                                //echo '<meta http-equiv="REFRESH" CONTENT="0;url=manage.php">';
                            }
                            else//update
                            {
                                if ($_POST["name"] != '') {
                                    $update_cmd = "UPDATE pet SET name='".$_POST["name"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["hp"] != '') {
                                    $update_cmd = "UPDATE pet SET HP='".$_POST["hp"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["atk"] != '') {
                                    $update_cmd = "UPDATE pet SET Attack='".$_POST["atk"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["cost"] != '') {
                                    $update_cmd = "UPDATE pet SET Cost='".$_POST["cost"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["star"] != '') {
                                    $update_cmd = "UPDATE pet SET Star='".$_POST["star"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["property"] != '') {
                                    $update_cmd = "UPDATE pet SET Property='".$_POST["property"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["type1"] != '') {
                                    $update_cmd = "UPDATE pet SET Type='".$_POST["type1"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["type2"] != '') {
                                    $update_cmd = "UPDATE pet SET Type2='".$_POST["type2"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["sp1"] != '') {
                                    $update_cmd = "UPDATE pet SET SA='".$_POST["sp1"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["sp2"] != '') {
                                    $update_cmd = "UPDATE pet SET SA2='".$_POST["sp2"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }
                                if ($_POST["lv"] != '') {
                                    $update_cmd = "UPDATE pet SET Level='".$_POST["lv"]."' WHERE ID=".$_POST["addid"].";";
                                    mysql_query($update_cmd);
                                }


                                //pet(ID,name,HP,Attack,Cost,Star,Property,Type,Type2,SA,SA2,lv)
                                if ($_POST["as"] != '') {
                                    $update_useas = "UPDATE useas SET Title='".$_POST["as"]."' WHERE ID='".$_POST["addid"]."';";
                                    mysql_query($update_useas);
                                //useas(ID,Title,Round)
                                }
                                if ($_POST["round"] != '') {
                                    $update_useas = "UPDATE useas SET Round='".$_POST["round"]."' WHERE ID='".$_POST["addid"]."';";
                                    mysql_query($update_useas);
                                //useas(ID,Title,Round)
                                }
                                
                                if ($_POST["ls"] != '') {
                                    $update_usels = "UPDATE usels SET Title='".$_POST["ls"]."' WHERE ID='".$_POST["addid"]."';";
                                    mysql_query($update_usels);
                                //usels(ID,Title)
                                }
                                
                                $addas = $_POST["as"];
                                if ($addas != '') {
                                    $search_as = "SELECT * FROM as_ WHERE Title = $addas";
                                    $result_as = mysql_query($search_as);
                                    //$record_as = mysql_fetch_object($result_as);
                                    if (!$result_as) {
                                        $add_as_cmd = "INSERT INTO as_(Title,Description) VALUES('".$_POST["as"]."','".$_POST["asd"]."');";
                                        mysql_query($add_as_cmd);
                                    }
                                    else{
                                    //已存在as
                                        
                                    }
                                }
                                

                                $addls = $_POST["ls"];
                                if ($addls != '') {
                                    $search_ls = "SELECT * FROM ls WHERE Title = $addls";
                                    $result_ls = mysql_query($search_ls);
                                    //$record_ls = mysql_fetch_object($result_ls);

                                    if (!$result_ls) {
                                        $add_ls_cmd = "INSERT INTO ls(Title,Description) VALUES('".$_POST["ls"]."','".$_POST["lsd"]."');";
                                        mysql_query($add_ls_cmd);
                                    }
                                    else{
                                    //已存在ls
                                    }
                                }
                                

                                echo "<script>alert('已更新 No.".$_POST["addid"]."')</script>";
                            }
                        }
                    }
                    ?> -->
                </div>
            </div> 
            <script type="text/javascript">         // Add or Update 
                var db = new Firebase('https://summonsboard-2c5f0.firebaseio.com/') ;
                var pic = 'pic/';

            </script>> 

            <div class=col-lg-3>
                <h2>Delete</h2>
                <div id="delete">
                    <form method="POST">
                        <label for="id">ID</label>
                        <input type="text" name="id"><br>
                        <input type="hidden" name="action" value="submit">
                        <input type="submit" value="刪除">
                    </form>
                    <!-- <?php
                        if($_POST["action"] == "submit")
                        {
                            $id = $_POST["id"];
                            if( $id == '' )
                            {
                                echo "<script>alert('Delete:請輸入寵物ID。')</script>";
                                echo "Delete:請輸入寵物ID。";
                                //die("Delete:請輸入寵物ID。") ;

                            }
                            else
                            {
                                $search_id="SELECT * FROM pet where ID = $id";
                                $result = mysql_query($search_id);
                                $record = mysql_fetch_object($result);

                                if( !$record )
                                {
                                    echo "<script>alert('Delete:無此寵物!')</script>";
                                }
                                else
                                {
                                // delete pet ,useas,usels...
                                // as ls 不用 ，會有相同技能
                                $sql = "DELETE FROM pet WHERE ID = ".$id;
                                mysql_query($sql) ;
                                $sql = "DELETE FROM useas WHERE ID = ".$id;
                                mysql_query($sql) ;
                                $sql = "DELETE FROM usels WHERE ID = ".$id;
                                mysql_query($sql) ;

                                echo '<script>alert("已刪除'.$record->ID."  ".$record->name.'")</script>';

                                //echo '<meta http-equiv="REFRESH" CONTENT="0;url=manage.php">';
                            }
                        }
                    }
                    ?> -->
                </div>
            </div>
            <script type="text/javascript">        // Delete
                

            </script>


            <div class=col-lg-3>
                <h2>Search</h2>
                <label for="search_id">ID :&nbsp;</label>
                <input type="text" id="search_id">
                <button id="search_button" >查詢</button>
                <table align="center" border="2" cellpadding="0" cellspacing="0" style="width: 500px;" width="360">
                    <colgroup><col span="5" style="text-align: center;" /></colgroup>
                    <tbody id="search_info">
                    <script type="text/javascript">     // Search

                        $("#search_button").click( () =>{
                            var input_id = document.getElementById("search_id").value ;
                            console.log(input_id);
                            if( input_id.length <= 0 ) console.log( "No Data input" ) ;
                            else{
                                var content ;
                                db.child('pet/'+input_id).once('value', e => {      // Get info of pet
                                    var info = e.val() ;
                                    if( info == null ) 
                                    {
                                        content = `找不到此寵物，請重新輸入ID查詢`;
                                        document.querySelector('#search_info').innerHTML = content;
                                        return ;
                                    }

                                    content =  `<tr height="23">
                                                    <td colspan="5" height="23" style="height:23px; width:360px; text-align:center;">
                                                    <span style="font-size:16px;">寵物資訊</span></td>
                                                </tr>
                                                <tr height="23">
                                                    <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">No.</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">${input_id}</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">名稱</span></td>
                                                    <td colspan="2" style="width: 144px; text-align: center;">
                                                    <span style="font-size:16px;">${info.name}</span></td>
                                                </tr>
                                                <tr height="23">
                                                    <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">属性</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">${info.Property}</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">稀有度</span></td>
                                                    <td colspan="2" style="width: 144px; text-align: center;">
                                                    <span style="font-size:16px;">` ;

                                    for( var i = 0 ; i < info.Star ; ++i ) content += '☆' ;

                                    content += `</span></td>
                                                </tr>
                                                <tr height="23">
                                                    <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">Lv</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">99</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">COST</span></td>
                                                    <td colspan="2" style="width: 144px; text-align: center;">
                                                    <span style="font-size:16px;">${info.Cost}</span></td>
                                                </tr>
                                                <tr height="23">
                                                    <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">屬性一</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">${info.Type}
                                                    <img alt="《召喚圖板》寵物 ${info.Type}" src="${pic}${info.Type}.PNG" style="width:20px; height:20px;"/>
                                                    </span></td>
                                        
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">最大HP</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">${info.HP}</span></td>
                                                    <td rowspan="2" style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">
                                                    <img alt="《召喚圖板》寵物 ${info.ID}" src="${pic}${info.ID}.gif" style="height:60px;"/>
                                                    </span></td>
                                                </tr>`;


                                    content += `<tr height="23">
                                                    <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">屬性二</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">${info.Type2}
                                                    <img alt="《召喚圖板》寵物 ${info.Type2}" src="${pic}${info.Type2}.PNG" style="width: 20px; height: 20px;" />
                                                    </span></td>

                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">最大攻撃</span></td>
                                                    <td style="width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">${info.Attack}&times;3或4回</span></td>
                                                </tr>

                                                <tr height="23">
                                                    <td colspan="5" height="23" style="height: 23px; width: 360px; text-align: center;">
                                                    <span style="font-size:16px;">技能</span></td>
                                                </tr>`;

                                                document.querySelector('#search_info').innerHTML = content;

                                // Skill Part 


                                        db.child('description/active/'+info.Active).once('value', as => {

                                        content  = `<tr height="23">
                                                        <td height="55" rowspan="2" style="height:55px;width:72px;text-align:center;">
                                                        <span style="font-size:16px;">主動技能</span></td>
                                                        <td colspan="3" style="text-align: center;">
                                                        <span style="font-size:16px;">${info.Active}</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">回數：${as.val().Round}</span></td>
                                                        </tr>
                                                    <tr height="32">
                                                        <td colspan="4" height="32" style="height:32px;width:288px;text-align: center;">
                                                        <span style="font-size:16px;">${as.val().detail}</span></td>
                                                    </tr>`;

                                                    document.querySelector('#search_info').innerHTML += content;
                                        
                                        })

                                        db.child('description/leader/'+info.Leader).once('value' , ls =>{

                                        content  = `</tr>
                                                    <tr height="23">
                                                    <td height="55" rowspan="2" style="height: 55px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">隊長技能</span></td>
                                                    <td colspan="4" style="text-align: center;">
                                                    <span style="font-size:16px;">${info.Leader}</span></td>
                                                    </tr>
                                                    <tr height="32">
                                                    <td colspan="4" height="32" style="height: 32px; width: 288px; text-align: center;">
                                                    <span style="font-size: 16px;">${ls.val().detail}</span></td>
                                                    </tr>` ;

                                                    document.querySelector('#search_info').innerHTML += content;
                                        })
                                    

                                        content =  `<tr height="23">
                                                    <td height="92" rowspan="2" style="height: 46px; width: 72px; text-align: center;">
                                                    <span style="font-size:16px;">能力</span></td>
                                                    <td colspan="4" style="text-align: center;">
                                                    <span style="font-size:16px;">${info.SA}`;


                                                    if ( true /* SA != null */ ) {
                                                        content += `<img alt="《召喚圖板》寵物 ${info.SA}" src="${pic}${info.SA}.PNG" style="width: 20px; height: 20px;" />`;
                                                    }

                                        content += `</span></td></tr>` ;

                                        content += `<tr height="23">
                                                    <td colspan="4" style="text-align: center;">
                                                    <span style="font-size:16px;">${info.SA2}`;


                                                    if ( true /* SA != null */ ) {
                                                        content += `<img alt="《召喚圖板》寵物 ${info.SA2}" src="${pic}${info.SA2}.PNG" style="width: 20px; height: 20px;" />`;
                                                    }

                                        content += `</span></td></tr>` ;

                                        document.querySelector('#search_info').innerHTML += content ;                                     
                                })
                            }
                        });
                    </script>

                    </tbody>
                </table>

            </div>
            
        </div>
    </div>
    <footer class=footer>
         </br><p style = "text-align:center">2016-2017&copy; Wlogsky </p></footer>
</body>
</html>