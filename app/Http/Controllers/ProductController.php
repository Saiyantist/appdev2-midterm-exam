<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller

/**
 * Task 2: Creating Controllers (10 marks)
 * 
 * 1. Generate a controller named ProductController.
 * 
 * 2. Implement methods in the ProductController for:
 * 
 *      ○ Retrieving a list of all products. ✅
 *          i. Response message: Display all products.
 * 
 *      ○ Creating a new product. ✅
 *          i. Response Message: Product created successfully.
 * 
 *      ○ Retrieving a specific product by ID. ✅
 *          i. Response Message: Display product with ID: <id>
 * 
 *      ○ Updating an existing product by ID. ✅
 *          i. Response Message: Product with ID: <id> updated successfully.
 * 
 *      ○ Deleting a product by ID. ✅
 *          i. Response Message: Product with ID: <id> deleted successfully.
 * 
 *      ○ Add a new method uploadImageLocal to handle uploading an image using the local disk driver. ✅
 *          i. Response Message:Image successfully stored in local disk driver.
 * 
 *      ○ Add another method uploadImagePublic to handle uploading an image using the public disk driver. ✅
 *          i. Response Message:Image successfully stored in public disk driver.
 */

{
    /**
     * LIST ALL PRODUCTS
     */
    public function index()
    {
        return response()->json([
            'message' => 'Display all products.',
        ]);
    }

    /**
     * CREATE A NEW PRODUCT
     */
    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Product created successfully.',
        ]);
    }

    /**
     * DISPLAY A PRODUCT BY ID
     */
    public function show(string $id)
    {
        return response()->json([
            'message' => 'Display product with ID: ' . $id,
        ]);
    }

    /**
     * UPDATE A PRODUCT BY ID
     */
    public function update(Request $request, string $id)
    {
        return response()->json([
            'message' => 'Product with ID: ' . $id . ' updated successfully.' ,
        ]);
    }

    /**
     * DELETE A PRODUCT BY ID
     */
    public function destroy(string $id)
    {
        return response()->json([
            'message' => 'Product with ID: ' . $id . ' deleted successfully.' ,
        ]);
    }


    /**
     * HANDLE IMAGE UPLOAD from LOCAL DISK DRIVER.
     */
    public function uploadImageLocal(Request $request)
    {
        if ($request->hasFile('image')) {
            Storage::disk('local')->put('/', $request->file('image'));
            return response()->json([
                'message' => 'Image successfully stored in LOCAL disk driver' ,
            ]);
        }
        return response()->json([
            'message' => 'Image not stored.' ,
        ]);
    }

    /**
     * HANDLE IMAGE UPLOAD from PUBLIC DISK DRIVER.
     */
    public function uploadImagePublic(Request $request)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->put('/', $request->file('image'));
            return response()->json([
                'message' => 'Image successfully stored in PUBLIC disk driver' ,
            ]);
        }
        return response()->json([
            'message' => 'Image not stored.' ,
        ]);
    }
}
