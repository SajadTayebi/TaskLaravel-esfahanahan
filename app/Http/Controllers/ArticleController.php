<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle = 'صفحه اصلی';
        $images = Article::all();
        return view('article.index', compact('images', 'pagetitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = 'درج مطلب جدید';
        return view('article.create', compact('pagetitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'name.required'=>'فیلد عنوان مطلب اجباری است.',
            'description.requierd'=>' فیلد شرح مطلب الزامی است.',
            'image.requierd'=>' فیلد عکس مطلب الزامی است.',
        ];
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],$messages);

        $image = Article::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);
        if ($image) {
            if ($request->hasFile('image')) {
                $image->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }

        session()->flash('success', 'مطلب جدید با موفقیت درج شد');

        return redirect()->route('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagetitle = 'مطلب شماره '. $id;
        $images = Article::find($id);
        return view('article.show', compact('pagetitle', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagetitle = 'ویرایش مطلب';
        $image = Article::find($id);

        return view('article.edit', compact('image', 'pagetitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = Article::find($id);
        $image->name = $request->name;
        $image->description = $request->description;
        $image->save();

        if ($image) {
            if ($request->hasFile('image')) {
                $image->clearMediaCollection('images');
                $image->addMediaFromRequest('image')->toMediaCollection('images');
            }

        }

        session()->flash('success', 'مطلب با موفقیت بروزرسانی شد');

        return redirect()->route('article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
