<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30 0030
 * Time: 下午 16:15
 */

namespace app\api\model;


use app\lib\enum\ImageUrl;

class Banner extends BaseModel
{
    /*
     * 隐藏字段
     */
    protected $hidden = ['id','img_id','status','create_time','update_time'];

    /*
     * 外键关联图片表
     */
    public function Image()
    {
        return $this->belongsTo('Image','img_id','id');
    }

    /*
     * 获取展示状态的banner图
     * @return banner
     */
    public static function setBannerGet()
    {
        $banner = self::with('Image')->where('status',1)->select();
        $bannerUrl = [];
        foreach ($banner as $key => $value)
        {
            $bannerUrl[$key] = ImageUrl::DOMAINURL.$value['image']['url'];
        }
        return $bannerUrl;
    }
}