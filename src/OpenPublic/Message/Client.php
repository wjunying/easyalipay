<?php

namespace EasyAlipay\OpenLife\Message;

use EasyAlipay\Kernel\Support;
use EasyAlipay\Kernel\AopClient;
use EasyAlipay\Kernel\AopRequest;
use EasyAlipay\Kernel\Config;
use EasyAlipay\OpenLife\Model\AlipayOpenPublicMessageContentCreateContentBuilder;
use EasyAlipay\OpenLife\Model\AlipayOpenPublicMessageContentModifyContentBuilder;
use EasyAlipay\OpenLife\Model\AlipayOpenPublicMessageTotalSendContentBuilder;
use EasyAlipay\OpenLife\Model\AlipayOpenPublicMessageQueryContentBuilder;
use EasyAlipay\OpenLife\Model\AlipayOpenPublicLifeMsgRecallContentBuilder;

class Client extends AopClient
{
    public function createImageTextContent(string $title,string $cover,string $content,string $could_comment,string $ctype,string $benefit,string $ext_tags,string $login_ids)
    {
        //构造查询业务请求参数对象
        $createContentBuilder = new AlipayOpenPublicMessageContentCreateContentBuilder();
        $createContentBuilder->setTitle($title);
        $createContentBuilder->setCover($cover);
        $createContentBuilder->setContent($content);
        $createContentBuilder->setCouldComment($could_comment);
        $createContentBuilder->setCtype($ctype);
        $createContentBuilder->setBenefit($benefit);
        $createContentBuilder->setExtTags($ext_tags);
        $createContentBuilder->setLoginIds($login_ids);
        $request = new AopRequest ();
        $request->setBizContent($createContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.public.message.content.create");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function modifyImageTextContent(string $content_id,string $title,string $cover,string $content,string $could_comment,string $ctype,string $benefit,string $ext_tags,string $login_ids)
    {
        //构造查询业务请求参数对象
        $modifyContentBuilder = new AlipayOpenPublicMessageContentModifyContentBuilder();
        $modifyContentBuilder->setContentId($content_id);
        $modifyContentBuilder->setCover($cover);
        $modifyContentBuilder->setMsgType($msg_type);
        $modifyContentBuilder->setContent($content);
        $modifyContentBuilder->setCouldComment($could_comment);
        $modifyContentBuilder->setCtype($ctype);
        $modifyContentBuilder->setBenefit($benefit);
        $modifyContentBuilder->setExtTags($ext_tags);
        $modifyContentBuilder->setLoginIds($login_ids);
        $request = new AopRequest ();
        $request->setBizContent($modifyContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.public.message.content.modify");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function sendText(string $text)
    {
        //构造查询业务请求参数对象
        $totalSendContentBuilder = new AlipayOpenPublicMessageTotalSendContentBuilder();
        $totalSendContentBuilder->setText($text);
        $totalSendContentBuilder->setMsgType("text");
        $request = new AopRequest ();
        $request->setBizContent($totalSendContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.public.message.total.send");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function sendImageText(string[] $articles)
    {
        //构造查询业务请求参数对象
        $totalSendContentBuilder = new AlipayOpenPublicMessageTotalSendContentBuilder();
        $totalSendContentBuilder->setArticles($articles);
        $totalSendContentBuilder->setMsgType("image-text");
        $request = new AopRequest ();
        $request->setBizContent($totalSendContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.public.message.total.send");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function query(string[] $message_ids)
    {
        //构造查询业务请求参数对象
        $queryContentBuilder = new AlipayOpenPublicMessageQueryContentBuilder();
        $queryContentBuilder->setMessageIds($message_ids);
        $request = new AopRequest ();
        $request->setBizContent($queryContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.public.message.query");
        return($this->execute($request, NULL, NULL)) ;
    }

    public function recall(string $text)
    {
        //构造查询业务请求参数对象
        $recallContentBuilder = new AlipayOpenPublicLifeMsgRecallContentBuilder();
        $recallContentBuilder->setMessageId($message_id);
        $request = new AopRequest ();
        $request->setBizContent($recallContentBuilder->getBizContent());
        $request->setApiMethodName("alipay.open.public.life.msg.recall");
        return($this->execute($request, NULL, NULL)) ;
    }
}
