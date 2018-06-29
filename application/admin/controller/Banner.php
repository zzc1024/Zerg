<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 15:18
 */

namespace app\admin\controller;

use app\admin\model\Banner as BannerModel;
use app\admin\validate\BaseValidate;

class Banner extends BaseController
{
    /*
     * @banner array banner列表数据
     * @return 展示管理 - banner列表页面
     */
    public function goBannerIndex()
    {
        $bannerModel = new BannerModel();
        $banner = $bannerModel->getBanner();
        $this->assign('result',$banner);
        return $this->fetch('index');
    }

    /*
     * @return banner列表 - 添加banner页面
     */
    public function goBannerAdd()
    {
        return $this->fetch('add');
    }

    /*
     * 添加banner图
     */
    public function setBannerAdd()
    {
        (new BaseValidate())->getFileCheck();
        $bannerModel = new BannerModel();
        $bannerModel->addBanner();
    }

    /*
     * 展示和停用banner图，最多展示3张
     */
    public function setBannerStatus()
    {
        $bannerModel = new BannerModel();
        $bannerModel->setBannerStatus();
    }

    /*
     * 删除banner图
     */
    public function setBannerDelete()
    {
        $bannerModel = new BannerModel();
        $bannerModel->deleteBanner();
    }
}