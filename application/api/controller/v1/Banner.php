<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30 0030
 * Time: 下午 16:05
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Banner as BannerModel;

class Banner extends BaseController
{
    /*
     * 获取展示banner图url
     * @url /banner
     * @http get
     * @return array banner item , code 200
     */
    public function getBanner()
    {
        $banner = BannerModel::setBannerGet();
        return json_encode($banner);
    }
}