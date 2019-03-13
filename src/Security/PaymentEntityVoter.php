<?php

namespace App\Security;

use App\Entity\Admin;
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
        return ($subject instanceof Payment || $subject === Payment::class || $subject === 'Payment');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (! $admin instanceof Admin) {
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
                return $this->canNew($payment, $admin);
            case self::ACTION_SEARCH:
                return $this->canSearch($payment, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Payment $payment, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canEdit(Payment $payment, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canList()
    {
        return ($this->security->isGranted('ROLE_CASHIER'));
    }

    private function canNew(Payment $payment, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canSearch(Payment $payment, Admin $admin)
    {
        // @todo implement me
        return false;
    }
}
