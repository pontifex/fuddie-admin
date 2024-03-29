<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use App\Entity\Order;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class OrderEntityVoter extends Voter
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
        return $subject instanceof Order || Order::class === $subject || 'Order' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        /** @var Order $order */
        $order = $subject;

        switch ($attribute) {
            case ActionInterface::ACTION_DELETE:
                return $this->canDelete($order, $admin);
            case ActionInterface::ACTION_EDIT:
                return $this->canEdit($order, $admin);
            case ActionInterface::ACTION_LIST:
                return $this->canList();
            case ActionInterface::ACTION_NEW:
                return $this->canNew();
            case ActionInterface::ACTION_SEARCH:
                return $this->canSearch();
            case ActionInterface::ACTION_SHOW:
                return $this->canShow($order, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Order $order, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (is_null($order->getFkRestaurant())
            && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            && in_array($order->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($order->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        if ($this->security->isGranted(RoleInterface::ROLE_CASHIER)) {
            return true;
        }

        return false;
    }

    private function canEdit(Order $order, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (is_null($order->getFkRestaurant())
            && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            && in_array($order->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($order->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        if ($this->security->isGranted(RoleInterface::ROLE_CASHIER)) {
            return true;
        }

        return false;
    }

    private function canNew()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_CASHIER)
        ;
    }

    private function canSearch()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_CASHIER)
        ;
    }

    private function canList()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_CASHIER)
        ;
    }

    private function canShow(Order $order, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (is_null($order->getFkRestaurant())
            && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            && in_array($order->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($order->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        if ($this->security->isGranted(RoleInterface::ROLE_CASHIER)) {
            return true;
        }

        return false;
    }
}
