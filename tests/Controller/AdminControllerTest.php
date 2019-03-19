<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;

class AdminControllerTest extends AbstractControllerTest
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     * @dataProvider superAdminProvider
     * @group admin
     */
    public function testSuperAdmin($uri, $expectedStatus)
    {
        $this->logInAsSuperAdmin();

        $this->client->request('GET', $uri);

        $response = $this->client->getResponse();

        $this->assertSame($expectedStatus, $response->getStatusCode());
    }

    public function superAdminProvider()
    {
        return [
            [
                '/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Admin&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DAdmin%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=search&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=edit&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=show&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_OK
            ]
        ];
    }

    /**
     * @dataProvider anyUserProvider
     * @group admin
     */
    public function testAnyUser($uri, $expectedStatus)
    {
        $this->logInAsAnyUser();

        $this->client->request('GET', $uri);

        $response = $this->client->getResponse();

        $this->assertSame($expectedStatus, $response->getStatusCode());
    }

    public function anyUserProvider()
    {
        return [
            [
                '/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Admin&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DAdmin%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=show&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider cashierProvider
     * @group admin
     */
    public function testCashier($uri, $expectedStatus)
    {
        $this->logInAsCashier();

        $this->client->request('GET', $uri);

        $response = $this->client->getResponse();

        $this->assertSame($expectedStatus, $response->getStatusCode());
    }

    public function cashierProvider()
    {
        return [
            [
                '/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Admin&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DAdmin%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=show&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider restaurantAdminProvider
     * @group admin
     */
    public function testRestaurantAdmin($uri, $expectedStatus)
    {
        $this->logInAsRestaurantAdmin();

        $this->client->request('GET', $uri);

        $response = $this->client->getResponse();

        $this->assertSame($expectedStatus, $response->getStatusCode());
    }

    public function restaurantAdminProvider()
    {
        return [
            [
                '/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Admin&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DAdmin%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=show&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider companyAdminProvider
     * @group admin
     */
    public function testCompanyAdmin($uri, $expectedStatus)
    {
        $this->logInAsCompanyAdmin();

        $this->client->request('GET', $uri);

        $response = $this->client->getResponse();

        $this->assertSame($expectedStatus, $response->getStatusCode());
    }

    public function companyAdminProvider()
    {
        return [
            [
                '/admin/?entity=Admin&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Admin&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DAdmin%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=show&entity=Admin&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=company&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DAdmin%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D%2526submenuIndex%253D%2526query%253Dcompany%2526page%253D1&id=5',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }
}
