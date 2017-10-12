<html>
<head>
    <meta charset="UTF-8">
    <title>选题系统用户登录</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="asset/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="asset/css/blue.css" rel="stylesheet" type="text/css" />
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>选题系统用户登录</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录到选题系统</p>
            <form>
            <div class="form-group has-feedback">
                <input id="email" name="Email" type="text" class="form-control" placeholder="账号"/>
            </div>
            <div class="form-group has-feedback">
                <input id="passwd" name="Password" type="password" class="form-control" placeholder="密码"/>
            </div>
            </form>
			<div class="form-group has-feedback">
                <button id="login" type="submit"  class="btn btn-primary btn-block btn-flat">登录</button>
            </div>
             <div class="form-group has-feedback">
                 <a href="register.php">还没有账号，去注册</a>
            </div>
            <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> 登录成功!</h4>
                <p id="msg-success-p"></p>
            </div>
            <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                <p id="msg-error-p"></p>
            </div>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="asset/js/icheck.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        function login(){
            $.ajax({
                type:"GET",
                url:"api/_login.php",
                dataType:"json",
                data:{
                    email: $("#email").val(),
                    passwd: $("#passwd").val(),
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(100);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='index.php'", 1000);
                    }else{
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                    // 在控制台输出错误信息
                    console.log(removeHTMLTag(jqXHR.responseText));
                }
            });
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
</body>
</html>

