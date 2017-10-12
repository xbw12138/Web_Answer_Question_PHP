<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午5:30
 */
require_once 'header.php';
require_once 'api/_problem.php';
?>
    <style>
        #wrapper {margin: 20px auto;}
        #wrapper .input_check {position: absolute;width: 20px;height: 20px;visibility: hidden;}
        #wrapper span {position: relative;}
        #wrapper .input_check+label {display: inline-block;width: 20px;height: 20px;no-repeat;background-position: -31px -3px;}
        #wrapper .input_check:checked+label {background-position: -5px -3px;}

    </style>
    <div class="container" style="margin-bottom: 35px;">
        <div class="section">
        <?php
            $array[]=array();
            if(isset($_GET['type'])){
                if($_GET['type']=="random"){
                    $array=selectRandomProblem();
                }else if($_GET['type']=="danxuan"){
                    $array=selectDanxuanProblem();
                }else if($_GET['type']=="duoxuan"){
                    $array=selectDuoxuanProblem();
                }else if($_GET['type']=="panduan"){
                    $array=selectPanduanProblem();
                }
            }else {
                echo "意图不明确";
            }
        ?>
        <?php
            $i=1;
            foreach ($array as $data){
                $typess="";
                if($data['type']=="P"){
                    $typess="(判断题)";
                }else if($data['type']=="N"){
                    $typess="(单选题)";
                }else if($data['type']=="O"){
                    $typess="(多选题)";
                }
                echo '<h6 class="header col s12 light">'.$i.'.'.$typess.$data['pro'].'</h6>'; ?>
                <input type="hidden" id="daan<?php echo $i; ?>" value="<?php echo $data['daan'];?>"/>
                <form>
                    <hr>
                        选项<br/>
                        <div id="wrapper">
                            <span><label><input type="checkbox"class="input_check" value="A" id="<?php echo $i; ?>check1"><label>A</label></span><br>
                            <span><label><input type="checkbox"class="input_check" value="B" id="<?php echo $i; ?>check2"><label>B</label></span><br>
                            <?php if($data['type']!="P"){
                                echo '<span><label><input type="checkbox"class="input_check" value="C" id="'.$i.'check3"><label>C</label></span><br>
                    <span><label><input type="checkbox"class="input_check" value="D" id="'.$i.'check4"><label>D</label></span><br>';
                            }?>
                        </div>
                    <div id="resultt<?php echo $i; ?>" style="display:none;"><h5 class="orange">正确</h5></div>
                    <div id="resultf<?php echo $i; ?>" style="display:none;"><h5 class="orange">错误 应选 <?php echo $data['daan'];?></h5></div>
                </form>
            <?php  $i++;}
        ?>
            <input type="hidden" id="total" value="<?php echo $i;?>"/>
            <div class="row center">
                <button id="login" type="button"  class="btn-large waves-effect waves-light orange">提交</button>
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
                var j=0;
                var zhengquetotal=0;
                var weidatotal=0;
                var dacuototal=0;
                j=$("#total").val()-1;
                for(var i=1;i<=j;i++){
                    var daan="";
                    if($('#'+i+'check1').is(':checked')){
                        daan+="A";
                    }
                    if($('#'+i+'check2').is(':checked')){
                        daan+="B";
                    }
                    if($('#'+i+'check3').is(':checked')){
                        daan+="C";
                    }
                    if($('#'+i+'check4').is(':checked')){
                        daan+="D";
                    }
                    if(!$('#'+i+'check1').is(':checked')&&!$('#'+i+'check2').is(':checked')
                        &&!$('#'+i+'check3').is(':checked') &&!$('#'+i+'check4').is(':checked')){
                        weidatotal++;
                    }
                    if(daan==$("#daan"+i).val()){
                        zhengquetotal++;
                        console.log("正确");
                        document.getElementById("resultt"+i).style.display="";
                    }else{
                        dacuototal++;
                        console.log("错误");
                        document.getElementById("resultf"+i).style.display="";
                    }
                    console.log(daan);
                }
                alert("答题完毕，共计"+j+"题，答对"+zhengquetotal+"题,未答"+weidatotal+"题,答错"+(j-zhengquetotal-weidatotal)+"题,已录入数据库");
                $.ajax({
                    type:"GET",
                    url:"api/_setgrade.php",
                    dataType:"json",
                    data:{
                        total: zhengquetotal,
                    },
                    success:function(data){
                        if(data.ok){
                            //alert("提交成功！");
                            //refreshPage();
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
<?php
require_once 'footer.php';
?>