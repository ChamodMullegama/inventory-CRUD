<?php

namespace domain\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class HomeServices
{
    protected $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function get($item_id)
    {
        return $this->item->findOrFail($item_id);
    }

    public function all()
    {
        return $this->item->all();
    }
}
