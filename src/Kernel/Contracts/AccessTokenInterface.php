<?php

namespace EasyAlipay\Kernel\Contracts;

use Psr\Http\Message\RequestInterface;

interface AccessTokenInterface
{
    /**
     * @return array
     */
    public function getToken(): array;

    /**
     * @return \EasyAlipay\Kernel\Contracts\AccessTokenInterface
     */
    public function refresh(): self;

    /**
     * @param \Psr\Http\Message\RequestInterface $request
     * @param array                              $requestOptions
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function applyToRequest(RequestInterface $request, array $requestOptions = []): RequestInterface;
}
