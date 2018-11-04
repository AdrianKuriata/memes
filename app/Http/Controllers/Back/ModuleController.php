<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    protected $module;

    public function __construct()
    {
        $this->module = config('modules')[request()->route('module')];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $module)
    {
        $search = $request->search?? '';
        $columns = $this->module->getColumns();
        $fields = $this->module->getFields();
        $items = $this->module->where('name', 'like', '%'. $search .'%')->orWhere('name', 'like', '%'. $search .'%')->paginate(20);

        return view('back.modules.index', compact('columns', 'fields', 'items', 'module', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $module Module name
     * @return \Illuminate\Http\Response
     */
    public function create($module)
    {
        $form = $this->module->getForm();

        return view('back.modules.create', compact('form', 'module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->module->getRules());
        $this->module->create(array_merge($request->all(), ['password' => bcrypt('admin')]));

        flash('Wartość została poprawnie utworzona.')->success();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $module Module name
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($module, $id)
    {
        $item = $this->module->findOrFail($id);
        $form = $this->module->getForm($item);

        return view('back.modules.edit', compact('module', 'item', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $module, $id)
    {
        $this->validate($request, $this->module->getRules());
        $this->module->findOrFail($id)->update($request->all());

        flash('Wartość została poprawnie zmieniona.')->success()->important();
        return redirect()->route('admin.{module}.index', ['module' => $module]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($module, $id)
    {
        $this->module->findOrFail($id)->delete();

        return redirect()->route('admin.{module}.index', ['module' => $module]);
    }
}
