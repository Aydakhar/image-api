<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $path = $request->file('image')->store('images', 'public');

        $image = new Image();
        $image->url = $request->file('image')->getClientOriginalName();
        $image->path = $path;
        $image->save();

        return response()->json(['message' => 'Image uploaded successfully', 'image' => $image]);
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $images = Image::all();
        return response()->json(['images' => $images]);
    }
}
