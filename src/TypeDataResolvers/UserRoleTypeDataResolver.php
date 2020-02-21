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

    public function getUserCapabilities($userObjectOrID): array
    {
        $roles = $this->getUserRoles($userObjectOrID);
        $capabilities = [];
        foreach ($roles as $roleName) {
            $role = \get_role($roleName);
            $capabilities = array_merge(
                $capabilities,
                array_keys($role->capabilities ?? [])
            );
        }
        return array_values(array_unique($capabilities));
    }
}
