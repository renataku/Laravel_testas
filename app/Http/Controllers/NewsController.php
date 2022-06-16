<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();
        $news = News::find(5);
        $news = News::latest()->paginate(6);
        return view('news.index', compact('news', 'categories'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }


    public function show(News $news): View
    {

        return view('news.show', compact('news'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('news.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $file = $request->file('file');
        $request->validate([
            'title' => 'required|between:5,255',
            'description' => 'max:500',
            'category_id' => 'required',
        ]);

        $data = $request->all();
        $data['file'] = null;

        if ($file && $file->isValid()) {
            $path = $file->store('files');
            $data['file'] = $path;
        }
        News::create($data);


        return redirect()->route('news.index')
            ->with('success', 'News created successfuly');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }

    public function edit(News $news): View
    {
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {

        $file = $request->file('file');
        if ($file && $file->isValid()) {
            $path = $file->store('files');
            $news->file = $path;
        }

        $request->validate([
            'title' => 'required|between:5,255',
            'description' => 'max:500',
            'category_id' => 'required',
        ]);

        $news->title = $request->title;
        $news->description = $request->description;
        $news->category_id = $request->category_id;
        $news->active = ($request->active) ?? 0;


        $news->update();
        return redirect()->route('news.index')
            ->with('success', 'News update successfuly');
    }
}
