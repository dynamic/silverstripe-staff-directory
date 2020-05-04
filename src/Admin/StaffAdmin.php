<?php

namespace Dynamic\Staff\Admin;

use Dynamic\Staff\Model\StaffDepartment;
use Dynamic\Staff\Pages\StaffMember;
use LittleGiant\CatalogManager\ModelAdmin\CatalogPageAdmin;

class StaffAdmin extends CatalogPageAdmin
{
    /**
     * @var array
     */
    private static $managed_models = [
        StaffMember::class,
        StaffDepartment::class,
    ];

    /**
     * @var string
     */
    private static $url_segment = 'staff';

    /**
     * @var string
     */
    private static $menu_title = 'Staff';
}
