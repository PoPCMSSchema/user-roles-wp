<?php

declare(strict_types=1);

namespace PoP\UserRolesWP\FieldResolvers;

use PoP\UserRolesWP\TypeResolvers\UserRoleTypeResolver;
use PoP\ComponentModel\FieldResolvers\AbstractReflectionPropertyFieldResolver;

class UserRoleFieldResolver extends AbstractReflectionPropertyFieldResolver
{
    public static function getClassesToAttachTo(): array
    {
        return array(UserRoleTypeResolver::class);
    }

    protected static function getTypeClass(): string
    {
        return \WP_Role::class;
    }
}
