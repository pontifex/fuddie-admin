<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;

class CategoryControllerTest extends AbstractControllerTest
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     * @dataProvider superAdminProvider
     * @group category
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
                '/admin/?entity=Category&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Category&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=search&entity=Category&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=china',
                Response::HTTP_OK
            ],
            [
                '/admin/?action=edit&entity=Category&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=china&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DCategory%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253Dchina%2526page%253D1&id=2',
                Response::HTTP_OK
            ],
            [
                '/admin/?entity=Category&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=2',
                Response::HTTP_OK
            ]
        ];
    }

    /**
     * @dataProvider anyUserProvider
     * @group category
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
                '/admin/?entity=Category&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Category&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=china',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Category&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=china&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DCategory%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253Dchina%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider cashierProvider
     * @group category
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
                '/admin/?entity=Category&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Category&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=china',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Category&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=china&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DCategory%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253Dchina%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider restaurantAdminProvider
     * @group category
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
                '/admin/?entity=Category&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Category&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=china',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Category&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=china&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DCategory%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253Dchina%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }

    /**
     * @dataProvider companyAdminProvider
     * @group category
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
                '/admin/?entity=Category&amp;action=list&amp;menuIndex=1&amp;submenuIndex=-1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=new&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=search&entity=Category&sortField=id&sortDirection=DESC&menuIndex=&submenuIndex=&query=china',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?action=edit&entity=Category&sortField=id&sortDirection=DESC&menuIndex=2&submenuIndex=-1&query=china&page=1&referer=%252Fadmin%252F%253Faction%253Dsearch%2526entity%253DCategory%2526sortField%253Did%2526sortDirection%253DDESC%2526menuIndex%253D2%2526submenuIndex%253D-1%2526query%253Dchina%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ],
            [
                '/admin/?entity=Category&action=show&menuIndex=2&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DCategory%2526action%253Dlist%2526menuIndex%253D2%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id=2',
                Response::HTTP_FORBIDDEN
            ]
        ];
    }
}
