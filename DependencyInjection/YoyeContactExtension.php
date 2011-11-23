<?php

namespace Yoye\Bundle\ContactBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class YoyeContactExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        
        $container->setParameter('yoye_contact.email', $config['email']);
        $container->setParameter('yoye_contact.success_message', $config['success_message']);
        $container->setParameter('yoye_contact.success_redirect', $config['success_redirect']);
        $container->setParameter('yoye_contact.message_view', $config['message_view']);
        $container->setParameter('yoye_contact.form_view', $config['form_view']);
    }
}
