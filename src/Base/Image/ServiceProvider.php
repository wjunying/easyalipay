<?php

namespace EasyAlipay\Base\Image;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['image'] = function ($app) {
            return new Client($app);
        };
    }
}
