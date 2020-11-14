<?php

// +----------------------------------------------------------------------
// | 计算工具
// +----------------------------------------------------------------------


namespace app\utils;


class CalculationUtil
{
    /**
     * 生成几位随机数
     * @param string|integer $bit 位数
     * @return mixed
     * @author hangwei
     */
    public static function getRandomNumber($bit)
    {
        $min = pow(10 , ($bit - 1));
        $max = pow(10, $bit) - 1;
        return rand($min, $max);
    }
}