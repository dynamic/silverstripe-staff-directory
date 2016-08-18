<?php

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
    private static $allowed_children = array(
        'StaffMember',
        'StaffDirectory',
    );

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
}

class StaffDirectory_Controller extends Page_Controller
{
    /**
     * @return int
     */
    public function getPageSize()
    {
        if ($object = $this->config()->page_size) {
            return (int) $object;
        }

        return 10;
    }

    /**
     * @param SS_HTTPRequest|null $request
     * @return PaginatedList
     */
    public function PaginatedList(SS_HTTPRequest $request = null)
    {
        if ($request === null) {
            $request = $this->request;
        }
        $start = ($request->getVar('start')) ? (int) $request->getVar('start') : 0;

        $records = PaginatedList::create($this->getStaffMembers(), $this->request);
        $records->setPageStart($start);
        $records->setPageLength($this->getPageSize());

        // allow $records to be updated via extension
        $this->extend('updatePaginatedList', $records);

        return $records;
    }

    /**
     * @return GroupedList
     */
    public function GroupedList()
    {
        $records = GroupedList::create($this->getCollection());

        // allow $records to be updated via extension
        $this->owner->extend('updateGroupedList', $records);

        return $records;
    }
}
