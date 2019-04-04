<?php

namespace App\Security;

interface ActionInterface
{
     const ACTION_DELETE = 'delete';
     const ACTION_EDIT = 'edit';
     const ACTION_LIST = 'list';
     const ACTION_NEW = 'new';
     const ACTION_SEARCH = 'search';
     const ACTION_SHOW = 'show';
}
