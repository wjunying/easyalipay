<?php

namespace EasyAlipay\Payment\Close;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Payment\Model\AlipayTradeCloseContentBuilder;

class Client extends AopClient
{
    public function close(string $out_trade_no)
    {
        //构造查询业务请求参数对象
        $closeContentBuilder = new AlipayTradeCloseContentBuilder();
        $closeContentBuilder->setOutTradeNo($out_trade_no);
        $request = new AopRequest ();
        $request->setBizContent($refundContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.trade.close");
        return($this->execute($request, NULL, NULL)) ;
    }
}
