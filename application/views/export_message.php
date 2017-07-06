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
    <script src="<?php echo $base_url;?>static/js/jquery-3.2.1.min.js"></script>
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
    <form action="<?php echo $base_url; ?>exportdata/lists/" method="get" id="form">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">开始时间</label>
                <div class="am-u-sm-8">
                    <input type="text" id='start_time' name='start_time'  value="<?php echo isset($start) ? $start: ''?>" placeholder="点击选择时间" readonly>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">结束时间 </label>
                <div class="am-u-sm-8">
                    <input type="text" id='end_time' name='end_time' value="<?php echo isset($end) ? $end:''?>" placeholder="点击选择时间" readonly>

                </div>
            </div>
        </div>
        <div style="height:20px;width:100%;float: left;"></div>
        <input type="submit" id="submitform" value="搜索" onclick="submitform()">
    </form>
    <button id="closeMe">导出报表</button>
</div>
<div class="table_box">
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
        <tbody>
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
            共<span class="sum"><?php echo $num; ?></span>条数据 页数:
            <span class="page"><?php echo $per_page; ?>/<?php echo $total_page; ?></span>
            <a href="<?php echo $base_url; ?>exportdata/lists/1?start_time=<?php echo $start;?>&end_time=<?php echo $end;?>" class="sy">首页</a>
            <a href="<?php echo $base_url; ?>exportdata/lists/<?php echo ($per_page-1) <= 1 ? 1 : ($per_page-1); ?>?start_time=<?php echo $start;?>&end_time=<?php echo $end;?>"
               class="">上页</a>
            <a href="<?php echo $base_url; ?>exportdata/lists/<?php echo ($per_page+1) >= $total_page ? $total_page : ($per_page+1); ?>?start_time=<?php echo $start;?>&end_time=<?php echo $end;?>" class="">下页</a>
            <a href="<?php echo $base_url; ?>exportdata/lists/<?php echo $total_page; ?>?start_time=<?php echo $start;?>&end_time=<?php echo $end;?>" class="sy">尾页</a>
            转到
            <input type="number" class="val_num" autocomplete="off">
            <a href="#">GO</a>
        </p>
    </div>
</div>
</body>
<script type="text/javascript" src="/static/laydate/laydate.js"></script>
<script type="text/javascript">
    $(function () {
        laydate({
            elem: '#start_time'
        });
        laydate({
            elem: '#end_time'
        });


    });
    function submitform() {
        //提交表单
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        if (start_time > end_time) {
            alert('开始时间不能大于结束时间');
            return;
        }

        $("#form").submit();
    }

    $('#closeMe').click(function ()
    {
        alert("aaa");
    });

</script>
</html>
