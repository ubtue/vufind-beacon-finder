<?php

namespace VuFindBEACONFinder\Controller;

class AuthorityRecordController extends \VuFind\Controller\AuthorityRecordController
{
    public function homeAction()
    {
        $result = parent::homeAction();

        if (
            isset($this->driver)
                && $this->driver instanceof \VuFindBEACONFinder\RecordDriver\Feature\BEACONFinderInterface
        ) {
            $result->BEACONfinder = $this->serviceLocator->get(\VuFindBEACONFinder\Service::class);
            $result->authorityId = $this->driver->getAuthorityId();
        }
        return $result;
    }
}
