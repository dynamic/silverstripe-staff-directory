<?php

namespace Dynamic\Staff\Model;

use Dynamic\Staff\Pages\StaffMember;
use SilverStripe\ORM\DataObject;

class StaffDepartment extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Department';

    /**
     * @var string
     */
    private static $plural_name = 'Departments';

    /**
     * @var string
     */
    private static $table_name = 'StaffDepartment';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $has_many = [
        'StaffMembers' => StaffMember::class,
    ];
}
