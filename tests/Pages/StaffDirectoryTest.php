<?php

namespace Dynamic\Staff\Tests\Pages;

use Dynamic\Staff\Pages\StaffDirectory;
use Dynamic\Staff\Pages\StaffMember;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\DataList;

/**
 * Class StaffDirectoryTest
 * @package Dynamic\Staff\Tests\Pages
 */
class StaffDirectoryTest extends SapphireTest
{

    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * Tests getStaffMembers()
     */
    public function testGetStaffMembers()
    {
        /** @var StaffDirectory $directory */
        $directory = $this->objFromFixture(StaffDirectory::class, 'default');
        /** @var StaffMember $one */
        $one = $this->objFromFixture(StaffMember::class, 'one');
        /** @var StaffMember $two */
        $two = $this->objFromFixture(StaffMember::class, 'two');
        /** @var StaffMember $three */
        $three = $this->objFromFixture(StaffMember::class, 'three');

        $staff = $directory->getStaffMembers();
        $this->assertInstanceOf(DataList::class, $staff);
        $this->assertEquals(3, $staff->count());
    }
}
