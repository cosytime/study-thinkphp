<?php

// +----------------------------------------------------------------------
// | 发送信息工具
// +----------------------------------------------------------------------

namespace app\utils;

use app\models\system\SystemEmailLogModel;
use DateTime;
use PHPMailer\PHPMailer\Exception;
use think\exception\ValidateException;
use \PHPMailer\PHPMailer\PHPMailer;
use Throwable;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class SendUtil
{

    /**
     * 发送短信验证码（阿里云）
     * @param string $PhoneNumbers 接收短信的手机号码
     * @param string $Code 短信验证码
     * @return mixed
     * @throws ClientException
     * @throws Throwable
     */
    public static function sendCodeBySMS($PhoneNumbers, $Code)
    {
        $AccessKeyID = ConfigUtil::getConfig('aliyun:accesskeyid');
        $AccessKeySecret = ConfigUtil::getConfig('aliyun:accesskey_secret');
        $SignName = ConfigUtil::getConfig('aliyun:sms:sign_name');
        $TemplateCode = ConfigUtil::getConfig('aliyun:sms:template_code');

        AlibabaCloud::accessKeyClient($AccessKeyID, $AccessKeySecret)
            ->regionId('cn-hangzhou')
            ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => $PhoneNumbers,
                        'SignName' => $SignName,
                        'TemplateCode' => $TemplateCode,
                        'TemplateParam' => json_encode(['code' => $Code])
                    ],
                ])
                ->request();
            return $result->toArray();
        } catch (ClientException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        }

    }

    /**
     * 发送短信验证码（DCloud）
     * @param string $PhoneNumbers 接收短信的手机号码
     * @param string $Code 短信验证码
     * @return mixed
     * @throws Throwable
     * @todo 开发未完成
     */
    public static function sendCodeBySMSFromDCloud($PhoneNumbers, $Code)
    {
        $AccessKeyID = ConfigUtil::getConfig('dcloud:accesskeyid');
        $AccessKeySecret = ConfigUtil::getConfig('dcloud:accesskey_secret');
        $url = ConfigUtil::getConfig('dcloud:sms_api');
        $data = ['AccessKeyID' => $AccessKeyID, 'AccessKeySecret' => $AccessKeySecret, 'PhoneNumbers' => $PhoneNumbers, 'Code' => $Code];
//        $postdata = http_build_query($data);
        $postdata = json_encode($data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 5 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }

    /**
     * 发送注册验证码邮件
     * @param string $toEmail 收件人邮箱
     * @param string $userName 用户名
     * @param string $code 验证码
     * @return bool|string|string[]
     * @throws Exception
     * @throws Throwable
     * @author hangwei
     */
    public static function sendRegistrationCodeByEmail($toEmail, $userName, $code)
    {
        $year = (new DateTime)->format("Y");
        $title = ConfigUtil::getConfig('email:activate:title'); // 邮件标题
        $help = ConfigUtil::getConfig('email:base:help');  // 帮助文档地址
        $team = ConfigUtil::getConfig('email:base:team');  // 团队名称
        $teamAll = ConfigUtil::getConfig('email:base:team_all');  // 团队全称
        $teamURL = ConfigUtil::getConfig('email:base:url');  // 团队官网
        $logoTop = ConfigUtil::getConfig('email:base:logo_top');  // 顶部图片
        $logoBottom = ConfigUtil::getConfig('email:base:logo_bottom');  // 顶部图片
        $email = ConfigUtil::getConfig('email:base:email');  // 联系邮箱
        $phone = ConfigUtil::getConfig('email:base:phone');  // 联系电话
        $body = "
<table style='argin:0px;padding-left: 20px;padding-right: 20px;max-width: 700px;margin: auto;width: 100%;'>
    <tbody>
        <tr>
            <td>
                <div>
                    <table style='max-width: 700px; width: 100%;margin-top: 5px;'>
                        <tbody>
                            <tr style='height: 30px;width: 100%;'>
                                <td style='width: 50%;vertical-align:bottom;' valign='bottom'>
                                    <img style='vertical-align: middle;' width='180px' height='25px'
                                        title='SOFTWARE DEVELOPMENT' src=$logoTop alt='logo'>
                                </td>
                                <td style='width: 50%;vertical-align:bottom;color:#76808E;font-size:12px;' align='right'
                                    valign='bottom'>专注前沿开发技术</td>
                            </tr>
                            <tr style='width:100%;'>
                                <td colspan='2'
                                    style='width: 100%;border-bottom-color: #ccc;border-bottom-width: 1px; border-bottom-style: solid;height: 15px;'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table style='max-width: 700px; width: 100%;'>
                    <tbody>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td
                                                style='height: 33px;padding: 30px 20px 10px 20px;font-size: 20px;color: #212e40;'>
                                                Hi $userName ，
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style='font-size: 20px;  padding: 10px 20px;color: #212e40;font-weight: normal;'>
                                                您在团队 $team 中注册了账户，若非您本人操作请忽略。
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 14px;color: #212e40;  padding: 10px 20px;'>
                                                请输入以下验证码完成注册（5分钟内有效）：
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign='left' style='font-size: 36px;color: #323A45;'>
                                                <div style='background: #F2F2F7;border-radius: 2px;margin: 10px 20px;'>
                                                    <div style='font-size: 14px;line-height: 14px; padding: 20px 20px 10px 20px;'>
                                                      <span style='font-size: 26px'>验证码：</span>  <a style='color: #5098E8;text-decoration: none;font-size:26px;' onclick='return false;'>$code</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 12px; color: #76808E;' valign='center'>
                                                <p style='margin: 8px 0;'>每天最多可发送3条验证码，每条验证码5分钟内有效。</p>
                                                <p style='margin: 8px 0;'>若您有任何疑问，请随时联系我们：<a
                                                        style='color:#5098E8;text-decoration:none' href='mailto:$email'
                                                        rel='noopener' target='_blank'>$email</a></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"padding: 20px 20px 20px 20px\">
                                                $teamAll
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <table
                        style='max-width: 700px; width:100%; font-size:14px; text-align: center;padding-top:20px;color:#76808E;'>
                        <tbody style='width: 100%;'>
                            <tr style='width:100%;'>
                                <td colspan='2'
                                    style='height: 15px;width:100%;border-top-color: #ccc;  border-top-width: 1px;  border-top-style: solid;'>
                                </td>
                            </tr>
                            <tr style='width: 100%;'>
                                <td>如您对 $team 有任何疑问, 请随时与我们联系。</td>
                            </tr>
                            <tr>
                                <td>
                                    <a style='text-align: center;line-height: 24px;color: #76808E;text-decoration: none;'
                                        href=$help rel='noopener' target='_blank'>帮助文档</a>
                                    <i style='font-style: normal;margin:5px;'>|</i>
                                    <span>联系电话</span>:<a style='color: #5098E8;text-decoration: none;margin-left:10px;'
                                        onclick='return false;'>$phone</a>
                                    <i style='font-style: normal;margin:5px;'>|</i>
                                    <span>邮箱</span>:<a style='color: #5098E8;text-decoration: none;margin-left:10px;'
                                        class='link_color' href='mailto:$email' rel='noopener'
                                        target='_blank'>$email</a>
                                </td>
                            </tr>
                            <tr>
                                <td><img title='SOFTWARE DEVELOPMENT' width='50px' height='50px' src=$logoBottom
                                        alt='logo' /></td>
                            </tr>
                            <tr>
                                <td style='line-height: 0;font-size: 12px;'>Copyright &copy;$year <a href=$teamURL
                                        style='text-decoration: none;color:#323A45' rel='noopener'
                                        target='_blank'>$team</a> All Rights
                                    Reserved.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
</table>
        ";
        return self::sendEmail($toEmail, $title, $body);
    }

    /**
     * 发送注册验证邮件
     * @param string $toEmail 收件人邮箱
     * @param string $userName 用户名
     * @param string $token 验证码
     * @return bool|string|string[]
     * @throws Exception
     * @throws Throwable
     * @author hangwei
     */
    public static function sendRegistrationVerificationByEmail($toEmail, $userName, $token)
    {
        $year = (new DateTime)->format("Y");
        $title = ConfigUtil::getConfig('email:activate:title'); // 邮件标题
        $help = ConfigUtil::getConfig('email:base:help');  // 帮助文档地址
        $team = ConfigUtil::getConfig('email:base:team');  // 团队名称
        $teamAll = ConfigUtil::getConfig('email:base:team_all');  // 团队全称
        $teamURL = ConfigUtil::getConfig('email:base:url');  // 团队官网
        $activateURL = ConfigUtil::getConfig('email:activate:url') . '?token=' . $token;  // 账户验证地址
        $logoTop = ConfigUtil::getConfig('email:base:logo_top');  // 顶部图片
        $logoBottom = ConfigUtil::getConfig('email:base:logo_bottom');  // 顶部图片
        $email = ConfigUtil::getConfig('email:base:email');  // 联系邮箱
        $phone = ConfigUtil::getConfig('email:base:phone');  // 联系电话
        $body = "
<table style='argin:0px;padding-left: 20px;padding-right: 20px;max-width: 700px;margin: auto;width: 100%;'>
    <tbody>
        <tr>
            <td>
                <div>
                    <table style='max-width: 700px; width: 100%;margin-top: 5px;'>
                        <tbody>
                            <tr style='height: 30px;width: 100%;'>
                                <td style='width: 50%;vertical-align:bottom;' valign='bottom'>
                                    <img style='vertical-align: middle;' width='180px' height='25px'
                                        title='SOFTWARE DEVELOPMENT' src=$logoTop alt='logo'>
                                </td>
                                <td style='width: 50%;vertical-align:bottom;color:#76808E;font-size:12px;' align='right'
                                    valign='bottom'>专注前沿开发技术</td>
                            </tr>
                            <tr style='width:100%;'>
                                <td colspan='2'
                                    style='width: 100%;border-bottom-color: #ccc;border-bottom-width: 1px; border-bottom-style: solid;height: 15px;'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table style='max-width: 700px; width: 100%;'>
                    <tbody>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td
                                                style='height: 33px;padding: 30px 20px 10px 20px;font-size: 20px;color: #212e40;'>
                                                Hi $userName ，
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style='font-size: 20px;  padding: 10px 20px;color: #212e40;font-weight: normal;'>
                                                您在团队 $team 中的注册了账户，若非您本人操作请忽略。
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 14px;color: #212e40;  padding: 10px 20px;'>
                                                请点击以下链接完成注册验证（2小时内有效）：
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign='left' style='font-size: 36px;color: #323A45;'>
                                                <div style='background: #F2F2F7;border-radius: 2px;margin: 10px 20px;'>
                                                    <div
                                                        style='font-size: 14px;line-height: 14px; padding: 20px 20px 10px 20px;'>
                                                        <a href=$activateURL rel='noopener'
                                                            target='_blank'>$activateURL</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 12px; color: #76808E;' valign='center'>
                                                <p style='margin: 8px 0;'>如果点击以上链接无效，请尝试将链接复制到浏览器地址栏访问。</p>
                                                <p style='margin: 8px 0;'>若您有任何疑问，请随时联系我们：<a
                                                        style='color:#5098E8;text-decoration:none' href='mailto:$email'
                                                        rel='noopener' target='_blank'>$email</a></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"padding: 20px 20px 20px 20px\">
                                                $teamAll
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <table
                        style='max-width: 700px; width:100%; font-size:14px; text-align: center;padding-top:20px;color:#76808E;'>
                        <tbody style='width: 100%;'>
                            <tr style='width:100%;'>
                                <td colspan='2'
                                    style='height: 15px;width:100%;border-top-color: #ccc;  border-top-width: 1px;  border-top-style: solid;'>
                                </td>
                            </tr>
                            <tr style='width: 100%;'>
                                <td>如您对 $team 有任何疑问, 请随时与我们联系。</td>
                            </tr>
                            <tr>
                                <td>
                                    <a style='text-align: center;line-height: 24px;color: #76808E;text-decoration: none;'
                                        href=$help rel='noopener' target='_blank'>帮助文档</a>
                                    <i style='font-style: normal;margin:5px;'>|</i>
                                    <span>联系电话</span>:<a style='color: #5098E8;text-decoration: none;margin-left:10px;'
                                        onclick='return false;'>$phone</a>
                                    <i style='font-style: normal;margin:5px;'>|</i>
                                    <span>邮箱</span>:<a style='color: #5098E8;text-decoration: none;margin-left:10px;'
                                        class='link_color' href='mailto:$email' rel='noopener'
                                        target='_blank'>$email</a>
                                </td>
                            </tr>
                            <tr>
                                <td><img title='SOFTWARE DEVELOPMENT' width='50px' height='50px' src=$logoBottom
                                        alt='logo' /></td>
                            </tr>
                            <tr>
                                <td style='line-height: 0;font-size: 12px;'>Copyright &copy;$year <a href=$teamURL
                                        style='text-decoration: none;color:#323A45' rel='noopener'
                                        target='_blank'>$team</a> All Rights
                                    Reserved.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
</table>
        ";
        return self::sendEmail($toEmail, $title, $body);
    }

    /**
     * 发送注册成功邮件
     * @param string $toEmail 收件人邮箱
     * @param string $userName 用户名
     * @param string $accountEmail 用户邮箱账户
     * @return bool|string|string[]
     * @throws Exception
     * @throws Throwable
     * @author hangwei
     */
    public static function sendRegistrationSuccessByEmail($toEmail, $userName, $accountEmail)
    {
        $year = (new DateTime)->format("Y");
        $title = ConfigUtil::getConfig('email:register:title'); // 邮件标题
        $login = ConfigUtil::getConfig('email:base:login');  // 登录地址
        $help = ConfigUtil::getConfig('email:base:help');  // 帮助文档地址
        $team = ConfigUtil::getConfig('email:base:team');  // 团队名称
        $teamAll = ConfigUtil::getConfig('email:base:team_all');  // 团队全称
        $teamURL = ConfigUtil::getConfig('email:base:url');  // 团队官网
        $logoTop = ConfigUtil::getConfig('email:base:logo_top');  // 顶部图片
        $logoBottom = ConfigUtil::getConfig('email:base:logo_bottom');  // 顶部图片
        $email = ConfigUtil::getConfig('email:base:email');  // 联系邮箱
        $phone = ConfigUtil::getConfig('email:base:phone');  // 联系电话
        $body = "
<table style='argin:0px;padding-left: 20px;padding-right: 20px;max-width: 700px;margin: auto;width: 100%;'>
    <tbody>
        <tr>
            <td>
                <div>
                    <table style='max-width: 700px; width: 100%;margin-top: 5px;'>
                        <tbody>
                            <tr style='height: 30px;width: 100%;'>
                                <td style='width: 50%;vertical-align:bottom;' valign='bottom'>
                                    <img style='vertical-align: middle;' width='180px' height='25px'
                                        title='SOFTWARE DEVELOPMENT' src=$logoTop alt='logo'>
                                </td>
                                <td style='width: 50%;vertical-align:bottom;color:#76808E;font-size:12px;' align='right'
                                    valign='bottom'>专注前沿开发技术</td>
                            </tr>
                            <tr style='width:100%;'>
                                <td colspan='2'
                                    style='width: 100%;border-bottom-color: #ccc;border-bottom-width: 1px; border-bottom-style: solid;height: 15px;'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table style='max-width: 700px; width: 100%;'>
                    <tbody>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td
                                                style='height: 33px;padding: 30px 20px 10px 20px;font-size: 20px;color: #212e40;'>
                                                Hi $userName ，
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style='font-size: 20px;  padding: 10px 20px;color: #212e40;font-weight: normal;'>
                                                您在团队 $team 中的账户已注册成功。
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 14px;color: #212e40;  padding: 10px 20px;'>
                                                以下是您的团队信息：
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign='left' style='font-size: 36px;color: #323A45;'>
                                                <div style='background: #F2F2F7;border-radius: 2px;margin: 10px 20px;'>
                                                    <div
                                                        style='font-size: 14px;line-height: 14px; padding: 20px 20px 10px 20px;'>
                                                        登录地址：<a href=$login rel='noopener' target='_blank'>$login</a>
                                                    </div>
                                                    <div
                                                        style='font-size: 14px;line-height: 14px; padding: 10px 20px 20px 20px;'>
                                                        登录账户：<a href='mailto:$accountEmail' rel='noopener'
                                                            target='_blank'>$accountEmail</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 20px 20px 20px 20px;font-size: 14px;'>
                                                <p style='margin: 8px 0;'>若您有任何疑问，请随时联系我们：<a
                                                        style='color:#5098E8;text-decoration:none' href='mailto:$email'
                                                        rel='noopener' target='_blank'>$email</a></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-size: 14px; color: #323A45; padding-left: 20px;'>
                                                $teamAll
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <table
                        style='max-width: 700px; width:100%; font-size:14px; text-align: center;padding-top:20px;color:#76808E;'>
                        <tbody style='width: 100%;'>
                            <tr style='width:100%;'>
                                <td colspan='2'
                                    style='height: 15px;width:100%;border-top-color: #ccc;  border-top-width: 1px;  border-top-style: solid;'>
                                </td>
                            </tr>
                            <tr style='width: 100%;'>
                                <td>如您对 $team 有任何疑问, 请随时与我们联系。</td>
                            </tr>
                            <tr>
                                <td>
                                    <a style='text-align: center;line-height: 24px;color: #76808E;text-decoration: none;'
                                        href=$help rel='noopener' target='_blank'>帮助文档</a>
                                    <i style='font-style: normal;margin:5px;'>|</i>
                                    <span>联系电话</span>:<a style='color: #5098E8;text-decoration: none;margin-left:10px;'
                                        onclick='return false;'>$phone</a>
                                    <i style='font-style: normal;margin:5px;'>|</i>
                                    <span>邮箱</span>:<a style='color: #5098E8;text-decoration: none;margin-left:10px;'
                                        class='link_color' href='mailto:$email' rel='noopener'
                                        target='_blank'>$email</a>
                                </td>
                            </tr>
                            <tr>
                                <td><img title='SOFTWARE DEVELOPMENT' width='50px' height='50px' src=$logoBottom
                                        alt='logo' /></td>
                            </tr>
                            <tr>
                                <td style='line-height: 0;font-size: 12px;'>Copyright &copy;$year <a href=$teamURL style='text-decoration: none;color:#323A45' rel='noopener' target='_blank'>$team</a> All Rights
                                    Reserved.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
</table>
        ";
        return self::sendEmail($toEmail, $title, $body);
    }

    /**
     * 发送邮件
     * @param string $toEmali // 收件人邮箱
     * @param string $title // 邮件标题
     * @param string $body // 邮件正文
     * @param string $oper_id // 操作用户ID
     * @param string $oper_name // 操作用户
     * @param string $addCC // 邮件抄送人
     * @param string $addBCC // 秘密抄送人
     * @param string $addAttachment // 添加附件
     * @return mixed 发送状态
     * @throws Exception
     * @throws Throwable
     * @author hangwei
     */
    public static function sendEmail($toEmali, $title, $body, $oper_id = '0', $oper_name = '系统自动发送', $addCC = "", $addBCC = "", $addAttachment = "")
    {
        try {
            $charSet = ConfigUtil::getConfig('email:char_set');
            $isSMTP = ConfigUtil::getConfig('emai:is_smtp');
            $isHTML = ConfigUtil::getConfig('email:is_html');
            $host = ConfigUtil::getConfig('email:host');
            $isMTPAuth = ConfigUtil::getConfig('email:smtp_auth');
            $username = ConfigUtil::getConfig('email:username');
            $password = ConfigUtil::getConfig('email:password');
            $sMTPSecure = ConfigUtil::getConfig('email:smtp_secure');
            $port = ConfigUtil::getConfig('email:port');
            $fromName = ConfigUtil::getConfig('email:from_name');
            $replyToEmail = ConfigUtil::getConfig('email:reply_to');
            $mail = new PHPMailer();
            if ($isSMTP === '0') {
                $mail->isSMTP(); // 使用SMTP服务
            }
            if ($isHTML === '0') {
                $mail->IsHTML(true); // 支持html格式内容（如果想在邮件内定义超链接等html代码，就要开始此选项）
            }
            $mail->CharSet = $charSet; // 编码格式为utf8，不设置编码的话，中文会出现乱码
            $mail->Host = $host; // 发送方的SMTP服务器地址
            if ($isMTPAuth === '0') {
                $mail->SMTPAuth = true; // 是否使用身份验证
            } else {
                $mail->SMTPAuth = false; // 是否使用身份验证
            }
            $mail->Username = $username; // 发信邮箱
            $mail->Password = $password; // SMTP密码或授权码（QQ、163）
            $mail->SMTPSecure = $sMTPSecure; // 本体可以暂时使用tls,更新外网使用ssl协议方式
            $mail->Port = $port; // 邮箱的ssl协议方式端口号是465/587
            $mail->setFrom($username, $fromName); // 设置发件人信息，如邮件格式说明中的发件人
            $mail->addAddress($toEmali); // 设置收件人信息，如邮件格式说明中的收件人
            $mail->addReplyto($replyToEmail); // 收件人收到地址后回复给哪个邮箱
            $mail->addCC($addCC); // 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
            $mail->addBCC($addBCC); // 设置秘密抄送人(这个人也能收到邮件)
            $mail->addAttachment($addAttachment); // 添加附件
            $mail->Subject = $title; // 邮件标题
            $mail->Body = $body; // 邮件正文
            $query = ['title' => $title,
                'body' => $body,
                'from_email' => $username,
                'to_email' => $toEmali,
                'status' => '0',
                'errinfo' => '发送成功',
                'addcc_email' => $addCC,
                'addbcc_email' => $addBCC,
                'oper_time' => time(),
                'oper_id' => $oper_id,
                'oper_name' => $oper_name
            ];
            if ($mail->send()) {
                SystemEmailLogModel::add($query);
                return ['errcode' => 0]; // 邮件发送成功
            } else {
                $msg = str_replace(' https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting', '', $mail->ErrorInfo);
                $query['status'] = '1';
                $query['errinfo'] = $msg;
                SystemEmailLogModel::add($query);
                return ['errcode' => 1, 'msg' => $msg]; // 邮件发送失败
            }
        } catch (ValidateException $e) {
            return $e->getError();
        }
    }
}