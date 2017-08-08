<?php
/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/5/22
 * Time: 18:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E顿饭数据统计系统 </title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>static/css/base.css">
    <script src="<?php echo $base_url; ?>static/js/jquery-3.2.1.min.js"></script>
</head>

<body>
<div class="hd">
    <!-- <div class="r_menu">

         <a class="out_btn" href="./login.html">
             <i class="iconfont icon-tuichu"></i>
             退出登录
         </a>
     </div>-->
    <p class="tit">
        数据统计系统 —— 导出数据
    </p>
</div>
<div class="search_bar">
    <form id="form">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">开始时间</label>
                <div class="am-u-sm-8">
                    <input type="text" id='start_time' name='start_time'
                           value="<?php echo isset($start) ? $start : '' ?>" placeholder="点击选择时间" readonly>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">结束时间 </label>
                <div class="am-u-sm-8">
                    <input type="text" id='end_time' name='end_time' value="<?php echo isset($end) ? $end : '' ?>"
                           placeholder="点击选择时间" readonly>

                </div>
            </div>
        </div>
        <div style="height:20px;width:100%;float: left;"></div>
        <input type="button" value="搜索" onclick="getdata(1)">
    </form>
    <button id="closeMe">导出报表</button>
</div>
<div class="table_box" id="dataDiv">
    <table>
        <thead>
        <tr>
            <th>
                订单详情id
            </th>
            <th>
                订单id
            </th>
            <th>
                菜品id
            </th>
            <th>
                价格
            </th>
            <th>
                总数量
            </th>
            <th>
                已取餐数量
            </th>
            <th>
                用户申请退款数量
            </th>
            <th>
                原始价格
            </th>
            <th>
                减免价格
            </th>

            <th>
                需支付价格
            </th>
            <th>
                最后修改时间
            </th>
            <th>
                购买者用户昵称
            </th>
            <th>
                菜品名称
            </th>
            <th>
                下单时间
            </th>
            <th>
                支付类型
            </th>
            <th>
                店铺名称
            </th>
        </tr>
        </thead>
        <tbody id="mytobody">
        <?php foreach ($info as $value): ?>
            <tr>
                <td><?php echo $value['订单详情id']; ?></td>
                <td><?php echo $value['订单id']; ?></td>
                <td><?php echo $value['菜品id']; ?></td>
                <td><?php echo $value['价格']; ?></td>
                <td><?php echo $value['总数量']; ?></td>
                <td><?php echo $value['已取餐数量']; ?></td>
                <td><?php echo $value['用户申请退款数量']; ?></td>
                <td><?php echo $value['原始价格']; ?></td>
                <td><?php echo $value['减免价格']; ?></td>
                <td><?php echo $value['需支付价格']; ?></td>
                <td><?php echo $value['最后修改时间']; ?></td>
                <td><?php echo $value['购买者用户昵称']; ?></td>
                <td><?php echo $value['菜品名称']; ?></td>
                <td><?php echo $value['下单时间']; ?></td>
                <td><?php echo $value['支付类型']; ?></td>
                <td><?php echo $value['店铺名称']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="page_bar">
        <p>
            共<span id="num" class="sum"><?php echo $num; ?></span>条数据 页数:
            <span class="page"><span id="perpage"><?php echo $num == 0 ? 0 : $per_page; ?></span><span>/</span><span
                    id="totalpage"><?php echo $total_page; ?></span></span>

            <!--    <span class="page" id="spanpage">--><?php //echo $per_page; ?><!--/-->
            <?php //echo $total_page; ?><!--</span>-->
            <!--    <a href="<?php /*echo $base_url; */ ?>exportdata/lists/1?start_time=<?php /*echo $start; */ ?>&end_time=<?php /*echo $end; */ ?>"
               class="sy">首页</a>
            <a href="<?php /*echo $base_url; */ ?>exportdata/lists/<?php /*echo ($per_page - 1) <= 1 ? 1 : ($per_page - 1); */ ?>?start_time=<?php /*echo $start; */ ?>&end_time=<?php /*echo $end; */ ?>"
               class="">上页</a>
            <a href="<?php /*echo $base_url; */ ?>exportdata/lists/<?php /*echo ($per_page + 1) >= $total_page ? $total_page : ($per_page + 1); */ ?>?start_time=<?php /*echo $start; */ ?>&end_time=<?php /*echo $end; */ ?>"
               class="">下页</a>
            <a href="<?php /*echo $base_url; */ ?>exportdata/lists/<?php /*echo $total_page; */ ?>?start_time=<?php /*echo $start; */ ?>&end_time=<?php /*echo $end; */ ?>"
               class="sy">尾页</a>-->
            <!-- <?php //echo $num == 0 ? "" : ' href="javascript:void(0)" onclick="getdata(1)"'; ?> -->
            <a id="homepage" class="sy">首页</a>
            <a id="up"  class="sy" >上页</a>
            <a id="down" <?php echo ($num == 0 || $total_page == 1) ? 'class="sy"' : '  href="javascript:void(0)" onclick="getdata(3)"'; ?> >下页</a>
            <a id="backpage"
               class="sy" <?php echo ($num == 0 || $total_page == 1) ? "" : ' href="javascript:void(0)" onclick="getdata(4)"'; ?> >尾页</a>
            转到
            <input id="gopage" type="number" class="val_num" autocomplete="off">
            <a href="javascript:void(0)" onclick="getdata(6)">GO</a>
        </p>
    </div>
