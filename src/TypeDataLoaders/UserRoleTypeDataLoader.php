<?php
namespace PoP\UserRolesWP\TypeDataLoaders;

use PoP\ComponentModel\TypeDataLoaders\AbstractTypeDataLoader;

class UserRoleTypeDataLoader extends AbstractTypeDataLoader
{
    public function getObjects(array $ids): array
    {
        return array_map('\get_role', $ids);
    }
}
