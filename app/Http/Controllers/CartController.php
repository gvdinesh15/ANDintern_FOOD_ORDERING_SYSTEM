<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Existing methods...

    public function showAdminPage()
    {
        // Add your logic to fetch and display ordered data
        return view('admin');
    }

    public function storeOrderedData(Request $request)
    {
        // Add logic to store ordered items in the database or perform other actions
        return response()->json(['message' => 'Order stored successfully']);
    }
}

