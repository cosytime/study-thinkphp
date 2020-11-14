<?php

// +----------------------------------------------------------------------
// | 远程下载工具
// +----------------------------------------------------------------------

namespace app\utils;

class DownloadUtil
{
    /**
     * 远程下载图片到本地
     * @param string $url 图片路径
     * @param string $save_dir 保存文件目录
     * @param string $filename 保存文件名称
     * @param int $type 使用的下载方式
     * @author hangwei
     * @return mixed
     */
    public static function downloadImage($url, $save_dir = 'downloads', $filename = '', $type = 0)
    {
        if (trim($url) == '') {
            return array('file_name' => '', 'save_path' => '', 'error' => 1);
        }
        if (trim($filename) == '') { //保存文件名
            $parts = parse_url($url);
            if ($parts['host'] == "thirdwx.qlogo.cn") {
                $filename = md5(time()) . '.jpg';
            } else {
                $ext = strrchr($url, '.');
                if ($ext != '.gif' && $ext != '.jpg' && $ext != '.png' && $ext != '.jpeg') {
                    return array('file_name' => '', 'save_path' => '', 'error' => 3);
                }
                $filename = md5(time()) . $ext;
            }
        }
        if (0 !== strrpos($save_dir, '/')) {
            $save_dir .= '/';
        }

        //创建保存目录
        if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {
            return array('file_name' => '', 'save_path' => '', 'error' => 5);
        }

        //获取远程文件所采用的方法
        if ($type) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $img = curl_exec($ch);
            curl_close($ch);
        } else {
            ob_start();
            readfile($url);
            $img = ob_get_contents();
            ob_end_clean();
        }
        //文件大小
        $fp2 = @fopen($save_dir . $filename, 'a');
        fwrite($fp2, $img);
        fclose($fp2);
        unset($img, $url);
        return array('file_name' => $filename, 'save_path' => $save_dir . $filename, 'error' => 0);
    }
}
