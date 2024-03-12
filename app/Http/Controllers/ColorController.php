<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('color.index', compact('colors'));
    }

    public function show(Color $color)
    {
        return view('color.show', compact('color'));
    }

    public function create()
    {
        return view('color.create');
    }

    public function store(ColorRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);

        return redirect()->route('color.index');
    }

    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }

    public function update(Color $color, ColorRequest $request)
    {
        $data = $request->validated();
        $color->update($data);

        return view('color.show', compact('color'));
    }

    public function delete(Color $color)
    {
        $color->delete();

        return redirect()->route('color.index');
    }
}
