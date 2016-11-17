<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/11/16
 * Time: 3:54 PM
 */
class FlowPanel extends DataObject
{
    private static $db = array(
        'PanelTitle' => 'Text',
        'PanelUrlLink' => 'Varchar(100)',
        'HashColor' => "Varchar(20)",
        'PanelType' => "Enum('Full, Half, Third, Quarter', 'Third')",
        'PanelText' => 'HTMLText'
    );

    /**
     * Summary Fields For A Panel
     */
    private static $summary_fields = array(
        'GridThumbnail' => '',
        'PanelTitle' => 'Title of Panel',
        'PanelType' => 'width of panel',
        'getPanelNextPageTitle' => 'Title of page the panel links to'
    );

    public function getGridThumbnail()
    {
        if ($this->PanelImage()->exists()) {
            return $this->PanelImage()->SetWidth(100);
        }

        return '(no image)';
    }

    private static $has_one = array(
        'PanelImage' => 'Image',
        'FlowLandingPage' => 'FlowLandingPage',
        'NextSitePage' => 'SiteTree'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $nextPage = TreeDropdownField::create('NextSitePageID', 'Choose next page to link to:', 'SiteTree')
            ->setDescription('for de-selecting <strong>Choose page again</strong>');

        $fields->addFieldToTab('Root.Main', $nextPage, 'PanelText');

        $fields->addFieldToTab('Root.Main', $panelImage = new UploadField('PanelImage'), 'PanelText');
        $panelImage->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        $panelImage->setFolderName('flow-banner-images');

        return $fields; // TODO: Change the autogenerated stub
    }

    public function getPanelNextPageTitle()
    {
        $title = $this->NextSitePage()->Title;
        return $title;
    }

    public function PanelLink()
    {
        $page = $this->NextSitePage();
        return $page;
    }
}
