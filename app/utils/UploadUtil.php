<?php

// +----------------------------------------------------------------------
// | 上传处理工具
// +----------------------------------------------------------------------

namespace app\utils;

use app\models\system\SystemResourcesModel;
use Exception;
use think\facade\Db;

class UploadUtil
{

    /**
     * 将二进制文件流保存到本地
     * @param string $dir 保存位置 ''
     * @param array $exts 限制后缀名 ["gif", "jpeg", "jpg", "png", "doc", "docx", "ppt", "pptx", "xls", "xlsx", "zip", "rar", "7z", "mp3", "mp4", "flv", "wav", "md", "txt", "pdf"]
     * @param int $max_size 限制大小 5242880
     * @param int $exp_time 资源信息过期时间 14400
     * @author hangwei
     * @return mixed 保存状态
     */
    public static function uploadFile($dir = '', $max_size = 5242880, $exp_time = 14400, $exts = ["gif", "jpeg", "jpg", "png", "doc", "docx", "ppt", "pptx", "xls", "xlsx", "zip", "rar", "7z", "mp3", "mp4", "flv", "wav", "md", "txt", "pdf"])
    {
        $file = $_FILES["file"]; // 文件
        $error = $file["error"]; // 由文件上传导致的错误代码
        $name = $file["name"]; // 文件的名称
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION)); // 文件拓展名
        $mime = $file["type"]; // 文件的类型
        $size = $file["size"]; // 文件的大小，以字节计
        $tmp_name = $file["tmp_name"]; // 存储在服务器的文件的临时副本的名称
        if (!$file || $error > 0) return ['code' => 20000, 'msg' => '文件信息不完整'];  // 文件信息不完整
        if ($size > $max_size) return ['code' => 20001, 'msg' => '文件大小超过限制']; // 文件大小超过限制
        if (!in_array($ext, $exts)) return ['code' => 20002, 'msg' => '不支持的文件拓展名']; // 不支持的文件拓展名
        // 创建文件夹
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if (!$dir) {
            $dir = iconv("UTF-8", "GBK", "uploads/" . $year . '/' . $month . '/' . $day . '/');
            if (!file_exists($dir)) mkdir($dir, 0777, true);
        }
        // 生成文件名称
        $unix = microtime(true);
        $time = explode(".", $unix);
        $fileName = md5(date("YmdHisms", $time[0]) . $time[1]);
        $filePath = $dir . $fileName . $ext;
        // 启动事务
        Db::startTrans();
        try {
            move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
            $fileType = self::getFileType($ext);
            $data = ['name' => $fileName, 'url' => $filePath, 'size' => $size, 'mime' => $mime, 'type' => $fileType, 'time' => time(), 'exp_time' => $exp_time];
            if ($fileType == 1) {
                $imgInfo = getimagesize($filePath);
                array_push($data, ['width' => $imgInfo['width']], ['height' => $imgInfo['height']]);
            }
            SystemResourcesModel::add([$data]);
            // 提交事务
            Db::commit();
            return ['code' => 0, 'msg' => '请求成功', 'data' => ['name' => $fileName, 'url' => $filePath]];
        } catch (Exception $e) {
            // 回滚事务
            Db::rollback();
            return ['code' => 20003, 'msg' => '文件上传失败'];
        }
    }

    /**
     * 判断文件类型
     * @param string $ext 文件后缀名
     * @author hangwei
     * @return int 文件类型
     * @note 类型 1 图片，2 视频，3 音乐，4 文档，5 压缩包，6 文件，7 其他
     */
    private static function getFileType($ext)
    {
        $image = ["gif", "jpeg", "jpg", "png"];
        $video = ["mp4", "flv"];
        $music = ["mp3", "wav"];
        $doc = ["doc", "docx", "ppt", "pptx", "xls", "xlsx", "md", "txt", "pdf"];
        $zip = ["zip", "rar", "7z"];
        $file = ["apk"];
        if (in_array($ext, $image)) return 1;
        else if (in_array($ext, $video)) return 2;
        else if (in_array($ext, $music)) return 3;
        else if (in_array($ext, $doc)) return 4;
        else if (in_array($ext, $zip)) return 5;
        else if (in_array($ext, $file)) return 6;
        else return 7;
    }
}
