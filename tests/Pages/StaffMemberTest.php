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
     * Tests getCMSFields()
     */
    public function testGetCMSFields()
    {
        /** @var StaffMember $object */
        $object = Injector::inst()->create(StaffMember::class);
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

}
