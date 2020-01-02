<?php

namespace EasyAlipay\Base\Oauth\Model;

/* *
 * 功能：alipay.system.oauth.token（换取授权访问令牌接口）业务参数封装
 */
class AlipayTradeCreateContentBuilder
{

    // 值为authorization_code时，代表用code换取；值为refresh_token时，代表用refresh_token换取
    private $grantType;
    
    // 授权码，用户对应用授权后得到
    private $code;

    // 刷新令牌，上次换取访问令牌时得到
    private $refreshToken;

    private $bizContentarr = array();

    private $bizContent = NULL;

    public function getBizContent()
    {
        if(!empty($this->bizContentarr)){
            $this->bizContent = json_encode($this->bizContentarr,JSON_UNESCAPED_UNICODE);
        }
        return $this->bizContent;
    }

    public function getGrantType()
    {
        return $this->grantType;
    }

    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;
        $this->bizContentarr['grant_type'] = $grantType;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        $this->bizContentarr['code'] = $code;
    }


    public function getRefreshToken()
    {
    	return $this->refreshToken;
    }
    
    public function setRefreshToken($refreshToken)
    {
    	$this->refreshToken = $refreshToken;
    	$this->bizContentarr['refresh_token'] = $refreshToken;
    }

}

?>