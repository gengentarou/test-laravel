<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel_first',
            'tel_second',
            'tel_third',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        $contact['tel'] = $request->tel_first . '-' . $request->tel_second . '-' . $request->tel_third;
        $category = Category::find($request->category_id);

        return view('confirm', compact('contact', 'category'));
    }

    public function thanks()
    {
        return view('thanks');
    }
}
