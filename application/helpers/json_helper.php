<?php

/**
 * API专用json编码辅助函数
 * -------------------------
 * @author 游浩 <383145975@qq.com>
 * PHP >= 5.4.0
 */

/**
 * 递归遍历数组替换null为""
 * @param array OR object-array
 */
if (!function_exists('_replace_null'))
{
    function _replace_null($val)
    {
        if (is_object($val))
        {
            $val = (array)$val;
        }
        if (is_array($val))
        {
            return array_map(__FUNCTION__, $val);
        }
        return is_null($val) ? '' : $val;
    }
}

/**
 * json编码
 * @param array OR object-array
 * 兼容iOS：替换null为""
 * 节约流量：不转义中文、斜杠
 */
if (!function_exists('api_json_encode'))
{
    function api_json_encode($val)
    {
        // 替换null为""
        $val = _replace_null($val);
        // 不转义中文、斜杠
        return json_encode($val, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}

/**
 * jsonp编码
 * @param array OR object-array
 * 判断是否为jsonp请求，并返回jsonp格式，如果非jsonp请求则返回json格式
 */
if (!function_exists('api_jsonp_encode'))
{
    function api_jsonp_encode($val)
    {
        $json = api_json_encode($val);
        if (!empty($_GET['callbak']))
        {
            return $_GET['callbak'] . '(' . $json . ')'; // jsonp
        }
        return $json; // json
    }
}
/**var_dump格式化
 * @param null $mixed
 * @return null
 */
if (!function_exists('var_dump_pre'))
{
    function var_dump_pre($data = array())
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        return array();
    }
}



