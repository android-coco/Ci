<?php
/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/5/22
 * Time: 18:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://data.fitcome.net/static/css/admin.css">
    <link rel="stylesheet" href="https://data.fitcome.net/plugins/amazeui/css/amazeui.min.css">
    <link rel="stylesheet" href="https://data.fitcome.net/plugins/amazeui/css/admin.css">
    <link rel="stylesheet" href="https://data.fitcome.net/plugins/datatables/css/fixedHeader.dataTables.min.css"/>
    <script src="https://data.fitcome.net/plugins/datatables/js/amazeui.datatables.min.js"></script>
    <script src="https://data.fitcome.net/plugins/amazeui/js/app.js"></script>
    <script src="https://data.fitcome.net/plugins/datatables/js/numeric-comma.js"></script>
    <script src="https://data.fitcome.net/plugins/amazeui/js/jquery.min.js"></script>
    <!-- 表格插件 -->
    <link rel="stylesheet" href="https://data.fitcome.net/plugins/datatables/css/amazeui.datatables.css"/>
    <!-- 固定表格头部 -->
    <script src="https://data.fitcome.net/plugins/datatables/js/dataTables.fixedHeader.min.js"></script>
    <!-- 表格数值排序 -->
    <script src="https://data.fitcome.net/plugins/datatables/js/numeric-comma.js"></script>
</head>
<body>

<div id="container">
    <?php if ($expression == true): ?>
        This will show if the expression is true.
    <?php else: ?>
        Otherwise this will show.
    <?php endif; ?>
    <!--    <ul>-->
    <!--        --><?php //foreach ($datas as $item => $value): ?>
    <!--            <li>--><?php //echo $item; ?><!--:--><?php //echo $value; ?><!--</li>-->
    <!--        --><?php //endforeach; ?>
    <!--    </ul>-->
    <table class="am-table am-table-striped am-table-hover am-text-xs">
        <thead>
        <tr>
            <th>操作</th>
            <th>订单编号</th>
            <th>用户名称</th>
            <th>IP</th>
            <th>取餐码</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $value): ?>
            <tr data-id= <?php echo $value['orderid']; ?>>
                <td>
                    <div class="am-dropdown" data-am-dropdown>
                        <button class="am-btn  am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span
                                class="am-icon-cog"></span> <span class="am-icon-caret-down"></span>
                        </button>
                        <ul class="am-dropdown-content ">
                            <li>1.修改</li>
                            <li><a class="remove-url" ?>" >2. 删除</a></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo $value['orderid']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['ip']; ?></td>
                <td><?php echo $value['takeid']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<script type="text/javascript">
    // 删除提示
    $(".remove-url").click(function () {
        // 修改提示
        var id = $(this).data('id');
        $(".am-modal-bd").text("你，确定要删除 ID:" + id + " 这条记录吗？");
        // 打开弹窗
        $('#my-confirm').modal({
            relatedTarget: id,
            onConfirm: function (options) {

                $.post("<?php echo $base_url . 'admin/newfoods/delete'; ?>", {id: id}, function (datas) {
                    if (datas.result == 1) {
                        $(".am-modal-bd1").text("请先删除套餐");
                        // 打开弹窗
                        $('#my-confirm2').modal({
                            relatedTarget: this,
                            onConfirm: function (options) {

                            },
                            onCancel: function () {
                            }
                        });
                    }
                    if (datas.result == 0) {
                        window.location.reload();
                    }

                }, 'json');
            },
            onCancel: function () {
            }
        });
        // 阻止链接跳转
        return false;
    });
</script>