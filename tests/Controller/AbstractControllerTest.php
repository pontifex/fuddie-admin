<?php

namespace App\Tests\Controller;

use App\Entity\ACL\Admin;
use App\Entity\Company;
use App\Entity\Restaurant;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

abstract class AbstractControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    protected function logInAsSuperAdmin()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $admin = new Admin();
        $admin->setId(1);
        $admin->setEmail('admin@fuddie.com');
        $admin->setPassword('$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q');
        $admin->setRoles(['ROLE_SUPER_ADMIN']);

        $token = new PostAuthenticationGuardToken($admin, $firewallName, ['ROLE_SUPER_ADMIN']);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    protected function logInAsAnyUser()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $admin = new Admin();
        $admin->setId(2);
        $admin->setEmail('user@fuddie.com');
        $admin->setPassword('$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q');
        $admin->setRoles(['ROLE_ANY_USER']);

        $token = new PostAuthenticationGuardToken($admin, $firewallName, ['ROLE_ANY_USER']);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    protected function logInAsCashier()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $admin = new Admin();
        $admin->setId(3);
        $admin->setEmail('cashier@fuddie.com');
        $admin->setPassword('$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q');
        $admin->setRoles(['ROLE_CASHIER']);

        $token = new PostAuthenticationGuardToken($admin, $firewallName, ['ROLE_CASHIER']);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    protected function logInAsRestaurantAdmin()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $admin = new Admin();
        $admin->setId(4);
        $admin->setEmail('restaurant@fuddie.com');
        $admin->setPassword('$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q');
        $admin->setRoles(['ROLE_RESTAURANT_ADMIN']);

        $admin->setRestaurants([1]);

        $token = new PostAuthenticationGuardToken($admin, $firewallName, ['ROLE_RESTAURANT_ADMIN']);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    protected function logInAsCompanyAdmin()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $admin = new Admin();
        $admin->setId(5);
        $admin->setEmail('company@fuddie.com');
        $admin->setPassword('$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q');
        $admin->setRoles(['ROLE_COMPANY_ADMIN']);

        $admin->setCompanies([1]);

        $token = new PostAuthenticationGuardToken($admin, $firewallName, ['ROLE_COMPANY_ADMIN']);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}
