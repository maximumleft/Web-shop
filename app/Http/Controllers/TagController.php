<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        return view('tag.show', compact('tag'));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(TagRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);

        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(Tag $tag, TagRequest $request)
    {
        $data = $request->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
