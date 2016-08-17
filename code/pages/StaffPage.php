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
    private static $allowed_children = array('Staff');

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Staff
        /*$config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldBulkEditingTools());
        $config->addComponent(new GridFieldBulkImageUpload());
        $config->addComponent(new GridFieldSortableRows("SortOrder"));

        $PhotosField = GridField::create("StaffMembers", "Staff", Staff::get()->sort('SortOrder'), $config);

        $fields->addFieldToTab("Root.Staff", $PhotosField);*/

        return $fields;
    }

    /**
     * @return DataList
     */
    public function getStaffMembers()
    {
        return Staff::get()->sort('SortOrder');
    }
}

class StaffDirectory_Controller extends Page_Controller
{




    /**
     * @return mixed
     */
    public function view()
    {
        $id = 0;
        if (Director::urlParam('ID')) {
            $id = (int) Director::urlParam('ID');
        }
        if ($id != 0) {
            $entry = DataObject::get_by_id('Staff', $id);
        }
        $page = $this->customise(array(
            'Title' => $entry->FirstName." ".$entry->LastName,
            'Staff' => $entry
        ));

        return $page;
    }
}
