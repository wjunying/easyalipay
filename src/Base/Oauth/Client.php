<?php

namespace EasyAlipay\Base\Oauth;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\Base\Model\AlipaySystemOauthTokenContentBuilder;

class Client extends AopClient
{
    public function getToken(string $grant_type, String $code, String $refresh_token)
    {
        //构造查询业务请求参数对象
        $oauthTokenContentBuilder = new AlipaySystemOauthTokenContentBuilder();
        $oauthTokenContentBuilder->setGrantType($grant_type);
        $oauthTokenContentBuilder->setCode($code);
        $oauthTokenContentBuilder->setRefreshToken($refresh_token);
        $request = new AopRequest ();
        $request->setBizContent($oauthTokenContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.system.oauth.token");
        return($this->execute($request, NULL, NULL)) ;
    }
}
