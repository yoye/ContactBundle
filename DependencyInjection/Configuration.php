<?php

namespace Yoye\Bundle\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('yoye_contact');

        $rootNode
            ->children()
                ->scalarNode('email')->isRequired()->end()
                ->scalarNode('success_message')->defaultValue('Message send !')->end()
                ->scalarNode('success_redirect')->defaultValue('yoye_contact.homepage')->end()
                ->scalarNode('message_view')->defaultValue('YoyeContactBundle:Default:message.html.twig')->end()
                ->scalarNode('form_view')->defaultValue('YoyeContactBundle:Default:index.html.twig')->end()
            ->end()
        ;
        return $treeBuilder;
    }
}
