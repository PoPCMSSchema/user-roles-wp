<?php
namespace PoP\UserRolesWP\TypeDataResolvers;

use PoP\UserRoles\TypeDataResolvers\UserRoleTypeDataResolverInterface;

class UserRoleTypeDataResolver implements UserRoleTypeDataResolverInterface
{
    public function getRoleNames(): array
    {
        $userRoles = \wp_roles();
        return array_keys($userRoles->roles);
    }
}
