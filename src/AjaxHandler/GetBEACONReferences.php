<?php

namespace VuFindBEACONFinder\AjaxHandler;

use Laminas\Mvc\Controller\Plugin\Params;
use Laminas\View\Renderer\RendererInterface;

class GetBEACONReferences extends \VuFind\AjaxHandler\AbstractBase
{
    protected \VuFindBEACONFinder\Service $BEACONfinder;

    protected RendererInterface $renderer;

    public function __construct(
        \VuFindBEACONFinder\Service $BEACONfinder,
        RendererInterface $renderer
    ) {
        $this->BEACONfinder = $BEACONfinder;
        $this->renderer = $renderer;
    }

    public function handleRequest(Params $params)
    {
        $authorityId = $params->fromQuery('id');
        $content = $this->renderer->render(
            'authority/record/BEACONfinder.phtml',
            ['BEACONfinder' => $this->BEACONfinder,
             'authorityId' => $authorityId]
        );

        return $this->formatResponse($content);
    }
}
