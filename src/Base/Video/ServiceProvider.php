<?php

namespace EasyAlipay\Base\Video;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['video'] = function ($app) {
            return new Client($app);
        };
    }
}
