<?php

namespace VuFindBEACONFinder;

class Result implements \Countable, \Iterator
{
    protected \stdClass $json;

    protected array $items;

    protected int $position;

    public function __construct(\stdClass $json, array $blacklist = [], array $whitelist = [])
    {
        $useBlacklist = count($blacklist) > 0;
        $useWhitelist = count($whitelist) > 0;

        $this->json = $json;
        $this->items = [];
        foreach ($json->items as $item) {
            $item = new Item($item);

            $toSearch = [$item->getFEED(), $item->getNAME()];

            if ($useBlacklist && array_intersect($toSearch, $blacklist) != []) {
                continue;
            }
            if ($useWhitelist && array_intersect($toSearch, $whitelist) == []) {
                continue;
            }

            $this->items[] = $item;
        }
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function current(): Item
    {
        return $this->items[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }
}
