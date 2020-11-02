<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $categories = Category::paginate(10);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //dd($request->all());
        $category = new Category;
        $category->name      = $request->name;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $category->photo = 'imgs/'.$file;
        }
        $category->description = $request->description;

        if($category->save()) {
            return redirect('categories')->with('message', 'La Categoría: '.$category->name.' fue Adicionada con Exito!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //dd($user);
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //dd($request->all());
        $category->name  = $request->name;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $category->photo = 'imgs/'.$file;
        }
        $category->description = $request->description;

        if($category->save()) {
            return redirect('categories')->with('message', 'La Categoría: '.$category->name.' fue Modificada con Exito!');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            return redirect('categories')->with('message', 'La Categoría: '.$category->name.' fue Eliminada con Exito!');
        } 
    }
}