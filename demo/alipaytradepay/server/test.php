<?php
require __DIR__.'/../../vendor/autoload.php';
use EasyAlipay\Factory;


$options = [
    'app_id'                   => '2019030463412865',
    'alipay_public_key'        => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAumX1EaLM4ddn1Pia4SxTRb62aVYxU8I2mHMqrcpQU6F01mIO/DjY7R4xUWcLi0I2oH/BK/WhckEDCFsGrT7mO+JX8K4sfaWZx1aDGs0m25wOCNjp+DCVBXotXSCurqgGI/9UrY+QydYDnsl4jB65M3p8VilF93MfS01omEDjUW+1MM4o3FP0khmcKsoHnYGs21btEeh0LK1gnnTDlou6Jwv3Ew36CbCNY2cYkuyPAW0j47XqzhWJ7awAx60fwgNBq6ZOEPJnODqH20TAdTLNxPSl4qGxamjBO+RuInBy+Bc2hFHq3pNv6hTAfktggRKkKzDlDEUwgSLE7d2eL7P6rwIDAQAB',
    'merchant_private_key'     => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDJH4UIaT42u0OZboweWX+CM4dNASz/cDsu2FVF2UONprkXJQeqm+D3p4mTDSkLNSsaba5PWuQUTmLcqq17IYMIm2rxogNUCabZB7PME8fiAdzyMcqU7KsGTj9uM56N2cxGXqkBctpESAIB9vJ7aL+bn4LR8mVlbMdgYx5ZD2CpBYrQd08fJtFqCep0RDo+sGgdx6F8fXK1FCKhmPnBgJR7Pq/hS6Gf2eNQoXBZ/1SmVVaeYaUTW7KSVsWz4mt8CZ5quc8Oko3YWyx3d++5Xpnwswu+X+cpe7OENsToH6eQzGm7hMTyaEugbfZJOA++CncYfHaPw6dTmeiNeGY9uqCbAgMBAAECggEAVmZ+BgEAQw7rmWxOMXONPWfZhhEtPYb/Rb6V023kgWPQO8siof5ZBMsqZMvQiAoNPEtGCL0pIjgSbG2+HRlmazopFSjeeSm0TaPrb45H3iWiv0D4oEWTqx/OTA9M2+9mvAxKWl72uUKd6i4mOTHkrnw1/O8+8/VpKVUrYmMiyTjeh/TXB4lSsrEXtgDGgM1MqPcvmFsThoZPawhNtK34ebSVxO9DfU/xVQCC3ox+gmmxmn2jOsDQvvcXQsnp5D+tez7MqannoBP1QhR2P71RzYWNYqXvMgJlyOWenqJWjj03yUm6W0X91cGBHQmuo/rapqjtBTcVNpRtDxJAK/KY0QKBgQD4fuITU93sn68ivlpEsA0X4GTyPufWxzqmy2mAGjlAyxn7M1tQy8pjOO9MAWvhBTbWUaVSPf6oQDQEMQuQlIYbIjvihMG4QcueA1yFZJQ7W6JQJxqYl8VWxvms9k29ZoNBKkVpvtr7SHsSN+e0kMCPsV3WvD6qkKvIr9iOxypbrQKBgQDPMmZzdQI0K72rlecUzdXD8/P7rd/9Wn4L7YnVTOYPL3z3OasPjf8JVNZscVB20mHhBxwJk/L3vK/t6/Egkn/gzcW0KJJa0RFj4WfYyg5HbJupyQhw2YgG6L6Gh41hVK2+SRv4WmATcSRZGxcu6n9Kl41OK9QJYqiMnuiAGOZ2ZwKBgQDuwjMEMQvFRDSpZE4lOyaJb3BulWR6qBhBlKY8kHW8PKktBE5T1ksShOzfkWoO3cyvpej7mVdqX63a7SjYdOxZe84gOkBLguRaYY5vGJGYatYMv1W9ke3pD+trdYiCV9H7NdtV3CxZTm35tj9p7b8nEVtBbMOlbLWxcMvZe6HGTQKBgGm7G2LBi91ZkNFVjnUkUHhNLez5nnqnyfiGP7bUJfYL0qZKDEvEtydo3n66GEh6NS5itWEB2ZOn+tLbetGXUKBEASZdKcokM86XQKn0+fJirtCmYKNNrkdwT4FQ/Ml1L7ARmK9UVwC01MqPs3XifhBvY9FHNk2Pxdj0Ykqz6i7zAoGAZI87BsPfNQo2daBL5ki2g1TZ0z9hUUSovCbj42VpzvxB5+GQIJ4fLYX9vaII2FPaxBAFuHbv8bdJPSUZEmW9goiDVxQG0q4S85llZpAeQExH7v2US+wF6d2O/JPxQ21lorUlFvL18NYTlcnBtGDxFB7oLYpqao2ugysf4uCEkBQ=',
    // ...
];

