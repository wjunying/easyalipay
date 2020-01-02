<?php

namespace EasyAlipay\Marketing\Pass;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Marketing\Model\AlipayPassTemplateAddContentBuilder;
use EasyAlipay\Marketing\Model\AlipayPassTemplateUpdateContentBuilder;
use EasyAlipay\Marketing\Model\AlipayPassInstanceAddContentBuilder;
use EasyAlipay\Marketing\Model\AlipayPassInstanceUpdateContentBuilder;

class Client extends AopClient
{
    public function createTemplate(String $unique_id,String $tpl_content)
    {
        //构造查询业务请求参数对象
        $templateAddContentBuilder = new AlipayPassTemplateAddContentBuilder();
        $templateAddContentBuilder->setUniqueId($unique_id);
        $templateAddContentBuilder->setTplContent($tpl_content);
        $request = new AopRequest ();
        $request->setBizContent($templateAddContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.pass.template.add");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function updateTemplate(String $unique_id,String $tpl_content)
    {
        //构造查询业务请求参数对象
        $templateUpdateContentBuilder = new AlipayPassTemplateUpdateContentBuilder();
        $templateUpdateContentBuilder->setUniqueId($unique_id);
        $templateUpdateContentBuilder->setTplContent($tpl_content);
        $request = new AopRequest ();
        $request->setBizContent($templateUpdateContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.pass.template.update");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function addInstance(String $tpl_id,String $tpl_params,String $recognition_type,String $recognition_info)
    {
        //构造查询业务请求参数对象
        $addInstanceContentBuilder = new AlipayPassInstanceAddContentBuilder();
        $addInstanceContentBuilder->getTplId($tpl_id);
        $addInstanceContentBuilder->setTplParams($tpl_params);
        $addInstanceContentBuilder->setRecognitionType($recognition_type);
        $addInstanceContentBuilder->setRecognitionInfo($recognition_info);
        $request = new AopRequest ();
        $request->setBizContent($addInstanceContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.pass.instance.add");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function updateInstance(String $serial_number,String $channel_id,String $tpl_params,String $status,String $verify_code,String $verify_type)
    {
        //构造查询业务请求参数对象
        $updateInstanceContentBuilder = new AlipayPassInstanceUpdateContentBuilder();
        $updateInstanceContentBuilder->setSerialNumber($serial_number);
        $updateInstanceContentBuilder->setChannelId($channel_id);
        $updateInstanceContentBuilder->setTplParams($tpl_params);
        $updateInstanceContentBuilder->setStatus($status);
        $updateInstanceContentBuilder->setVerifyCode($verify_code);
        $updateInstanceContentBuilder->setVerifyType($verify_type);
        $request = new AopRequest ();
        $request->setBizContent($updateInstanceContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.pass.instance.update");
        return($this->execute($request, NULL, NULL)) ;
    }

}
