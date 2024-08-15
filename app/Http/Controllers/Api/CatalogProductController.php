<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatalogProduct;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class CatalogProductController extends Controller
{
    public function index()
    {
        return response()->json(CatalogProduct::all());
    }

    public function show($id)
    {
        $product = CatalogProduct::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|min:3|max:255',
                'description' => 'nullable|string|max:500',
                'height' => 'nullable|numeric|between:0,9999.99',
                'length' => 'nullable|numeric|between:0,9999.99',
                'width' => 'nullable|numeric|between:0,9999.99',
            ]);

            $product = CatalogProduct::create($request->all());
            return response()->json($product, 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to create product: ' . $e->getMessage()], 500);
        }


    }

    public function update(Request $request, $id)
    {
        try {

            $product = CatalogProduct::find($id);
            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|min:3|max:255',
                'description' => 'nullable|string|max:500',
                'height' => 'nullable|numeric|between:0,9999.99',
                'length' => 'nullable|numeric|between:0,9999.99',
                'width' => 'nullable|numeric|between:0,9999.99',
            ]);

            $product->update($validatedData);

            return response()->json($product);

        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $product = CatalogProduct::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    // Batch Create
    public function batchStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                '*.name' => 'required|string|min:3|max:255',
                '*.description' => 'nullable|string|max:500',
                '*.height' => 'nullable|numeric|between:0,9999.99',
                '*.length' => 'nullable|numeric|between:0,9999.99',
                '*.width' => 'nullable|numeric|between:0,9999.99',
            ]);

            $products = CatalogProduct::insert($validatedData);

            return response()->json(['message' => 'Products created successfully', 'products' => $products], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Batch Update
    public function batchUpdate(Request $request)
    {
        try {
            $updates = $request->validate([
                '*.id' => 'required|exists:catalog_products,_id',
                '*.name' => 'nullable|string|min:3|max:255',
                '*.description' => 'nullable|string|max:500',
                '*.height' => 'nullable|numeric|between:0,9999.99',
                '*.length' => 'nullable|numeric|between:0,9999.99',
                '*.width' => 'nullable|numeric|between:0,9999.99',
            ]);

            $updatedProducts = [];
            foreach ($updates as $update) {
                $product = CatalogProduct::find($update['id']);
                if ($product) {
                    $product->update($update);
                    $updatedProducts[] = $product;
                }
            }

            return response()->json(['message' => 'Products updated successfully', 'products' => $updatedProducts]);

        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Batch Delete
    public function batchDestroy(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'required|string|size:24',
            ]);

            $objectIds = array_map(function($id) {
                return new ObjectId($id);
            }, $validatedData['ids']);

            $existingProducts = CatalogProduct::whereIn('_id', $objectIds)->pluck('_id')->toArray();

            if (count($existingProducts) !== count($objectIds)) {
                $nonExistingIds = array_diff($objectIds, $existingProducts);
                return response()->json([
                    'message' => 'Some products do not exist',
                    'non_existing_ids' => $nonExistingIds
                ], 404);
            }

            CatalogProduct::whereIn('_id', $objectIds)->delete();

            return response()->json(['message' => 'Products deleted successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
