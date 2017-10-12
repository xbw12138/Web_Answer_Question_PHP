<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/5
 * Time: 下午4:34
 */
require_once 'header.php';
?>
<style>
    #wrapper {margin: 20px auto;}
    #wrapper .input_check {position: absolute;width: 20px;height: 20px;visibility: hidden;}
    #wrapper span {position: relative;}
    #wrapper .input_check+label {display: inline-block;width: 20px;height: 20px;no-repeat;background-position: -31px -3px;}
    #wrapper .input_check:checked+label {background-position: -5px -3px;}

</style>
<div class="container" style="margin-bottom: 35px;" >
    <div class="section">
            <?php
                if(isset($_GET['type'])){
                    if($_GET['type']=="danxuan"){
                        echo '<h1 class="header center orange-text">单选题</h1>';
                        echo '<h6 class="header col s12 light">样例：依据华电集团《电力安全生产工作规定》，基层企业应开展班组长安全教育和培训，并做到每(  )年轮训一遍。
A.半年  B.一年  C.两年  D.三年 </h6>';
                    }else if($_GET['type']=="duoxuan"){
                        echo '<h1 class="header center orange-text">多选题</h1>';
                        echo '<h6 class="header col s12 light">样例：《安全生产法》规定：(  )应当有注册安全工程师从事安全生产管理工作。鼓励其他生产经营单位聘用注册安全工程师从事安全生产管理工作。注册安全工程师按专业分类管理，具体办法由国务院人力资源和社会保障部门。
A.危险物品生产单位      B.危险物品储存单位
C.矿山、金属冶炼单位    D.危险物品使用单位</h6>';
                    }else if($_GET['type']=="panduan"){
                        echo '<h1 class="header center orange-text">判断题</h1>';
                        echo '<h6 class="header col s12 light">样例：《安全生产法》制定的目的是为了加强安全生产工作，杜绝生产安全事故，保障人民群众生命和财产安全，促进经济社会持续健康发展。(  )A、错误 B、正确</h6>';
                    }
                }
            ?>
        <input type="hidden" id="types" value="<?php echo $_GET['type'];?>"/>
        <form>
            <div>
                <textarea name="pro" id="pro" cols=40 rows=100 style="height: 150px" class="materialize-textarea">
                </textarea>
                选项<br/>
                <div id="wrapper">
                    <span><label><input type="checkbox"class="input_check" value="A" id="check1"><label>A</label></span><br>
                    <span><label><input type="checkbox"class="input_check" value="B" id="check2"><label>B</label></span><br>
                    <?php if(isset($_GET['type'])&&$_GET['type']=="panduan"){

                    }else{
                        echo '<span><label><input type="checkbox"class="input_check" value="C" id="check3"><label>C</label></span><br>
                    <span><label><input type="checkbox"class="input_check" value="D" id="check4"><label>D</label></span><br>';
                    }?>

                </div>
        </form>
        <div class="row center">
            <button id="login" type="button"  class="btn-large waves-effect waves-light orange">提交</button>
        </div>
    </div>

    </div>
</div>
<!-- Bootstrap 3.3.2 JS -->
<script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="asset/js/icheck.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        function login(){
            var daan="";
            if($('#check1').is(':checked')){
                daan+="A";
            }
            if($('#check2').is(':checked')){
                daan+="B";
            }
            if($('#check3').is(':checked')){
                daan+="C";
            }
            if($('#check4').is(':checked')){
                daan+="D";
            }
            console.log(daan);
            var type=$("#types").val();
            $.ajax({
                type:"GET",
                url:"api/_setquestion.php",
                dataType:"json",
                data:{
                    pro: $("#pro").val(),
                    daan: daan,
                    type: type,
                },
                success:function(data){
                    if(data.ok){
                        alert("提交成功！");
                        refreshPage();
                        //window.setTimeout("location.href='setquestion.php?type='"+type, 1000);
                    }else{
                        alert(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            });
        }
        function refreshPage()
        {
            window.location.reload();
            window.setTimeout("refreshPage()",1000);
        }
        $("html").keydown(function(event){
            if(event.keyCode==13){
                login();
            }
        });
        $("#login").click(function(){
            login();
        });
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        });
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        });
    })
</script>
<script type="text/javascript">
    function removeHTMLTag(str) {
        str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
        str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
        str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
        str = str.replace(/&nbsp;/ig,'');//去掉&nbsp;
        return str;
    }
</script>
<?php
require_once 'footer.php';
?>
