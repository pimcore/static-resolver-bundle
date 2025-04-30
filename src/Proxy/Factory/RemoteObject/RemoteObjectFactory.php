<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\ObjectAdapter;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\StrictObjectAdapter;
use ProxyManager\Configuration;
use ProxyManager\FileLocator\FileLocator;
use ProxyManager\GeneratorStrategy\FileWriterGeneratorStrategy;
use ProxyManager\Proxy\RemoteObjectInterface;

/**
 * @deprecated Will be removed in 3.0
 */
final class RemoteObjectFactory implements RemoteObjectFactoryInterface
{
    protected ?Configuration $config = null;

    public function __construct(
        readonly protected ?string $proxyPath = null
    ) {
    }

    public function createStrictProxy(string $interface, object $remote): RemoteObjectInterface
    {
        return (new \ProxyManager\Factory\RemoteObjectFactory(
            new StrictObjectAdapter($remote, $interface),
            $this->getConfig()
        ))->createProxy($interface);
    }

    public function createDecoratorProxy(string $interface, object $remote): RemoteObjectInterface
    {
        return (new \ProxyManager\Factory\RemoteObjectFactory(
            new ObjectAdapter($remote),
            $this->getConfig()
        ))->createProxy($interface);
    }

    public function createObjectProxy(object $remote): RemoteObjectInterface
    {
        return (new \ProxyManager\Factory\RemoteObjectFactory(
            new ObjectAdapter($remote),
            $this->getConfig()
        ))->createProxy($remote);
    }

    private function getConfig(): ?Configuration
    {
        if ($this->proxyPath === null) {
            return null;
        }
        // @codeCoverageIgnoreStart
        if ($this->config !== null) {
            return $this->config;
        }

        $fileLocator = new FileLocator(realpath(__DIR__ . '/' . $this->proxyPath));
        $config = new Configuration();
        $config->setGeneratorStrategy(new FileWriterGeneratorStrategy($fileLocator));

        // set the directory to read the generated proxies from
        $config->setProxiesTargetDir(realpath(__DIR__ . '/' . $this->proxyPath));

        // then register the autoloader
        spl_autoload_register($config->getProxyAutoloader());

        $this->config = $config;

        return $this->config;
        // @codeCoverageIgnoreEnd
    }
}
