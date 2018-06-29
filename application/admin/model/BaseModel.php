<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 15:40
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class BaseModel extends Model
{
    /*
     * 启用与停用
     * @table string 表名
     * @id int 需要修改数据的id
     * @status int 修改状态
     */
    protected function setStatus($table,$id,$status)
    {
        $setStatus = Db::table($table)->where('id',$id)->update(['status'=>$status]);
        if (!$setStatus)
            return false;
        else
            return true;
    }

    /*
     * 保存上传的图片
     * @path 保存路径
     * @return 图片路径
     */
    protected function moveImage($path)
    {
        $image = request()->file('image');
        $info = $image->validate(['ext'=>'jpg,png,jpeg'])->move($path);
        if ($info)
            return $info->getSaveName();
        else
            exit(Msg(2,$info->getError()));
    }

    /*
     * 添加图片路径到数据库
     * @url string 图片路径
     * @return int 返回自增id
     */
    protected function addImageUrl($url)
    {
        $addImageUlr = Image::create([
            'url' => $url
        ]);
        if (!$addImageUlr)
            return false;
        return $addImageUlr->id;
    }

    /*
     * 删除图片，数据库数据和本地图片
     * @id int 图片id
     */
    protected function deleteImage($id)
    {
        $imageUrl = Image::where('id',$id)->find()['url'];
        $imageUrl = substr_replace($imageUrl,"",0,1);
        Image::destroy($id);
        unlink($imageUrl);
    }
}