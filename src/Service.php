<?php

namespace VuFindBEACONFinder;

class Service implements \VuFind\Http\CachingDownloaderAwareInterface
{
    use \VuFind\Http\CachingDownloaderAwareTrait;

    protected const BASE_URL = 'http://127.0.0.1:8000';

    protected const ENDPOINT_URL_GET_BY_ID = '/records/';
    protected const ENDPOINT_URL_GET_BY_AUTHORITY_ID = '/records/by-authority/';

    protected function query(string $endpointUrl, string $id): ?Result
    {
        $fullUrl = static::BASE_URL . $endpointUrl . $id;
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
