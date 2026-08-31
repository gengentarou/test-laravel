<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $contact = $request->all();

        if (isset($contact['tel']))
        {
        $tel = explode('-', $contact['tel']);
        $contact['tel_first'] = $tel[0];
        $contact['tel_second'] = $tel[1];
        $contact['tel_third'] = $tel[2];
        }

        return view('index', compact('categories', 'contact'));
    }

    public function confirm(ContactRequest $request)
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

    //お問い合わせ内容の保存
    public function store(Request $request)
    {
        Contact::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);

        return view('thanks');
    }

    //サンクスページへの移動
    public function thanks()
    {
        return view('thanks');
    }

}
