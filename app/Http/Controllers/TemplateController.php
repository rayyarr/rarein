<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $template = Template::latest()->paginate(5);

        return view('admin.template.index', compact('template'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string|max:255',
        ]);

        // Simpan data template tanpa menyertakan file gambar
        $template = Template::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
        ]);

        // Dapatkan ID template yang baru saja dibuat
        $templateId = $template->id;

        // Ubah nama file gambar sesuai dengan ID template
        $imageName = $templateId . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('images/template'), $imageName);

        // Update nama file gambar dalam data template
        $template->update(['image' => $imageName]);

        return redirect()->route('template.index')->with('success', 'Template created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        return view('admin.template.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        return view('admin.template.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'desc' => 'required|string|max:255',
        ]);

        $template->update($request->all());

        return redirect()->route('template.index')->with('success', 'Template updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('template.index')->with('success', 'Template deleted successfully');
    }
}
