<?php
namespace PoP\UserRolesWP\FieldResolvers\Overrides;

use PoP\UserRolesWP\TypeResolvers\UserRoleTypeResolver;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;

class RootRolesFieldResolver extends \PoP\UserRoles\FieldResolvers\RootRolesFieldResolver
{
    public function resolveFieldTypeResolverClass(TypeResolverInterface $typeResolver, string $fieldName, array $fieldArgs = []): ?string
    {
        switch ($fieldName) {
            case 'roles':
                return UserRoleTypeResolver::class;
        }

        return parent::resolveFieldTypeResolverClass($typeResolver, $fieldName, $fieldArgs);
    }
}
