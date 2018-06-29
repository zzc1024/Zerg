<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/*
 * 处理返回ajax接收的数据，转化成对应格式json数据
 * @param  code  	  int    前台判断 1成功 2失败
 * @param  message   string 前台弹窗提示
 * @param  url 	     string 跳转页面
 * @return info  	  json   前台ajax识别的json数据
 */
function Msg($code,$message='',$url='')
{
    $info = [
        'code' => $code,
        'message' => $message,
        'url' => $url
    ];
    return json_encode($info);
}