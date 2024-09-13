<?php

namespace domain\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemService
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

    public function store($data)
    {
        return $this->item->create($data);
    }

    public function delete($item_id)
    {
        $item = $this->item->findOrFail($item_id);
        if ($item->image_path) {
            Storage::disk('public')->delete($item->image_path);
        }
        return $item->delete();
    }

    public function status($item_id)
    {
        $item = $this->item->findOrFail($item_id);
        $item->status = !$item->status;
        $item->save();
        return $item;
    }

    public function update(array $data, $item_id)
    {
        $item = $this->item->findOrFail($item_id);

        if (isset($data['image_path']) && $item->image_path) {
            Storage::disk('public')->delete($item->image_path);
        }

        $item->update($data);
        return $item;
    }
}
