<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends AbstractControllerTest
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testSuperAdminSeeHomePageAndMenu()
    {
        $this->logInAsSuperAdmin();

        $crawler = $this->client->request('GET', '/admin/home');

        $response = $this->client->getResponse();

        // super user see welcome dialog without notice
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('Welcome on Fuddie admin area.', $crawler->filter('#home_welcome_text')->text());
        $this->assertEmpty($crawler->filter('#home_notice_text'));

        // super user see entire menu
        $this->assertContains('/admin/home?menuIndex=0&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Category&amp;action=list&amp;menuIndex=2&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Company&amp;action=list&amp;menuIndex=3&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=MiniGame&amp;action=list&amp;menuIndex=4&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Order&amp;action=list&amp;menuIndex=5&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Payment&amp;action=list&amp;menuIndex=6&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Restaurant&amp;action=list&amp;menuIndex=7&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Waiter&amp;action=list&amp;menuIndex=8&amp;submenuIndex=-1', $response->getContent());
    }

    public function testAnyUserSeeHomePageAndMenu()
    {
        $this->logInAsAnyUser();

        $crawler = $this->client->request('GET', '/admin/home');

        $response = $this->client->getResponse();

        // any user see welcome dialog with notice
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('Welcome on Fuddie admin area.', $crawler->filter('#home_welcome_text')->text());
        $this->assertSame('Please wait for admin to set up your privileges.', $crawler->filter('#home_notice_text')->text());

        // any user see only Home entry in menu
        $this->assertContains('/admin/home?menuIndex=0&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Category&amp;action=list&amp;menuIndex=2&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Company&amp;action=list&amp;menuIndex=3&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=MiniGame&amp;action=list&amp;menuIndex=4&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Order&amp;action=list&amp;menuIndex=5&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Payment&amp;action=list&amp;menuIndex=6&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Restaurant&amp;action=list&amp;menuIndex=7&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Waiter&amp;action=list&amp;menuIndex=8&amp;submenuIndex=-1', $response->getContent());
    }

    public function testCashierSeeHomePageAndMenu()
    {
        $this->logInAsCashier();

        $crawler = $this->client->request('GET', '/admin/home');

        $response = $this->client->getResponse();

        // cashier see welcome dialog without notice
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('Welcome on Fuddie admin area.', $crawler->filter('#home_welcome_text')->text());
        $this->assertEmpty($crawler->filter('#home_notice_text'));

        // cashier see some entries in menu
        $this->assertContains('/admin/home?menuIndex=0&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Category&amp;action=list&amp;menuIndex=2&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Company&amp;action=list&amp;menuIndex=3&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=MiniGame&amp;action=list&amp;menuIndex=4&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Order&amp;action=list&amp;menuIndex=5&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Payment&amp;action=list&amp;menuIndex=6&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Restaurant&amp;action=list&amp;menuIndex=7&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Waiter&amp;action=list&amp;menuIndex=8&amp;submenuIndex=-1', $response->getContent());
    }

    public function testRestaurantAdminSeeHomePageAndMenu()
    {
        $this->logInAsRestaurantAdmin();

        $crawler = $this->client->request('GET', '/admin/home');

        $response = $this->client->getResponse();

        // restaurant admin see welcome dialog without notice
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('Welcome on Fuddie admin area.', $crawler->filter('#home_welcome_text')->text());
        $this->assertEmpty($crawler->filter('#home_notice_text'));

        // restaurant admin see some entries in menu
        $this->assertContains('/admin/home?menuIndex=0&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Category&amp;action=list&amp;menuIndex=2&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Company&amp;action=list&amp;menuIndex=3&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=MiniGame&amp;action=list&amp;menuIndex=4&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Order&amp;action=list&amp;menuIndex=5&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Payment&amp;action=list&amp;menuIndex=6&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Restaurant&amp;action=list&amp;menuIndex=7&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Waiter&amp;action=list&amp;menuIndex=8&amp;submenuIndex=-1', $response->getContent());
    }

    public function testCompanyAdminSeeHomePageAndMenu()
    {
        $this->logInAsCompanyAdmin();

        $crawler = $this->client->request('GET', '/admin/home');

        $response = $this->client->getResponse();

        // company admin see welcome dialog without notice
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('Welcome on Fuddie admin area.', $crawler->filter('#home_welcome_text')->text());
        $this->assertEmpty($crawler->filter('#home_notice_text'));

        // company admin see some entries in menu
        $this->assertContains('/admin/home?menuIndex=0&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Category&amp;action=list&amp;menuIndex=2&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Company&amp;action=list&amp;menuIndex=3&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=MiniGame&amp;action=list&amp;menuIndex=4&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Order&amp;action=list&amp;menuIndex=5&amp;submenuIndex=-1', $response->getContent());
        $this->assertNotContains('/admin/?entity=Payment&amp;action=list&amp;menuIndex=6&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Restaurant&amp;action=list&amp;menuIndex=7&amp;submenuIndex=-1', $response->getContent());
        $this->assertContains('/admin/?entity=Waiter&amp;action=list&amp;menuIndex=8&amp;submenuIndex=-1', $response->getContent());
    }
}
