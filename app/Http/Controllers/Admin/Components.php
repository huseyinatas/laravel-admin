<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\ComponentParent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Components extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $components = Component::where('parent_id', '=', 8)->first();
        return $components->translate('tr')->properties;
        return view('admin.components');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $parents = ComponentParent::all();
        return view('admin.add-component', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function store(Request $request)
    {
        if (!$request->file())
            return back()->withErrors(['file', 'Lütfen Component resmini yükleyiniz.']);

        $fileFullName = $request->file('image')->getClientOriginalName();
        $fileExtension = Str::slug(pathinfo($fileFullName, PATHINFO_FILENAME));
        $uploadFileExtension = $request->file('image')->getClientOriginalExtension();

        if ((!$uploadFileExtension == 'png') || (!$uploadFileExtension == 'jpeg') || (!$uploadFileExtension == 'jpg'))
            return back()->withErrors(['file', 'Yanlış uzantılı bir dosya yüklediniz.']);

        $newFileName = date('Y-m-d').rand(0,19999).'-'.$fileExtension.'.'.$uploadFileExtension;

        $file = $request->file('image');
        $filePath = 'uploads/components/'.$newFileName;
        Storage::disk('public')->put($filePath, File::get($file));

        $createData = [
            'parent_id' => $request->post('parent')
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = [
            'parent_id' => $req->parent,
            'author' => 'Admin',
            'locale' => 'tr',
            'slug' => 'hayalinizdeki-tatil',
            'title' => $req->post('title'),
            'description' => $req->post('description'),
            'image' => $filePath,
            'properties' => json_encode($req->post('properties'))
        ];
        $post = Component::create($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
