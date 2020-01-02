<?php

namespace EasyAlipay\Kernel;

class Config 
{
	public $config = [
	//应用ID
    'app_id'                   => '2019030463412865',
    //支付宝公钥
    'alipay_public_key'        => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAumX1EaLM4ddn1Pia4SxTRb62aVYxU8I2mHMqrcpQU6F01mIO/DjY7R4xUWcLi0I2oH/BK/WhckEDCFsGrT7mO+JX8K4sfaWZx1aDGs0m25wOCNjp+DCVBXotXSCurqgGI/9UrY+QydYDnsl4jB65M3p8VilF93MfS01omEDjUW+1MM4o3FP0khmcKsoHnYGs21btEeh0LK1gnnTDlou6Jwv3Ew36CbCNY2cYkuyPAW0j47XqzhWJ7awAx60fwgNBq6ZOEPJnODqH20TAdTLNxPSl4qGxamjBO+RuInBy+Bc2hFHq3pNv6hTAfktggRKkKzDlDEUwgSLE7d2eL7P6rwIDAQAB',
    //商户私钥
    'merchant_private_key'     => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDJH4UIaT42u0OZboweWX+CM4dNASz/cDsu2FVF2UONprkXJQeqm+D3p4mTDSkLNSsaba5PWuQUTmLcqq17IYMIm2rxogNUCabZB7PME8fiAdzyMcqU7KsGTj9uM56N2cxGXqkBctpESAIB9vJ7aL+bn4LR8mVlbMdgYx5ZD2CpBYrQd08fJtFqCep0RDo+sGgdx6F8fXK1FCKhmPnBgJR7Pq/hS6Gf2eNQoXBZ/1SmVVaeYaUTW7KSVsWz4mt8CZ5quc8Oko3YWyx3d++5Xpnwswu+X+cpe7OENsToH6eQzGm7hMTyaEugbfZJOA++CncYfHaPw6dTmeiNeGY9uqCbAgMBAAECggEAVmZ+BgEAQw7rmWxOMXONPWfZhhEtPYb/Rb6V023kgWPQO8siof5ZBMsqZMvQiAoNPEtGCL0pIjgSbG2+HRlmazopFSjeeSm0TaPrb45H3iWiv0D4oEWTqx/OTA9M2+9mvAxKWl72uUKd6i4mOTHkrnw1/O8+8/VpKVUrYmMiyTjeh/TXB4lSsrEXtgDGgM1MqPcvmFsThoZPawhNtK34ebSVxO9DfU/xVQCC3ox+gmmxmn2jOsDQvvcXQsnp5D+tez7MqannoBP1QhR2P71RzYWNYqXvMgJlyOWenqJWjj03yUm6W0X91cGBHQmuo/rapqjtBTcVNpRtDxJAK/KY0QKBgQD4fuITU93sn68ivlpEsA0X4GTyPufWxzqmy2mAGjlAyxn7M1tQy8pjOO9MAWvhBTbWUaVSPf6oQDQEMQuQlIYbIjvihMG4QcueA1yFZJQ7W6JQJxqYl8VWxvms9k29ZoNBKkVpvtr7SHsSN+e0kMCPsV3WvD6qkKvIr9iOxypbrQKBgQDPMmZzdQI0K72rlecUzdXD8/P7rd/9Wn4L7YnVTOYPL3z3OasPjf8JVNZscVB20mHhBxwJk/L3vK/t6/Egkn/gzcW0KJJa0RFj4WfYyg5HbJupyQhw2YgG6L6Gh41hVK2+SRv4WmATcSRZGxcu6n9Kl41OK9QJYqiMnuiAGOZ2ZwKBgQDuwjMEMQvFRDSpZE4lOyaJb3BulWR6qBhBlKY8kHW8PKktBE5T1ksShOzfkWoO3cyvpej7mVdqX63a7SjYdOxZe84gOkBLguRaYY5vGJGYatYMv1W9ke3pD+trdYiCV9H7NdtV3CxZTm35tj9p7b8nEVtBbMOlbLWxcMvZe6HGTQKBgGm7G2LBi91ZkNFVjnUkUHhNLez5nnqnyfiGP7bUJfYL0qZKDEvEtydo3n66GEh6NS5itWEB2ZOn+tLbetGXUKBEASZdKcokM86XQKn0+fJirtCmYKNNrkdwT4FQ/Ml1L7ARmK9UVwC01MqPs3XifhBvY9FHNk2Pxdj0Ykqz6i7zAoGAZI87BsPfNQo2daBL5ki2g1TZ0z9hUUSovCbj42VpzvxB5+GQIJ4fLYX9vaII2FPaxBAFuHbv8bdJPSUZEmW9goiDVxQG0q4S85llZpAeQExH7v2US+wF6d2O/JPxQ21lorUlFvL18NYTlcnBtGDxFB7oLYpqao2ugysf4uCEkBQ=',
    //网管地址
	'gatewayUrl'               => "https://openapi.alipay.com/gateway.do",
    //异步通知地址
	'notify_url'               => "",
	//同步跳转
	'return_url'               => "",
	//编码格式
	'charset'                  => "UTF-8",
	//签名方式,默认为RSA2(RSA2048)
	'sign_type'                =>"RSA2",
    // ...

    //  // 应用ID,您的APPID。
	// 'app_id' => "2016051900098985",
	// //商户私钥
	// 'merchant_private_key' => "MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAJlJ7tgZ4vI2Nnxt7DzznbhVwGN8INQ1s/ZnXYgtRMmvbNKLTHZ1SbRmiAKixn3TDbzkHMvo0jY7ldb7puqUJUKZuKfVwaRcAYgI6NamflqtTDWhSq+hPZ5ZrB36lx7N7AxlMD038WvJC5pHbld06DDxhlUslS3pJCGrB9P6HO0RAgMBAAECgYArrFTQXQ+70pZTfT4BX6dgDY5yybrQuzw6x9huI/elPsXSdr2iQmhtbYjyt022K5uOZa+OqRa7PN7EEY7M5sh2cFRX5P77o2vN61Gwklc11iaJIpPgUOZUmAG8jHnj3lf40+YtMwdPxQfbiZ36UOebQYPc8iuJczUNoVtSPP3IwQJBAMZzCSV7pjTQ4mp2MNT/h3/5ZhaQnqlO4wm0etekKDDTrpvUlSN8MjRjhyJhRvulKd0zUdfrjASEUjZhsZydEAMCQQDFviiKquR0TgYK0eircDwR89XHUBKoblPLYi/GSdPXSL92AzyvDIyNF/GPwHOkc1c+BA/4ocuW/T+u4KfYWBRbAkEAvV/Rfp98gDJFnmqjNt+SIqGQtj/T6KWLKxu7jkTsxYt7uOEoYPCHyE6iCkDiSAnY5Wmv1GjG+Rh8i8C2iUmomQJBAIaeVmtQvAaRt3tWO9e6qKpwHXF7Cbiwo0sqpOuRBy7gz7c/rOhe2rCTRFhg5FloTFRj35ucSkWYUupy9tFJ5VECQDyK++bn0ZpJG/HRNJHvuKOSUM8U6LSvQrTGpyvKlj5wLcOniDAYEcCzkapY/wHAUMshD0eoFY2X3F/3PcuIgW4=",
	// //支付宝网关
	// 'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",
	// //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
	// 'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
    ];
}
