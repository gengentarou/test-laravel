<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with('category');

        // キーワード検索
        if ($request->keyword) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%{$keyword}%")
                    ->orWhere('first_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        // 性別検索
        if ($request->gender && $request->gender != 'all') {
            $query->where('gender', $request->gender);
        }

        // お問い合わせ種類検索
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // 日付検索
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        // 7件ずつ表示
        $contacts = $query->paginate(7)->withQueryString();

        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }
}