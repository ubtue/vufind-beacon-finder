<?php

namespace VuFindBEACONFinder\Controller;

class AjaxController extends \VuFind\Controller\AjaxController
{
    /**
     * Load a BEACON module via AJAX.
     *
     * We want to return HTML here to re-use the rendering from the non-AJAX implementation.
     *
     * @return \Laminas\Http\Response
     */
    public function beaconAction()
    {
        return $this->callAjaxMethod('getBEACONReferences', 'text/html');
    }
}
