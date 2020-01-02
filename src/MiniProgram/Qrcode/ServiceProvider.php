<?php

namespace EasyAlipay\Mini\Risk;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['risk'] = function ($app) {
            return new Client($app);
        };
    }
}
