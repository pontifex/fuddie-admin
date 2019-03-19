<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;

class OrderControllerTest extends AbstractControllerTest
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     * @dataProvider superAdminProvider
     * @group order
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
                '/admin/?entity=Order&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Order&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=search&entity=Order&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=123123123123123',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=edit&entity=Order&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=123123123123123&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DOrder%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253D123123123123123%2526page%253D1&id=1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Order&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=1',
                Response::HTTP_OK
            ]
        ];
    }

    /**
     * @dataProvider anyUserProvider
     * @group order
     */
    public function testAnyUser($uri, $expectedStatus)
    {
        $this->logInAsAnyUser();

        $this->client->request('GET', $uri);

        $response = $this->client->getResponse();

        $this->assertSame($expectedStatus, $response->getStatusCode(), 'Test');
    }

    public function anyUserProvider()
    {
        return [
            [
                '/admin/?entity=Order&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Order&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Order&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=123123123123123',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Order&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=123123123123123&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DOrder%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253D123123123123123%2526page%253D1&id=1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Order&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=1',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider cashierProvider
     * @group order
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
                '/admin/?entity=Order&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Order&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=search&entity=Order&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=123123123123123',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=edit&entity=Order&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=123123123123123&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DOrder%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253D123123123123123%2526page%253D1&id=1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Order&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=1',
                Response::HTTP_OK
            ]
        ];
    }

    /**
     * @dataProvider restaurantAdminProvider
     * @group order
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
                '/admin/?entity=Order&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Order&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=search&entity=Order&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=123123123123123',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=edit&entity=Order&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=123123123123123&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DOrder%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253D123123123123123%2526page%253D1&id=1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Order&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=1',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider companyAdminProvider
     * @group order
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
                '/admin/?entity=Order&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Order&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=search&entity=Order&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=123123123123123',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=edit&entity=Order&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=123123123123123&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DOrder%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253D123123123123123%2526page%253D1&id=1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Order&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DOrder%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=1',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }
}
