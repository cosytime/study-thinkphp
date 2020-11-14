<?php
// +----------------------------------------------------------------------
// | 应用公共函数文件
// +----------------------------------------------------------------------
use think\facade\Request;

/**
 * 下划线转驼峰
 * @param string $str 字符串
 * @return string|string[] 返回下划线转驼峰后的字符串
 */
function convertUnderline2($str)
{
    $str = preg_replace_callback('/([-_]+([a-z]))/i', function ($matches) {
        return strtoupper($matches[2]);
    }, $str);
    return $str;
}

/**
 * 接口数据返回统一方法
 * @param string $data 返回数据
 * @param int $code 返回状态码
 * @param string $msg 状态信息
 * @return string|string[] 返回处理后JSON
 * @author hangwei
 * @note code状态码，0 表示请求正常，10000~19999 为系统保留，其余 20000~99999 可根据功能自由划分，操作异常请直接抛出异常不要使用全局返回码！
 */
function returnJson($data = null, $code = 0, $msg = 'ok')
{
    return json(['code' => $code, 'msg' => $msg, 'data' => $data, 'method' => Request::method(), 'url' => Request::baseUrl()]);
}

/**
 * 字符串替换
 * @param string $string 需要替换的字符串
 * @param int $start 开始的保留几位
 * @param int $end 最后保留几位
 * @return string 返回替换后的字符串
 */
function strReplace($string, $start, $end)
{
    $strlen = mb_strlen($string, 'UTF-8');//获取字符串长度
    $firstStr = mb_substr($string, 0, $start, 'UTF-8');//获取第一位
    $lastStr = mb_substr($string, -1, $end, 'UTF-8');//获取最后一位
    return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($string, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
}

/**
 * 敏感词过滤
 * @param string $str 字符串
 * @return string 返回过滤后的字符串
 */
function sensitive_words_filter($str)
{
    if (!$str) return '';
    $file = app()->getAppPath() . 'public/static/plug/censorwords/CensorWords';
    $words = file($file);
    foreach ($words as $word) {
        $word = str_replace(array("\r\n", "\r", "\n", "/", "<", ">", "=", " "), '', $word);
        if (!$word) continue;
        $ret = preg_match("/$word/", $str, $match);
        if ($ret) {
            return $match[0];
        }
    }
    return '*';
}

/**
 * 判断二维数组中是否存在某个一维数组
 * @param array $arrays 二维数组
 * @param array $row 需要对比的一维数组
 * @param string|integer $key 判定为相同数组的键
 * @return bool
 */
function ArrayInArrays($arrays, $row, $key = 0)
{
    $flag = false;
    foreach ($arrays as $array) {
        if ($array[$key] === $row[$key]) {
            $flag = true;
        }
    }
    return $flag;
}

/**
 * 构建WHERE条件
 * @param array $sets 条件
 * @param array $params 参数
 * @return mixed 返回构建出的where条件
 */
function CreateWhere($params, $sets)
{
    $where = [];
    foreach ($sets as $set) {
        if (isset($params[$set]) && $params[$set] !== '') {
            array_push($where, [$set, '=', $params[$set]]);
        }
    }
    return $where;
}