<?php
namespace PoP\UserRolesWP\FieldResolvers\Overrides;

use PoP\UserRolesWP\TypeResolvers\UserRoleTypeResolver;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;

class SiteRolesFieldResolver extends \PoP\UserRoles\FieldResolvers\SiteRolesFieldResolver
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