//接口测试用例（测试数据待构造）
$app = Factory::payment($options);
//print_r($app['query']->query("1561946980099_demo_pay"));
//return $app['query']->query("1561946980099_demo_pay");
//$response=$app['query']->query("1561946980099_demo_pay");
return($response->alipay_trade_query_response);

//var_dump($app->query->query("1561946980099_demo_pay"));
// print_r($app['query']->query("1561946980099_demo_pay"));
// print_r($app['cancel']->cancel(string $out_trade_no));
// var_dump($app['close']->close(string $out_trade_no));
// var_dump($app['create']-> create(String $subject,String $out_trade_no,Price $total_amount,String $buyer_id));
// var_dump($app['pay']->pay(String $subject,String $out_trade_no,Price $total_amount,String $auth_code));
// var_dump($app['query']->query(string $out_trade_no));
// var_dump($app['refund']->refund(string $out_trade_no,string $refund_amount));

// $app = Factory::mini($options);
// var_dump($app['identification']->queryCertifyzhub(String $biz_id,String $zim_id,String $face_type,Boolean $need_img));
// var_dump($app['identification']->queryUserWeb(String $biz_id,String $zim_id,String $extern_param));
// var_dump($app['qrcode']->create(string $url_param,string $query_param,string $describe));
// var_dump($app['risk']->detectContent(string $content));
// var_dump($app['templateMessage']->send(string $to_user_id,string $form_id,string $user_template_id,string $page,string $data));

// $app = Factory::openPublic($options);
// var_dump($app['message']->createImageTextContent(String $title,String $cover,String $content,String $could_comment,String $ctype,String $benefit,String $ext_tags,String $login_ids));
// var_dump($app['message']->modifyImageTextContent(String $content_id,String $title,String $cover,String $content,String $could_comment,String $ctype,String $benefit,String $ext_tags,String $login_ids));
// var_dump($app['message']->sendText(String $text));
// var_dump($app['message']->sendImageText(String[] $articles));
// var_dump($app['message']->query(String[] $message_ids));
// var_dump($app['message']->recall(String $text));
// var_dump($app['template']->setIndustry(String $primary_industry_name,String $primary_industry_code,String $secondary_industry_code,String $secondary_industry_name));
// var_dump($app['template']->getIndustry());
// var_dump($app['template']->getTemplate(String $template_id));

// $app = Factory::marketing($options);
// var_dump($app['pass']->createTemplate(String $unique_id,String $tpl_content));
// var_dump($app['pass']->updateTemplate(String $unique_id,String $tpl_content));
// var_dump($app['pass']->addInstance(String $tpl_id,String $tpl_params,String $recognition_type,String $recognition_info));
// var_dump($app['pass']->updateInstance(String $serial_number,String $channel_id,String $tpl_params,String $status,String $verify_code,String $verify_type));

// $app = Factory::basicService($options);
// var_dump($app['image']->upload(string $image_name,String $image_content));
// var_dump($app['video']->upload(string $image_name,String $image_content));
// var_dump($app['oauth']->getToken(string $grant_type, String $code, String $refresh_token));

