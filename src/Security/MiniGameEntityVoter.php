<?php

namespace App\Security;

use App\Entity\Admin;
use App\Entity\MiniGame;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class MiniGameEntityVoter extends Voter
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
        return ($subject instanceof MiniGame || $subject === MiniGame::class || $subject === 'MiniGame');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (! $admin instanceof Admin) {
            return false;
        }

        /** @var MiniGame $miniGame */
        $miniGame = $subject;

        switch ($attribute) {
            case self::ACTION_DELETE:
                return $this->canDelete($miniGame, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit($miniGame, $admin);
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew($miniGame, $admin);
            case self::ACTION_SEARCH:
                return $this->canSearch($miniGame, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(MiniGame $miniGame, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canEdit(MiniGame $miniGame, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canList()
    {
        return ($this->security->isGranted('ROLE_COMPANY_ADMIN'));
    }

    private function canNew(MiniGame $miniGame, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canSearch(MiniGame $miniGame, Admin $admin)
    {
        // @todo implement me
        return false;
    }
}
