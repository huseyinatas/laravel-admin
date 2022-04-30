<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Models\ComponentParent;
class ComponentParents extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = ComponentParent::all();
        return view('admin.component-parent', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'title' => [
                "type" => 'text',
                "content" => 'Hayalinizdeki Tatil'
            ],
            "leftImg" => [
                "type" => 'img',
                "content" => ''
            ],
            "rightImg" => [
                "type" => 'img',
                "content" => ''
            ],
            "description" => [
                "type" => 'text',
                "content" => ''
            ],
            "btnTitle" => [
                "type" => 'text',
                "content" => ''
            ],
            "btnUrl" => [
                "type" => 'text',
                "content" => ''
            ],
            "btnLocal" => [
                "type" => 'bool',
                "content" => ''
            ]
        ];
        $datam = json_encode($datas);
        $data = [
            'parent_id' => 8,
            'author' => 'Gummibeer',

            'tr' => [
                'slug' => 'hayalinizdeki-tatil',
                'title' => 'My first post',
                'description' => 'My first post',
                'image' => 'My first post',
                'properties' => $datam,
            ],
            'en' => [
                'slug' => 'hayalinizdeki-tatil',
                'title' => 'My first post',
                'description' => 'My first post',
                'image' => 'My first post',
                'properties' => $datam,
            ],
            'de' => [
                'slug' => 'hayalinizdeki-tatil',
                'title' => 'My first post',
                'description' => 'My first post',
                'image' => 'My first post',
                'properties' => $datam,
            ],
            'ru' => [
                'slug' => 'hayalinizdeki-tatil',
                'title' => 'My first post',
                'description' => 'My first post',
                'image' => 'My first post',
                'properties' => $datam,
            ],

        ];
        $post = Component::create($data);
        echo $post->translate('tr')->properties;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = trim($request->post('name'));
        if (!empty($name)){
            $parents = new ComponentParent;
            $parents->title = $name;
            if ($parents->save()) return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
