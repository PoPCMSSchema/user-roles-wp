<?php

declare(strict_types=1);

namespace PoP\UserRolesWP;

use PoP\Root\Component\AbstractComponent;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\UserRolesWP\Config\ServiceConfiguration;
use PoP\ComponentModel\Container\ContainerBuilderUtils;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use YAMLServicesTrait;
    // const VERSION = '0.1.0';

    public static function getDependedComponentClasses(): array
    {
        return [
            \PoP\UserRoles\Component::class,
            \PoP\UsersWP\Component::class,
        ];
    }

    /**
     * All conditional component classes that this component depends upon, to initialize them
     *
     * @return array
     */
    public static function getDependedConditionalComponentClasses(): array
    {
        return [
            \PoP\UserStateWP\Component::class,
        ];
    }

    /**
     * Initialize services
     */
    protected static function doInitialize(array $configuration = [], bool $skipSchema = false): void
    {
        parent::doInitialize($configuration, $skipSchema);
        self::initYAMLServices(dirname(__DIR__));
        self::maybeInitYAMLSchemaServices(dirname(__DIR__), $skipSchema);
        ServiceConfiguration::initialize();
    }

    /**
     * Boot component
     *
     * @return void
     */
    public static function beforeBoot(): void
    {
        parent::beforeBoot();

        // Initialize all classes
        ContainerBuilderUtils::registerTypeResolversFromNamespace(__NAMESPACE__ . '\\TypeResolvers');
        ContainerBuilderUtils::attachFieldResolversFromNamespace(__NAMESPACE__ . '\\FieldResolvers', false);
    }
}
