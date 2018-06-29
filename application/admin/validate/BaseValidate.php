<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 16:41
 */

namespace app\admin\validate;


use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /*
     *  检测客户端发来的参数是否符合验证类规则
     * @params 获取参数
     */
    public function getCheck()
    {
        $request = Request::instance();
        $params = $request->param();
        if (!$this->check($params))
        {
            exit(Msg(2,$this->getError()));
        }
    }

    /*
     *  检测客户端上传文件
     * @params 获取参数
     */
    public function getFileCheck()
    {
        $params = request()->file();
        if (!$params)
        {
            exit(Msg(2,'请上传文件'));
        }
    }
}