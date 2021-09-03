<?php

declare(strict_types=1);

namespace PoPSchema\UserRolesWP\TypeResolvers\Object;

use PoPSchema\UserRolesWP\TypeDataLoaders\UserRoleTypeDataLoader;
use PoP\ComponentModel\TypeResolvers\Object\AbstractObjectTypeResolver;

class UserRoleTypeResolver extends AbstractObjectTypeResolver
{
    public function getTypeName(): string
    {
        return 'UserRole';
    }

    public function getSchemaTypeDescription(): ?string
    {
        return $this->translationAPI->__('User roles', 'user-roles');
    }

    public function getID(object $resultItem): string | int | null
    {
        $role = $resultItem;
        return $role->name;
    }

    public function getRelationalTypeDataLoaderClass(): string
    {
        return UserRoleTypeDataLoader::class;
    }
}