<!DOCTYPE html>
<html>
<body>

<script>
    function myFunction() {
        try {
            var txt = document.getElementById("demo").value;
            if (txt == "")    throw "值为空";
            if (isNaN(txt)) throw "不是数字";
            if (txt > 10)     throw "太大";
            if (txt < 5)      throw "太小";
        } catch (yherr) {
            var x = document.getElementById("mess");
            x.innerHTML = yherr;
        }
    }
</script>

<h1>JavaScript错误练习</h1>
<p>请输入 5 到 10 之间的数字：</p>
<input id="demo" type="text">
<button type="button" onclick="myFunction()">测试输入值</button>
<p id="mess"></p>

</body>
</html>
