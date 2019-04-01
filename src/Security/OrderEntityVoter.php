<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use App\Entity\Order;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class OrderEntityVoter extends Voter
{
    private const ACTION_DELETE = 'delete';
    private const ACTION_EDIT = 'edit';
    private const ACTION_LIST = 'list';
    private const ACTION_NEW = 'new';
    private const ACTION_SEARCH = 'search';
    private const ACTION_SHOW = 'show';

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
            case self::ACTION_DELETE:
                return $this->canDelete($order, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit($order, $admin);
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew();
            case self::ACTION_SEARCH:
                return $this->canSearch();
            case self::ACTION_SHOW:
                return $this->canShow($order, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Order $order, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        if (is_null($order->getFkRestaurant())
            && ($this->security->isGranted('ROLE_COMPANY_ADMIN') || $this->security->isGranted('ROLE_RESTAURANT_ADMIN'))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            && in_array($order->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted('ROLE_COMPANY_ADMIN')
            && in_array($order->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        if ($this->security->isGranted('ROLE_CASHIER')) {
            return true;
        }

        return false;
    }

    private function canEdit(Order $order, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        if (is_null($order->getFkRestaurant())
            && ($this->security->isGranted('ROLE_COMPANY_ADMIN') || $this->security->isGranted('ROLE_RESTAURANT_ADMIN'))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            && in_array($order->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted('ROLE_COMPANY_ADMIN')
            && in_array($order->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        if ($this->security->isGranted('ROLE_CASHIER')) {
            return true;
        }

        return false;
    }

    private function canNew()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_COMPANY_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ;
    }

    private function canSearch()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_COMPANY_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ;
    }

    private function canList()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_COMPANY_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ;
    }

    private function canShow(Order $order, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        if (is_null($order->getFkRestaurant())
            && ($this->security->isGranted('ROLE_COMPANY_ADMIN') || $this->security->isGranted('ROLE_RESTAURANT_ADMIN'))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            && in_array($order->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted('ROLE_COMPANY_ADMIN')
            && in_array($order->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        if ($this->security->isGranted('ROLE_CASHIER')) {
            return true;
        }

        return false;
    }
}
