<?php

namespace App\Security;

interface RoleInterface
{
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_COMPANY_ADMIN = 'ROLE_COMPANY_ADMIN';
    const ROLE_RESTAURANT_ADMIN = 'ROLE_RESTAURANT_ADMIN';
}
