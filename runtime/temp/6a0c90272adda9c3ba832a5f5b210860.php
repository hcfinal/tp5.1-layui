<?php /*a:1:{s:43:"E:\www\tp5\/template/admin/login\login.html";i:1554877268;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/public/static/admin/assets/css/layui.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/static/admin/assets/common.css">
    <link rel="icon" href="/favicon.ico">
    <title>管理后台</title>
</head>
<body class="login-wrap">
    <div class="login-container">
        <form class="login-form" id="doLogin" name="doLogin" method="post">
            <h1 class="text-center title">用户登录</h1>
            <div class="input-group">
                <input type="text" id="username" name="name" class="input-field">
                <label for="username" class="input-label">
                    <span class="label-title">用户名</span>
                </label>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="passwd" class="input-field">
                <label for="password" class="input-label">
                    <span class="label-title">密码</span>
                </label>
            </div>
            <button class="login-button"  lay-submit="" lay-filter="login">登录<i class="ai ai-enter"></i></button>
        </form>
    </div>
</body>
<script src="/public/static/admin/assets/layui.js"></script>
<script src="/public/static/admin/login.js" data-main="login"></script>
<script>
layui.use(['layer','form'], function(){
    var form = layui.form;
    var layer= layui.layer;
    $ =layui.jquery;
    //监听提交
    form.on('submit(login)', function(data){
        var param = data.field;
        $.ajax({
            url:"<?php echo url('admin/login/login'); ?>",
            method:'post',
            data:param,
            dataType:'JSON',
            success:function(res){
                if (res.code==1001){
                    location.href = '<?php echo url("admin/index/index"); ?>';
                } else{
                    layer.msg('登录名或密码错误');
                }
            },
            error:function (data) {
                console.log(data);
                return false;
            }
        }) ;
    });
});
</script>
</html>