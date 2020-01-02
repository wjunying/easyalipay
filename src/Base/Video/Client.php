<?php

namespace EasyAlipay\Base\Video;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Base\Model\AlipayOfflineMaterialImageUploadContentBuilder;

class Client extends AopClient
{
    public function upload(string $image_name,String $image_content)
    {
        //构造查询业务请求参数对象
        $imageUploadContentBuilder = new AlipayOfflineMaterialImageUploadContentBuilder();
        $imageUploadContentBuilder->getImageType("mp4");
        $imageUploadContentBuilder->setImageName($image_name);
        $imageUploadContentBuilder->setImageContent($image_content);
        $request = new AopRequest ();
        $request->setBizContent($imageUploadContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.offline.material.image.upload");
        return($this->execute($request, NULL, NULL)) ;
    }

}
