<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request)
{
    $contact = $request->all();

    $category = Category::find($request->category_id);
    $contact['category_content'] = $category->content;

    $genders = [1 => '男性', 2 => '女性', 3 => 'その他'];
    $contact['gender_text'] = $genders[$request->gender] ?? '不明';

    $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

    return view('confirm', compact('contact'));
}
    public function store(Request $request)
    {
        $contact = $request->only([
            'category_id','first_name','last_name','gender','email','tel','address','building','detail'
        ]);

        Contact::create($contact);
        return view('thanks');
    }
}
