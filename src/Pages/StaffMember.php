<?php

namespace Dynamic\Staff\Pages;

use Page;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

/**
 * Class StaffMember
 * @package Dynamic\Staff\Pages
 */
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
    private static $description = 'Detailed information about a specific staff member';

    /**
     * @var array
     */
    private static $db = array(
        'Position' => 'Varchar(255)',
        'OfficeLocation' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar(20)',
        'Mobile' => 'Varchar(20)',
        'Fax' => 'Varchar(20)',
        'Website' => 'Varchar(255)',
        'Facebook' => 'Varchar(255)',
        'Twitter' => 'Varchar(255)',
        'LinkedIn' => 'Varchar(255)',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
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
     * @var array
     */
    private static $defaults = array(
        'ShowInMenus' => false,
    );

    /**
     * @var bool
     */
    private static $can_be_root = false;

    /**
     * @var array
     */
    private static $allowed_children = array();

    /**
     * This will display or hide the current class from the SiteTree. This variable can be
     * configured using YAML.
     *
     * @var bool
     */
    private static $show_in_sitetree = false;

    /**
     * @var string
     */
    private static $table_name = 'StaffMember';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            /*
            $fields->removeByName(array(
                'MenuTitle',
            ));
            */

            //$fields->push(HiddenField::create('MenuTitle'));

            $imageField = UploadField::create('Image', 'Image')
                ->setFolderName('Uploads/StaffMembers')
                ->setAllowedFileCategories('image')
                ->setIsMultiUpload(false);
            $imageField->getValidator()->allowedExtensions = array('jpg', 'gif', 'png');

            $fields->addFieldToTab('Root.Main', TextField::create('Position'), 'Content');
            $fields->addFieldToTab('Root.Main', TextField::create('OfficeLocation'), 'Content');
            $fields->addFieldToTab('Root.Main', $imageField, 'Content');

            $fields->addFieldsToTab('Root.Contact', array(
                EmailField::create('Email'),
                TextField::create('Phone'),
                TextField::create('Mobile'),
                TextField::create('Fax'),
                TextField::create('Website'),
                TextField::create('Twitter'),
                TextField::create('Facebook'),
                TextField::create('LinkedIn'),
            ));

            $fields->dataFieldByName('Title')->setTitle('Name');
            $fields->dataFieldByName('Content')->setTitle('Biography');
        });

        return parent::getCMSFields();
    }
}
