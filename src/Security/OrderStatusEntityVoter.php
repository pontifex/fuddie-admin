<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use App\Entity\OrderStatus;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class OrderStatusEntityVoter extends Voter
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        return $subject instanceof OrderStatus || OrderStatus::class === $subject || 'OrderStatus' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        /** @var OrderStatus $orderStatus */
        $orderStatus = $subject;

        switch ($attribute) {
            case ActionInterface::ACTION_DELETE:
                return $this->canDelete();
            case ActionInterface::ACTION_EDIT:
                return $this->canEdit();
            case ActionInterface::ACTION_LIST:
                return $this->canList();
            case ActionInterface::ACTION_NEW:
                return $this->canNew();
            case ActionInterface::ACTION_SEARCH:
                return $this->canSearch();
            case ActionInterface::ACTION_SHOW:
                return $this->canShow();
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete()
    {
        return $this->security->isGranted(RoleInterface::ROLE_ANY_USER);
    }

    private function canEdit()
    {
        return $this->security->isGranted(RoleInterface::ROLE_ANY_USER);
    }

    private function canList()
    {
        return $this->security->isGranted(RoleInterface::ROLE_ANY_USER);
    }

    private function canNew()
    {
        return $this->security->isGranted(RoleInterface::ROLE_ANY_USER);
    }

    private function canSearch()
    {
        return $this->security->isGranted(RoleInterface::ROLE_ANY_USER);
    }

    private function canShow()
    {
        return $this->security->isGranted(RoleInterface::ROLE_ANY_USER);
    }
}
