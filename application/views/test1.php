<!DOCTYPE html>
<html>
<head>
    <script src="<?php echo $base_url;?>static/js/jquery-3.2.1.min.js"></script>
</head>
<body>

<script>
    function myFunction() {
        alert();
        $.ajax({
            url: "http://www.yhlyl.com:8083/admin/suits/delsuitbycode?code=" + $('#demo').vale,
            type: "GET",
            success: function (data) {
                alert(data);
            },
            error: function (xhr, type) {
                console.log('Ajax error');
            }
        })
    }
</script>

<h1>JavaScript错误练习</h1>
<p>请输入 5 到 10 之间的数字：</p>
<input id="demo" type="text">
<button type="button" onclick="myFunction()">测试输入值</button>
<p id="mess"></p>

</body>
</html>
