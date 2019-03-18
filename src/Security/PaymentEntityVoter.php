<?php

namespace App\Security;

use App\Entity\Admin;
use App\Entity\Order;
use App\Entity\Payment;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class PaymentEntityVoter extends Voter
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
        return $subject instanceof Payment || Payment::class === $subject || 'Payment' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        /** @var Payment $payment */
        $payment = $subject;

        switch ($attribute) {
            case self::ACTION_DELETE:
                return $this->canDelete($payment, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit($payment, $admin);
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew();
            case self::ACTION_SEARCH:
                return $this->canSearch();
            case self::ACTION_SHOW:
                return $this->canShow($payment, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Payment $payment, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ) {
            return true;
        }

        /** @var Order $order */
        foreach ($payment->getOrders() as $order) {
            if (is_null($order)
                && $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            ) {
                continue;
            }

            // owner restaurant
            if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
                && $order->getFkRestaurant()->getId() === $admin->getFkCompany()
            ) {
                return true;
            }
        }

        return false;
    }

    private function canEdit(Payment $payment, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ) {
            return true;
        }

        /** @var Order $order */
        foreach ($payment->getOrders() as $order) {
            if (is_null($order)
                && $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            ) {
                continue;
            }

            // owner restaurant
            if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
                && $order->getFkRestaurant()->getId() === $admin->getFkCompany()
            ) {
                return true;
            }
        }

        return false;
    }

    private function canNew()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ;
    }

    private function canSearch()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ;
    }

    private function canList()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ;
    }

    private function canShow(Payment $payment, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_CASHIER')
        ) {
            return true;
        }

        /** @var Order $order */
        foreach ($payment->getOrders() as $order) {
            if (is_null($order)
                && $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            ) {
                continue;
            }

            // owner restaurant
            if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
                && $order->getFkRestaurant()->getId() === $admin->getFkCompany()
            ) {
                return true;
            }
        }

        return false;
    }
}
