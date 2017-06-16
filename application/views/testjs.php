<html>
<head>
    <script src="<?php echo $base_url ?>static/js/main.js"></script>
    <style type="text/css">
        #mydiv{
            background-color: green;
            width: 120px;
            height: 20px;
            padding: 40px;
            color: #ffffff;
        }
        #mydiv1{
            background-color: green;
            color: #ffffff;
            width: 90px;
            height: 20px;
            padding: 40px;
            font-size: 12px;
        }
    </style>
</head>

<body onload="checkCookies()" onunload="">
<p id="add" align="left" onclick="this.innerHTML='谢谢'"></p>
<p id="add2" align="left" onclick="click1(this)">点击我1</p>
<p id="add3" align="left">点击我2</p>
<br/>
<br/>
<br/>
请输入英文字符：<input type="text" id="fname" onchange="myFunction()">
<p>当您离开输入字段时，会触发将输入文本转换为大写的函数。</p>
<br/>
<br/>
<br/>
<div id="mydiv" onmouseover="mOver(this)" onmouseout="mOut(this)" >把鼠标移到上面</div>
<br/>
<br/>
<br/>
<div id="mydiv1" onmousedown="mDown(this)" onmouseup="mUp(this)">请点击这里</div>
<br/>
<br/>
<div id="div1">
    <p id="p1">这是一个段落。</p>
    <p id="p2">这是另一个段落。</p>
</div>
</body>
<script>
    document.write(new Date());//输出时间
    //onmouseover 鼠标移入
    function mOver(obj)
    {
        obj.innerHTML="谢谢"
    }
    //onmouseout 鼠标移出
    function mOut(obj)
    {
        obj.innerHTML="把鼠标移到上面"
    }
    //onmousedown 鼠标按下
    function mDown(obj)
    {
        obj.style.backgroundColor="#1ec5e5";
        obj.innerHTML="请释放鼠标按钮"
    }
    //onmouseup 鼠标抬起
    function mUp(obj)
    {
        obj.style.backgroundColor="green";
        obj.innerHTML="请按下鼠标按钮"
    }

    //检查是否启动cookie
    //onload
    function checkCookies()
    {
        if (navigator.cookieEnabled)
        {
            console.log("已启用 cookie");
        }
        else
        {
            console.log("未启用 cookie");
        }
    }
    //onchange
    function myFunction()
    {
        var x = document.getElementById("fname");
        x.value = x.value.toUpperCase();
    }

    function click1(id)
    {
        id.innerHTML = "谢谢1";
    }

    document.getElementById("add3").onclick = function ()
    {
        this.innerHTML = "谢谢2";
    }

    var sum = add(1, 2);//main.js方法
    var add = document.getElementById("add");
    add.innerHTML = sum;//改变标签内容
    add.align = "center";//改变标签属性
    //改变p标签样式
    add.style.color = "red";
    add.style.fontFamily = "Arial";
    add.style.fontSize = "larger";

    //添加和删除节点（HTML 元素）。
    var para=document.createElement("p");
    var node=document.createTextNode("这是新段落。");
    para.appendChild(node);

    var element=document.getElementById("div1");
    element.appendChild(para);
    //删除已有的 HTML 元素
    var parent=document.getElementById("div1");
    var child=document.getElementById("p1");
    parent.removeChild(child);
    //删除已有的 HTML 元素 第二种写法
    //var child=document.getElementById("p1");//要删除的元素
    //child.parentNode.removeChild(child);//找到父亲然后删除

    //js对象
    var person = new Object();
    person.firstname = "Bill";
    person.lastname = "Gates";
    person.age = 58;
    person.eyecolor="blue";
    //document.write(person.firstname + " is " + person.age + " years old.");
    console.log(person.firstname + " is " + person.age + " years old.");
    //代替对象初始化
    var person1 = {firstname:"John",lastname:"Doe",age:50,eyecolor:"blue"};
    console.log(person1.firstname + " is " + person1.age + " years old.");
    //第三种初始化 函数
    function person3(firstname,lastname,age,eyecolor)
    {
        this.firstname=firstname;
        this.lastname=lastname;
        this.age=age;
        this.eyecolor=eyecolor;
    }
    var person2 = new person3("Vill","Gates",56,"blue");
    console.log(person2.firstname + " is " + person2.age + " years old.");
    var txt = "";
    for (var x in person2)
    {
        txt += person[x];
    }
    console.log(txt);

    var w=window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;

    var h=window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;
    console.log("浏览器的内部窗口宽度：" + w + "，高度：" + h + "。");
</script>
</html>