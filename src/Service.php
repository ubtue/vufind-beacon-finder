<?php

namespace VuFindBEACONFinder;

class Service implements \VuFind\Http\CachingDownloaderAwareInterface
{
    use \VuFind\Http\CachingDownloaderAwareTrait;

    protected $downloaderCacheId = 'BEACONfinder';

    protected $baseUrl;

    protected const ENDPOINT_URL_GET_BY_ID = '/records/';
    protected const ENDPOINT_URL_GET_BY_AUTHORITY_ID = '/records/by-authority/';

    public function __construct(\Laminas\Config\Config $config)
    {
        $this->baseUrl = $config->baseUrl ?? 'http://127.0.0.1:8000';
    }

    protected function query(string $endpointUrl, string $id): ?Result
    {
        $fullUrl = $this->baseUrl . $endpointUrl . $id;
        $json = $this->cachingDownloader->downloadJson($fullUrl);
        return new Result($json);
    }

    public function getById(string $id): ?Result
    {
        return $this->query(static::ENDPOINT_URL_GET_BY_ID, $id);
    }

    public function getByAuthorityId(string $id): ?Result
    {
        return $this->query(static::ENDPOINT_URL_GET_BY_AUTHORITY_ID, $id);
    }
}
