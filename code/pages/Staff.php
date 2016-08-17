<?php

class StaffMember extends Page
{

    /**
     * @var string
     */
    private static $singular_name = 'Staff Member';

    /**
     * @var string
     */
    private static $plural_name = 'Staff Members';

    /**
     * @var string
     */
    private static $description = 'Staff member';

    /**
     * @var array
     */
    private static $db = array(
        'JobTitle'    => 'Varchar(255)',
        'Email' => 'Varchar(255)'
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Title',
        'JobTitle',
        'Email'
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        
        // remove sort order, use gridfield drag and drop instead
        $fields->removeByName('SortOrder');
        
        // Image - custom upload
        /*$ImageField = new UploadField('Image', 'Image');
        $ImageField->getValidator()->allowedExtensions = array('jpg', 'gif', 'png');
        $ImageField->setFolderName('Uploads/Staff');*/
        //$fields->addFieldToTab('Root.Images', $ImageField);

        $fields->addFieldsToTab(
            'Root.Main',
            array(
                TextField::create('JobTitle')
                    ->setTitle('Title'),
                EmailField::create('Email')
                    ->setTitle('Email')
            ),
            'Content'
        );

        return $fields;
    }
}

class StaffMember_Controller extends Page_Controller
{
}
