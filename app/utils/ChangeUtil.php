<?php

// +----------------------------------------------------------------------
// | 格式转换工具
// +----------------------------------------------------------------------

namespace app\utils;

class ChangeUtil
{

    /**
     * 时间TYB转换（H:i:s、昨天、前天、Y-m-d、...）
     * @param string $timestamp 时间戳
     * @return mixed 返回TYB格式化时间
     * @author hangwei
     */
    public static function getTYBDate($timestamp)
    {
        if (!$timestamp) return '';
        // 获取今日开始时间戳和结束时间戳
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;

        // 获取昨日起始时间戳和结束时间戳
        $beginYesterday = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        $endYesterday = mktime(0, 0, 0, date('m'), date('d'), date('Y')) - 1;

        // 获取前天起始时间戳和结束时间戳
        $beginBeforeYesterday = mktime(0, 0, 0, date('m'), date('d') - 2, date('Y'));
        $endBeforeYesterday = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')) - 1;

        if ($beginToday < $timestamp && $timestamp < $endToday) {
            return date('H:i:s', $timestamp);
        } else if ($beginYesterday < $timestamp && $timestamp < $endYesterday) {
            return date('昨天');
        } else if ($beginBeforeYesterday < $timestamp && $timestamp < $endBeforeYesterday) {
            return date('前天');
        } else {
            return date('Y-m-d', $timestamp);
        }
    }

    /**
     * 数值KTB转换（格式：x万、x亿、x...）
     * @param int $num 数值
     * @param string $type 格式类型
     * @return string 返回KTB格式化数值
     * @author hangwei
     */
    public static function NumToKBT($num, $type)
    {
        if ($type == 'KTB') $unit = ['千', '万', '亿'];
        else $unit = ['K', 'B', 'T'];
        if ($num >= 1000) {
            return round($num / 1000, 2) . $unit[0];
        } else if ($num >= 10000) {
            return round($num / 10000, 2) . $unit[1];
        } else if ($num >= 100000000) {
            return round($num / 100000000, 2) . $unit[2];
        } else {
            return $num;
        }
    }

    /**
     * 数值千分格式化（格式：xxx,000,...,000）
     * @param int $num 数值
     * @return string 返回千分格式化数值
     * @author hangwei
     */
    public static function NumToThousand($num)
    {
        $patten = '/(?<=\d)(?=(?:\d\d\d)+(?!\d))/';
        return preg_replace($patten, ',', $num);
    }

    /**
     * 计算年龄
     * @param int $time 时间戳
     * @return string 返回年龄
     * @author hangwei
     */
    public static function getYears($time)
    {
        $nowYear = date('Y');
        return $nowYear - date('Y', $time);
    }

    /**
     * 根据时间戳计算星座
     * @param int $timestamp 时间戳
     * @return string 返回星座
     * @author hangwei
     */
    public static function getConstellation($timestamp)
    {
        $y = date("Y") . '-';
        $his = ' 00:00:00';
        $birth_month = date("m", $timestamp);
        $birth_date = date("d", $timestamp);
        $userTime = strtotime($y . $birth_month . '-' . $birth_date . $his);
        $januaryS = strtotime($y . '01-20' . $his);
        $januaryE = strtotime($y . '02-18' . $his);
        $februaryS = strtotime($y . '02-19' . $his);
        $februaryE = strtotime($y . '03-20' . $his);
        $marchS = strtotime($y . '03-21' . $his);
        $marchE = strtotime($y . '04-19' . $his);
        $aprilS = strtotime($y . '04-20' . $his);
        $aprilE = strtotime($y . '05-20' . $his);
        $mayS = strtotime($y . '05-21' . $his);
        $mayE = strtotime($y . '06-21' . $his);
        $juneS = strtotime($y . '06-22' . $his);
        $juneE = strtotime($y . '07-22' . $his);
        $julyS = strtotime($y . '07-23' . $his);
        $julyE = strtotime($y . '08-22' . $his);
        $augustS = strtotime($y . '08-23' . $his);
        $augustE = strtotime($y . '09-22' . $his);
        $septemberS = strtotime($y . '09-23' . $his);
        $septemberE = strtotime($y . '10-23' . $his);
        $octoberS = strtotime($y . '10-24' . $his);
        $octoberE = strtotime($y . '11-22' . $his);
        $novemberS = strtotime($y . '11-23' . $his);
        $novemberE = strtotime($y . '12-21' . $his);
        if ($userTime >= $januaryS && $userTime <= $januaryE) {
            $constellation = '水瓶座';
        } elseif ($userTime >= $februaryS && $userTime <= $februaryE) {
            $constellation = '双鱼座';
        } elseif ($userTime >= $marchS && $userTime <= $marchE) {
            $constellation = '白羊座';
        } elseif ($userTime >= $aprilS && $userTime <= $aprilE) {
            $constellation = '金牛座';
        } elseif ($userTime >= $mayS && $userTime <= $mayE) {
            $constellation = '双子座';
        } elseif ($userTime >= $juneS && $userTime <= $juneE) {
            $constellation = '巨蟹座';
        } elseif ($userTime >= $julyS && $userTime <= $julyE) {
            $constellation = '狮子座';
        } elseif ($userTime >= $augustS && $userTime <= $augustE) {
            $constellation = '处女座';
        } elseif ($userTime >= $septemberS && $userTime <= $septemberE) {
            $constellation = '天秤座';
        } elseif ($userTime >= $octoberS && $userTime <= $octoberE) {
            $constellation = '天蝎座';
        } elseif ($userTime >= $novemberS && $userTime <= $novemberE) {
            $constellation = '射手座';
        } else {
            $constellation = '摩羯座';
        }
        return $constellation;
    }
}
