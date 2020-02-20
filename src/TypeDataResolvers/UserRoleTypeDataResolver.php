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

    public function getUserRoles($userObjectOrID): array
    {
        if (is_object($userObjectOrID)) {
            $user = $userObjectOrID;
        } else {
            $user = \get_user_by('id', $userObjectOrID);
        }
        return $user->roles;
    }
}
