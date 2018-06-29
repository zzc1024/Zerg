<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 13:53
 */

namespace app\admin\controller;


class Index extends BaseController
{
    /*
     * @return 跳转到首页
     */
    public function index()
    {
        return $this->fetch();
    }

    /*
     * @return 欢迎页面
     */
    public function welcome()
    {
        return $this->fetch();
    }
}