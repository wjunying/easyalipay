<?php


namespace EasyAlipay\Kernel\Providers;

use EasyAlipay\Kernel\Config;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['config'] = function ($app) {
            // var_dump($app->getConfig());
            // return new Config($app->getConfig());
            return $app->getConfig();
        };
    }
}
