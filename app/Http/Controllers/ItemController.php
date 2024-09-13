<?php


namespace App\Http\Controllers;

use domain\Facades\ItemFacade;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = ItemFacade::all();
        return view("Pages.Item.index", compact('items'));
    }

    public function all()
    {
        return ItemFacade::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:items',
            'description' => 'required|string',
            'Quantity' => 'required|integer|min:0',
            'stock_status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('item_images', 'public');
                $validated['image_path'] = $imagePath;
            }

            ItemFacade::store($validated);
            return redirect()->route('item.index')->with('success', 'Item added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('item.index')->with('error', 'Failed to add item. ' . $e->getMessage());
        }
    }

    public function delete($item_id)
    {
        try {
            ItemFacade::delete($item_id);
            return redirect()->route('item.index')->with('success', 'Item deleted successfully!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }
    }

    public function status($item_id)
    {
        return ItemFacade::status($item_id);
    }

    public function get($item_id)
    {
        $item = ItemFacade::get($item_id);
        return view('Pages.Item.item', compact('item'));
    }


    public function edit($item_id)
    {
        $item = ItemFacade::get($item_id);
        return view("Pages.Item.edit", compact('item'));
    }


    public function update(Request $request, $item_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:items,code,' . $item_id,
            'description' => 'required|string',
            'Quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('item_images', 'public');
                $validated['image_path'] = $imagePath;
            }

            ItemFacade::update($validated, $item_id);
            return redirect()->route('item.index')->with('success', 'Item updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('item.edit', $item_id)->with('error', 'Failed to update item. ' . $e->getMessage());
        }
    }
}
