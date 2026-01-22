<?php

namespace VuFindBEACONFinder;

class Item
{
    protected \stdClass $data;

    public function __construct(\stdClass $data)
    {
        $this->data = $data;
    }

    public function getFEED()
    {
        return $this->data->FEED;
    }

    public function getNAME()
    {
        return $this->data->NAME;
    }

    public function getTARGET()
    {
        return $this->data->TARGET;
    }

    public function getTIMESTAMP()
    {
        return $this->data->TIMESTAMP;
    }

    public function getAuthorityId()
    {
        return $this->data->authority_id;
    }

    public function getBeaconHarvestTimestamp()
    {
        return $this->data->beacon_harvest_timestamp;
    }

    public function getBeaconUri()
    {
        return $this->data->beacon_uri;
    }

    public function getColumns(): array
    {
        $columns = [];
        for ($i = 1; $i <= 5; $i++) {
            $columns[$i] = $this->data->{'col' . $i};
        }
        return $columns;
    }

    public function getSourceFile()
    {
        return $this->data->source_file;
    }

    public function getTargetId()
    {
        return $this->data->target_id;
    }

    public function getTargetUri()
    {
        return $this->data->target_uri;
    }
}
