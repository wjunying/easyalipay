<?php

namespace EasyAlipay\Mini\Risk;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Mini\Model\AlipaySecurityRiskContentDetectBuilder;

class Client extends AopClient
{

    public function detectContent(string $content)
    {
        //构造查询业务请求参数对象
        $riskContentBuilder = new AlipaySecurityRiskContentDetectBuilder();
        $riskContentBuilder->setContent($content);
        $request = new AopRequest ();
        $request->setBizContent($riskContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.security.risk.content.detect");
        return($this->execute($request, NULL, NULL)) ;
    }

}
