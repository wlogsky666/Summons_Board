
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
                    <tr><td><label for="add_id">ID</label></td>
                    <td><input type="text" id="add_id"></td></tr>
                    <tr><td><label for="name">Name</label></td>
                    <td><input type="text" id="name"></td></tr>
                    <tr><td><label for="property">屬性</label>
                    <td><input type="text" id="property"></td></tr>
                    <tr><td><label for="star">Star</label>
                    <td><input type="text" id="star"></td></tr>
                    <tr><td><label for="cost">Cost</label>
                    <td><input type="text" id="cost"></td></tr>

                    <tr><td><label for="type1">屬性一</label></td>
                    <td style="text-align: center;"><select id="type1" >
                    <option value=""></option>
                    <option value="HP type">HP type</option>
                    <option value="攻擊type">攻擊type</option>
                    <option value="平衡type">平衡type</option>
                    </select> </td></tr>

                    <tr><td><label for="type2">屬性二</label></td>
                    <td style="text-align: center;"><select id="type2" >
                    <option value=""></option>
                    <option value="防禦type">防禦type</option>
                    <option value="輔助type">輔助type</option>
                    <option value="強襲type">強襲type</option>
                    <option value="技能type">技能type</option>
                    <option value="反擊type">反擊type</option>
                    </select></td></tr>

                    <tr><td><label for="hp">HP</label>
                    <td><input type="text" id="hp"></td></tr>
                    <tr><td><label for="atk">Attack</label>
                    <td><input type="text" id="atk"></td></tr>

                    <tr><td><label for="as">主動技名稱</label>
                    <td><input type="text" id="as"></td></tr>
                    <tr><td><label for="asd">敘述</label>
                    <td><input type="text" id="asd"></td></tr>
                    <tr><td><label for="round">回數</label>
                    <td><input type="text" id="round"></td></tr>

                    <tr><td><label for="ls">隊長技名稱</label>
                    <td><input type="text" id="ls"></td></tr>
                    <tr><td><label for="lsd">敘述</label>
                    <td><input type="text" id="lsd"></td></tr>
                    
                    <tr><td><label for="sp1">能力一</label>
                    <td><input type="text" id="sp1"></td></tr>
                    <tr><td><label for="sp2">能力二</label>
                    <td><input type="text" id="sp2"></td></tr></table>

                    <input id="file" name="file" type="file">

                    <button id="add_button">新增/更新</button>

                    <!--                             if($_FILES['file']['error'] == 0 ){
                                move_uploaded_file($_FILES['file']['tmp_name'],'pic/'.$addid.'.gif'); //複製檔案
                                echo '<img src ="'.'pic/'.$addid.'.gif'.'">' ;
                            }


                                echo "<script>alert('已更新 No.".$_POST["addid"]."')</script>";
                            }
                    -->

                </div>
            </div> 
            <script type="text/javascript">         // Add or Update 
                var db = new Firebase('https://summonsboard-2c5f0.firebaseio.com/') ;
                var pic = 'pic/';
                $("#add_button").click( () =>{
                    var add_id = $('#add_id').val();
                    if( add_id.length <= 0 ){
                        alert( "請輸入ID" ) ;
                        return ;
                    }
                    var name = $('#name').val();
                    var property = $('#property').val();
                    var star = $('#star').val();
                    var cost = $('#cost').val();
                    var type1 = $('#type1').val();
                    var type2 = $('#type2').val();

                    var hp = $('#hp').val();
                    var atk = $('#atk').val();
                    var as = $('#as').val();
                    var asd = $('#asd').val();
                    var round = $('#round').val();
                    var ls = $('#ls').val();
                    var lsd = $('#lsd').val();
                    var sp1 = $('#sp1').val();
                    var sp2 = $('#sp2').val();

                    var update = {'ID': add_id} ;
                    if( name.length > 0 ) update['name'] = name ;
                    if( property.length > 0 ) update['Property'] = property ;
                    if( star.length > 0 ) update['Star'] = star ;
                    if( cost.length > 0 ) update['Cost'] = cost ;
                    if( type1.length > 0 ) update['Type'] = type1 ;
                    if( type2.length > 0 ) update['Type2'] = type2 ;
                    if( hp.length > 0 ) update['HP' ]= hp  ;
                    if( atk.length > 0 ) update['Attack'] = atk  ;
                    if( as.length > 0 ) update['Active'] = as  ;
                    if( ls.length > 0 ) update['Leader'] = ls  ;
                    if( sp1.length > 0 ) update['SA'] = sp1  ;
                    if( sp2.length > 0 ) update['SA2'] = sp2  ;

                    db.child('pet/'+add_id).once('value', e => {                    // Add or Update pet
                        if( e == null && (update.length < 13) ){
                            alert('寵物資訊不完整，請至少填入 技能相關以外 的欄位');
                            return ;
                        }
                        db.child('pet/'+add_id).update(update, error => {
                            if( error ) alert(error) ;
                            else
                            {
                                if( e == null ) alert('NO.'+add_id+' 新增成功');
                                else alert('NO.'+add_id+' 更新成功');
                            }
                        });
                        TouchPic(add_id);
                    });
                    
                });

            </script> 

            <div class=col-lg-3>
                <h2>Delete</h2>
                <div id="delete">
                    <label for="id">ID</label>
                    <input type="text" id="delete_id"><br>
                    <button id="delete_button">刪除</button>
                </div>
            </div>
            <script type="text/javascript">        // Delete
                
                $("#delete_button").click( () =>{
                    var delete_id = $("#delete_id").val() ;
                    if( delete_id.length <= 0 ) console.log( "No Data input" ) ;
                    else{
                        db.child('pet/'+delete_id).once('value', e => {      // Get info of pet
                            if( e.val() == null ) 
                            {
                                alert('Delete:找不到此寵物，請重新輸入ID');
                                return ;
                            }
                            if( confirm('Really want to delete ID.'+delete_id+'?') )    // Only remove pet
                            {
                                db.child('pet/'+delete_id).remove( error => {       
                                    if( !error ) alert('已刪除 ID.'+delete_id);
                                    else alert(error);
                                }); 
                            }
                        });            
                    }
                });

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
                            var input_id = $("#search_id").value ;
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
                                                    <span style="font-size:16px;">${info.ID}</span></td>
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
<script type="text/javascript">
    function TouchPic(a){
        $('#search_id').val(a);
        $('#search_button').trigger('click');
    }
</script>>
    <footer class=footer>
         </br><p style = "text-align:center">2016-2017&copy; Wlogsky </p></footer>
</body>
</html>