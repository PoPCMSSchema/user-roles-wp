<?php

declare(strict_types=1);

namespace PoP\UserRolesWP\FieldResolvers\Overrides;

use PoP\UserRolesWP\FieldResolvers\Overrides\RolesFieldResolverTrait;

class UserFieldResolver extends \PoP\UserRoles\FieldResolvers\UserFieldResolver
{
    use RolesFieldResolverTrait;
}
