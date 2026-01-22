<?php

namespace VuFindBEACONFinder;

class Result implements \Countable, \Iterator
{
    protected \stdClass $json;

    protected array $items;

    protected int $position;

    public function __construct(\stdClass $json)
    {
        $this->json = $json;
        $this->items = [];
        foreach ($json->items as $item) {
            $this->items[] = new Item($item);
        }
    }

    public function count(): int
    {
        return $this->json->count;
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
