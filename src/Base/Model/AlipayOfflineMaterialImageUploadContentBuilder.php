<?php

namespace EasyAlipay\Base\Image\Model;

/* *
 * 功能：alipay.offline.material.image.upload （上传门店照片和视频）接口业务参数封装
 */
class AlipayOfflineMaterialImageUploadContentBuilder
{

    // 图片/视频格式
    private $imageType;

    // 图片/视频名称
    private $imageName;

    // 图片/视频二进制内容，图片/视频大小不能超过5M
    private $imageContent;
    
    private $bizContentarr = array();

    private $bizContent = NULL;

    public function getBizContent()
    {
        if(!empty($this->bizContentarr)){
            $this->bizContent = json_encode($this->bizContentarr,JSON_UNESCAPED_UNICODE);
        }
        return $this->bizContent;
    }

    public function getImageType()
    {
        return $this->imageType;
    }

    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
        $this->bizContentarr['image_type'] = $imageType;
    }

    public function getImageName()
    {
        return $this->imageName;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        $this->bizContentarr['image_name'] = $imageName;
    }

    public function getImageContent()
    {
        return $this->imageContent;
    }

    public function setImageContent($imageContent)
    {
        $this->imageContent = $imageContent;
        $this->bizContentarr['image_content'] = $imageContent;
    }
}

?>