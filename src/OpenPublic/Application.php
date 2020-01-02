<?php

namespace EasyAlipay\OpenLife;

use EasyAlipay\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \EasyAlipay\OpenLife\Message\Client          $message
 * @property \EasyAlipay\OpenLife\Template\Client         $template
 *
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Message\ServiceProvider::class,
        Template\ServiceProvider::class,
    ];
}
