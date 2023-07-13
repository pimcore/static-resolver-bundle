<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject;

use InvalidArgumentException;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\ObjectAdapter;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\StrictObjectAdapter;
use ProxyManager\Configuration;
use ProxyManager\FileLocator\FileLocator;
use ProxyManager\GeneratorStrategy\FileWriterGeneratorStrategy;
use ProxyManager\Proxy\RemoteObjectInterface;

class RemoteObjectFactory implements RemoteObjectFactoryInterface
{
    protected ?Configuration $config = null;

    public function __construct(
        readonly protected ?string $proxyPath = null
    )
    {
    }

    public function createStrictProxy(string $interface, object $remote): RemoteObjectInterface
    {
        if (!interface_exists($interface)) {
            throw new InvalidArgumentException(sprintf('Interface %s does not exist', $interface));
        }

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

        if ($this->config !== null) {
            return $this->config;
        }

        $fileLocator = new FileLocator($this->proxyPath);
        $config = new Configuration();
        $config->setGeneratorStrategy(new FileWriterGeneratorStrategy($fileLocator));

        // set the directory to read the generated proxies from
        $config->setProxiesTargetDir($this->proxyPath);

        // then register the autoloader
        spl_autoload_register($config->getProxyAutoloader());

        $this->config = $config;

        return $this->config;
    }
}
