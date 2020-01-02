<?php

namespace EasyAlipay\Payment\Bill;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Payment\Model\AlipayDataDataserviceBillDownloadurlQueryContentBuilder;

class Client extends AopClient
{
    public function getBillUrl(string $bill_type,string $bill_date)
    {
        //构造查询业务请求参数对象
        $billContentBuilder = new AlipayDataDataserviceBillDownloadurlQueryContentBuilder();
        $billContentBuilder->setBillType($bill_type);
        $billContentBuilder->setBillDate($bill_date);
        $request = new AopRequest ();
        $request->setBizContent($billContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.data.dataservice.bill.downloadurl.query");
        return($this->execute($request, NULL, NULL)) ;
    }
}
