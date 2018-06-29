<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 15:41
 */

namespace app\admin\model;


use think\Request;

class Banner extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /*
     * 一对多关联image表
     */
    public function image()
    {
        return $this->belongsTo('Image','img_id','id');
    }

    /*
     * @return $banner array banner列表展示数据
     */
    public function getBanner()
    {
        $banner = self::with('image')->select();
        return $banner;
    }

    /*
     * 添加banner图
     */
    public function addBanner()
    {
        $imgPath = $this->moveImage('./static/admin/img');
        $imgPath = str_replace('\\', '/',$imgPath);
        $imgPath = '/static/admin/img/'.$imgPath;
        $imgID = $this->addImageUrl($imgPath);
        if (!$imgID)
            exit(Msg(2,'添加失败，请稍后重试'));
        $addBanner = self::save([
            'img_id'=>$imgID,
            'status'=>0
        ]);
        if ($addBanner)
            exit(Msg(1,'添加成功'));
        else
            exit(Msg(2,'添加失败，请稍后重试'));
    }

    /*
     * 展示和停用banner图
     */
    public function setBannerStatus()
    {
        $request = Request::instance();
        $params = $request->param();
        if ($params['status'] == 1)
        {
            $noBannerCount = self::where('status',1)->count();
            if ($noBannerCount >= 3)
                exit(Msg(2,'展示banner不能超过3条'));
        }
        $setStatus = $this->setStatus('banner',$params['id'],$params['status']);
        if ($setStatus)
            exit(Msg(1));
        else
            exit(Msg(2,'失败了，请稍后重试'));
    }

    /*
     * 删除banner图
     */
    public function deleteBanner()
    {
        $request = Request::instance();
        $bannerID = $request->param('id');
        $imageID = self::where('id',$bannerID)->field('img_id')->find()['img_id'];
        $deleteBanner = self::destroy($bannerID);
        if (!$deleteBanner)
            exit(Msg(2,'删除失败，请稍后重试'));
        else
            $this->deleteImage($imageID);
            exit(Msg(1,'删除成功'));
    }
}