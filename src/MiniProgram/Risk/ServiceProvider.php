<?php

namespace EasyAlipay\Payment\Query;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
    	// var_dump($app);
        $app['query'] = function ($app) {
            return new Client($app);
        };
    }
}
