<?php

namespace Dynamic\Staff\Pages;

use PageController;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\GroupedList;
use SilverStripe\ORM\PaginatedList;

/**
 * Class StaffDirectoryController
 * @package Dynamic\Staff\Pages
 */
class StaffDirectoryController extends PageController
{
    /**
     * @return int
     */
    public function getPageSize()
    {
        if ($object = $this->config()->page_size) {
            return (int)$object;
        }

        return 10;
    }

    /**
     * @param HTTPRequest|null $request
     *
     * @return PaginatedList
     */
    public function PaginatedList(HTTPRequest $request = null)
    {
        if ($request === null) {
            $request = $this->request;
        }
        $start = ($request->getVar('start')) ? (int)$request->getVar('start') : 0;

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
        $records = GroupedList::create($this->getStaffMembers());

        // allow $records to be updated via extension
        $this->owner->extend('updateGroupedList', $records);

        return $records;
    }
}
