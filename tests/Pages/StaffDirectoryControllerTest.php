<?php

namespace Dynamic\Staff\Tests\Pages;

use Dynamic\Staff\Pages\StaffDirectory;
use Dynamic\Staff\Pages\StaffDirectoryController;
use Dynamic\Staff\Pages\StaffMember;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\GroupedList;
use SilverStripe\ORM\PaginatedList;

/**
 * Class StaffDirectoryControllerTest
 * @package Dynamic\Staff\Tests\Pages
 */
class StaffDirectoryControllerTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * Tests getPageSize()
     */
    public function testGetPageSize()
    {
        /** @var StaffDirectory $directory */
        $directory = Injector::inst()->create(StaffDirectory::class);
        $controller = new StaffDirectoryController($directory);

        $this->assertEquals(10, $controller->getPageSize());

        Config::modify()->set(StaffDirectoryController::class, 'page_size', 12);
        $this->assertEquals(12, $controller->getPageSize());
    }

    /**
     * Tests PaginatedList()
     */
    public function testPaginatedList()
    {
        /** @var StaffDirectory $directory */
        $directory = $this->objFromFixture(StaffDirectory::class, 'default');
        /** @var StaffMember $one */
        $one = $this->objFromFixture(StaffMember::class, 'one');
        /** @var StaffMember $two */
        $two = $this->objFromFixture(StaffMember::class, 'two');
        /** @var StaffMember $three */
        $three = $this->objFromFixture(StaffMember::class, 'three');

        $controller = new StaffDirectoryController($directory);

        $list = $controller->PaginatedList();
        $this->assertInstanceOf(PaginatedList::class, $list);
        $this->assertEquals(3, $list->count());

        $request = new HTTPRequest('GET', $directory->Link(), array(
            'start' => 1,
        ));
        $list = $controller->PaginatedList($request);
        $this->assertInstanceOf(PaginatedList::class, $list);
        $this->assertEquals(3, $list->count());
    }

    /**
     * Tests GroupedList()
     */
    public function testGroupedList()
    {
        /** @var StaffDirectory $directory */
        $directory = $this->objFromFixture(StaffDirectory::class, 'default');
        /** @var StaffMember $one */
        $one = $this->objFromFixture(StaffMember::class, 'one');
        /** @var StaffMember $two */
        $two = $this->objFromFixture(StaffMember::class, 'two');
        /** @var StaffMember $three */
        $three = $this->objFromFixture(StaffMember::class, 'three');

        $controller = new StaffDirectoryController($directory);

        $list = $controller->GroupedList();
        $this->assertInstanceOf(GroupedList::class, $list);
        $this->assertEquals(3, $list->count());
    }
}
