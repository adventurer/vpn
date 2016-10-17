<?php
namespace app;
use App\Sms;
/**
 *
 */
class Tools
{

    public static function curl($url, $ifpost = 0, $datafields = '', $cookiefile = '', $v = false)
    {
        $header = array("Connection: Keep-Alive","Accept: text/html, application/xhtml+xml, */*", "Pragma: no-cache", "Accept-Language: zh-Hans-CN,zh-Hans;q=0.8,en-US;q=0.5,en;q=0.3","User-Agent: Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $v);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $ifpost && curl_setopt($ch, CURLOPT_POST, $ifpost);
        $ifpost && curl_setopt($ch, CURLOPT_POSTFIELDS, $datafields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $cookiefile && curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        $cookiefile && curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
        $r = curl_exec($ch);
        curl_close($ch);
        return $r;
    }

    public static function checkName($string){
      $match = array();
      $zz = "/^[a-zA-Z0-9]{6,10}$/";
      preg_match($zz,$string,$match);
      if (empty($match)) {
        $response = array('sta' => 0,'msg'=>'用户名不合法' );
        die(json_encode($response));
      }
    }

    public static function checkPwd($string){
      $match = array();
      $zz = "/^[a-zA-Z0-9]{6,10}$/";
      preg_match($zz,$string,$match);
      if (empty($match)) {
        $response = array('sta' => 0,'msg'=>'密码需要为大小写字母数字的混合' );
        die(json_encode($response));
      }
    }

    public static function sms_send($to,$code,$tempId = 115186)
    {
          global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
          //主帐号,对应开官网发者主账号下的 ACCOUNT SID
          $accountSid = 'aaf98f894b353559014b457d243f0769';

          //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
          $accountToken = 'a8acc417f8754a87a955b593ccfe9292';

          //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
          //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
          $appId = '8a216da856ff04b201570241d9520155';

          //请求地址
          //沙盒环境（用于应用开发调试）：
          // sandboxapp.cloopen.com
          //生产环境（用户应用上线使用）：
          // app.cloopen.com
          $serverIP='app.cloopen.com';


          //请求端口，生产环境和沙盒环境一致
          $serverPort='8883';

          //REST版本号，在官网文档REST介绍中获得。
          $softVersion='2013-12-26';
         // 初始化REST SDK

         $rest = new Sms($serverIP,$serverPort,$softVersion);
         $rest->setAccount($accountSid,$accountToken);
         $rest->setAppId($appId);
         $datas = [$code,10];
         // 发送模板短信
        //  echo "Sending TemplateSMS to $to <br/>";
         $result = $rest->sendTemplateSMS($to,$datas,$tempId);
         if($result == NULL ) {
             echo "result error!";
         }
         if($result->statusCode!=0) {
            //  echo "error code :" . $result->statusCode . "<br>";
            //  echo "error msg :" . $result->statusMsg . "<br>";
             //TODO 添加错误处理逻辑
             return false;
         }else{
            //  echo "Sendind TemplateSMS success!<br/>";
             // 获取返回信息
             $smsmessage = $result->TemplateSMS;
            //  echo "dateCreated:".$smsmessage->dateCreated."<br/>";
            //  echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
             //TODO 添加成功处理逻辑
             return true;
         }
    }

    public static function decript($string)
    {
        $cipher = 'aes-128-cbc';
        $iv = "0f00rh0300c00a00";
        return openssl_decrypt (base64_decode($string) , $cipher ,'1f4ea6aaf637c2cbabf006433b69b6f4',true,$iv);
    }
}
