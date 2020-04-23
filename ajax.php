<?php 
error_reporting(0); 
$act=isset($_GET['act'])?$_GET['act']:null;
$url=isset($_GET['url'])?$_GET['url']:null;
	switch($act){
		case 'dsp':
        $json = w0ai1uoCurlGet("https://www.apibug.com/api/dsp/?url=$url", false);
        $res = json_decode($json, true);
			$name = $res['data']['title'];//名称
			$img = $res['data']['img'];//图
			$img_run = $res['data']['img'];//缩略视频
			$video = $res['data']['videourl'];//无水印视频
			if(!empty($url)){
				echo '{"code":1,"msg":"解析成功","name":"'.$name.'","url":"'.$video.'","img":"'.$img.'","img_run":"'.$img_run.'"}';
			}else{
				echo '{"code":-1,"msg":"未知错误"}';
			}
		break;
	default:
		exit('{"code":0,"msg":"No Act"}');
	break;
	}	
    //w0ai1uo Curl Get url开始
    function w0ai1uoCurlGet($url, $idFllow=false, $UserAgent = '')
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        #关闭重定向
          if($idFllow){
              curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        }
          if($UserAgent){
              curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
        }
      
      curl_setopt ($ch, CURLOPT_REFERER, $referer);
        #关闭SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        #返回数据不直接显示
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    //w0ai1uo Curl Get url结束
 ?>
