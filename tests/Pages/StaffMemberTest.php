<?php

namespace Dynamic\Staff\Tests\Pages;

use Dynamic\Staff\Pages\StaffMember;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class StaffMemberTest
 * @package Dynamic\Staff\Tests\Pages
 */
class StaffMemberTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * Tests getCMSFields()
     */
    public function testGetCMSFields()
    {
        /** @var StaffMember $object */
        $object = $this->objFromFixture(StaffMember::class, 'one');
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }
}
