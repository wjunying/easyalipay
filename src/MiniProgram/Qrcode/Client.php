<?php

namespace EasyAlipay\Mini\Qrcode;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Mini\Model\AlipayOpenAppQrcodeContentBuilder;

class Client extends AopClient
{

    public function create(string $url_param,string $query_param,string $describe)
    {
        //构造查询业务请求参数对象
        $qrcodeContentBuilder = new AlipayOpenAppQrcodeContentBuilder();
        $qrcodeContentBuilder->setUrlParam($url_param);
        $qrcodeContentBuilder->setQueryParam($query_param);
        $qrcodeContentBuilder->setDescribe($describe);
        $request = new AopRequest ();
        $request->setBizContent($qrcodeContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.app.qrcode.create");
        return($this->execute($request, NULL, NULL)) ;
    }

}