</div>
</body>
<script type="text/javascript" src="/static/laydate/laydate.js"></script>
<script type="text/javascript">
    $(function ()
    {
        laydate({
            elem: '#start_time',
            format: 'YYYY-MM-DD',
            //min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
            //max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
            max: laydate.now()
        });
        laydate({
            elem: '#end_time',
            format: 'YYYY-MM-DD',
            max: laydate.now()
        });


    });
    //    function submitform() {
    //        //提交表单
    //        var start_time = $('#start_time').val();
    //        var end_time = $('#end_time').val();
    //        if (start_time > end_time) {
    //            alert('开始时间不能大于结束时间');
    //            return;
    //        }
    //
    //        $("#form").submit();
    //    }

    $('#closeMe').click(function ()
    {
        var start = $('#start_time').val().replace(/-/g, "/");
        var end = $('#end_time').val().replace(/-/g, "/");
        window.location.href = '<?php echo $base_url; ?>api/exportdata/exportToData?start_time=' + start + '&end_time=' + end;
    });
    $('#go').click(function ()
    {
        //$('#consignee').val().trim()
        var page = $('#gopage').val().trim();
        var totalpage = parseInt($("#totalpage").text());
        if (page != "" && !isNaN(page))
        {
            if (page > totalPage)
            {
                alert("页面超出范围！");
                return;
            }
            window.location.href = '<?php echo $base_url; ?>web/exportdata/lists/' + page + '?start_time=<?php echo $start;?>&end_time=<?php echo $end;?>';
        } else
        {
            alert("请输入正确的页面值！");
        }

    });

    function getdata(type)
    {
        var url = '';
        var prepage = parseInt($("#perpage").text());
        var totalpage = parseInt($("#totalpage").text());
        var start = $('#start_time').val();
        var end = $('#end_time').val();
        switch (type)
        {
            case 1://首页 搜索
                url = '<?php echo $base_url; ?>api/exportdata/ajaxData/?page=1&start_time=' + start + '&end_time=' + end;
                break
            case 2://上页
                var curr_page = (prepage - 1) <= 1 ? 1 : (prepage - 1);
                url = '<?php echo $base_url; ?>api/exportdata/ajaxData/?page=' + curr_page + '&start_time=' + start + '&end_time=' + end;
                break
            case 3://下页
                var curr_page = (prepage + 1) >= totalpage ? totalpage : (prepage + 1);
                url = '<?php echo $base_url; ?>api/exportdata/ajaxData/?page=' + curr_page + '&start_time=' + start + '&end_time=' + end;
                break
            case 4://尾页
                url = '<?php echo $base_url; ?>api/exportdata/ajaxData/?page=' + totalpage + '&start_time=' + start + '&end_time=' + end;
                break
            case 6://go
                var page = $('#gopage').val().trim();
                if (page != "" && !isNaN(page))
                {
                    var totalpage = parseInt($("#totalpage").text());
                    if (page > totalpage)
                    {
                        alert("页面超出范围！");
                        return;
                    }
                    url = '<?php echo $base_url; ?>api/exportdata/ajaxData/?page=' + page + '&start_time=' + start + '&end_time=' + end;
                } else
                {
                    alert("请输入正确的页面值！");
                    return;
                }
                break

        }
        $.getJSON(url, function (data)
        {
            //console.log('getJSON---');
            //console.log(data);
            console.log(url);
            var resArr = data.info;
//            console.log(resArr);
            var html = '';
//            if (jQuery.isEmptyObject(resArr))
//            {
//                alert("暂无数据");
//                $("#perpage").text(0);
//                $('#totalpage').text(0);
//            }
            for (var i = 0; i < resArr.length; i++)
            {
                //console.log(resArr[i].订单详情id);
                html += "<tr> " +
                    "<td>" + resArr[i].订单详情id + "</td> " +
                    "<td>" + resArr[i].订单id + "</td> " +
                    "<td>" + resArr[i].菜品id + "</td> " +
                    "<td>" + resArr[i].价格 + "</td>" +
                    "<td>" + resArr[i].总数量 + "</td>" +
                    "<td>" + resArr[i].已取餐数量 + "</td>" +
                    "<td>" + resArr[i].用户申请退款数量 + "</td>" +
                    "<td>" + resArr[i].原始价格 + "</td>" +
                    "<td>" + resArr[i].减免价格 + "</td>" +
                    "<td>" + resArr[i].需支付价格 + "</td>" +
                    "<td>" + resArr[i].最后修改时间 + "</td>" +
                    "<td>" + resArr[i].购买者用户昵称 + "</td>" +
                    "<td>" + resArr[i].菜品名称 + "</td>" +
                    "<td>" + resArr[i].下单时间 + "</td>" +
                    "<td>" + resArr[i].支付类型 + "</td>" +
                    "<td>" + resArr[i].店铺名称 + "</td>" +
                    "</tr>"
            }
            document.getElementById("mytobody").innerHTML = html;
            //$("tbody").hmtl(html);//和时间控件兼容性问题
            var per = data.per_page;//当前页
            var total=data.total_page;//总页数
            $('#num').text(data.num);
            $("#perpage").text(total == 0 ? 0 : per);
            $('#totalpage').text(total);
            $('#gopage').val("");
            var up = $('#up');//上一页
            var down = $('#down');//下一页
            var homepage = $('#homepage');//首页
            var backpage = $('#backpage');//尾页

            if (total <= 1)//无数据 总页数是为0或1
            {
                //上一页不能点击
                up.addClass('sy');
                up.removeAttr('href');
                up.removeAttr('onclick');
                //下一页不能点击
                down.addClass('sy');
                down.removeAttr('href');
                down.removeAttr('onclick');
                //首页不能点击
                homepage.removeAttr('href');
                homepage.removeAttr('onclick');
                //尾页不能点击
                backpage.removeAttr('href');
                backpage.removeAttr('onclick');
            } else//不止一页时
            {
                //当前页不是第一页
                if(per > 1)
                {
                    //当前页小于总页数及当前不是最后一页
                    if(per < total)
                    {
                        //上一页可以点击
                        if (up.hasClass('sy'))
                        {
                            up.removeClass('sy');
                            up.attr("href", "javascript:void(0)");
                            up.attr("onclick", "getdata(2)");
                        }
                        //下一页可以点击
                        if (down.hasClass('sy'))
                        {
                            down.removeClass('sy');
                            down.attr("href", "javascript:void(0)");
                            down.attr("onclick", "getdata(3)");
                        }
                        //首页可以点击
                        homepage.attr("href", "javascript:void(0)");
                        homepage.attr("onclick", "getdata(1)");
                        //尾页可以点击
                        backpage.attr("href", "javascript:void(0)");
                        backpage.attr("onclick", "getdata(4)");
                    }else//是最后一页
                    {
                        //上一页可以点击
                        if (up.hasClass('sy'))
                        {
                            up.removeClass('sy');
                            up.attr("href", "javascript:void(0)");
                            up.attr("onclick", "getdata(2)");
                        }
                        //下一页不能点击
                        down.addClass('sy');
                        down.removeAttr('href');
                        down.removeAttr('onclick');
                        //首页可以点击
                        homepage.attr("href", "javascript:void(0)");
                        homepage.attr("onclick", "getdata(1)");
                        //尾页不能点击
                        backpage.removeAttr('href');
                        backpage.removeAttr('onclick');
                    }
                }else//当前为第一页时
                {
                    //上一页不能点击
                    up.addClass('sy');
                    up.removeAttr('href');
                    up.removeAttr('onclick');
                    //下一页可以点击
                    if (down.hasClass('sy'))
                    {
                        down.removeClass('sy');
                        down.attr("href", "javascript:void(0)");
                        down.attr("onclick", "getdata(3)");
                    }
                    //首页不能点击
                    homepage.removeAttr('href');
                    homepage.removeAttr('onclick');
                    //尾页可以点击
                    backpage.attr("href", "javascript:void(0)");
                    backpage.attr("onclick", "getdata(4)");
                }
            }


        })
    }

</script>
</html>
