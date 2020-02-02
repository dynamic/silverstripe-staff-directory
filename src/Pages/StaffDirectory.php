<?php

namespace Dynamic\Staff\Pages;

use Page;
use SilverStripe\Lumberjack\Model\Lumberjack;
use SilverStripe\ORM\DataList;

/**
 * Class StaffDirectory
 * @package Dynamic\Staff\Pages
 */
class StaffDirectory extends Page
{
    /**
     * @var string
     */
    private static $singular_name = 'Staff Directory';

    /**
     * @var string
     */
    private static $plural_name = 'Staff Directories';

    /**
     * @var string
     */
    private static $description = 'A list of staff members';

    /**
     * @var array
     */
    private static $extensions = [
        Lumberjack::class,
    ];

    /**
     * @var array
     */
    private static $allowed_children = array(
        StaffMember::class,
        StaffDirectory::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'StaffDirectory';

    /**
     * Return staff members
     *
     * @return DataList
     */
    public function getStaffMembers()
    {
        $staffMembers = StaffMember::get()->filter('ParentID', $this->ID);

        $this->extend('updateGetStaffMembers', $staffMembers);

        return $staffMembers;
    }

    /**
     *
     */
    public function getLumberjackTitle()
    {
        return 'Staff Members';
    }
}
