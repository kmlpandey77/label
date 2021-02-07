<?php

namespace Kmlpandey77\Label\Http\Controllers;

use Illuminate\Http\Request;
use Kmlpandey77\Label\Models\Label as LabelModel;
use Illuminate\Support\Str;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $labels = LabelModel::where('lang','en')->get();
        return view('label::index',compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pages = ['global', 'home'];
        $pages = LabelModel::groupBy('page')->select('page')->get();
        return view('label::create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'page' => 'required',
            'labelid' => 'required|unique:labels'
        ];

        if($request->page == "new_page"){
            $rules['new_page'] = 'required';
        }

        $this->validate($request, $rules);

        $page = $request->page == "new_page"? strtolower($request->new_page):$request->page;
        foreach($request->value as $key => $value){
            $label = new LabelModel;
            $label->page = $page;
            $label->labelid = $page.':'.Str::slug($request->labelid,'_');
            $label->value = $value;
            $label->lang = $key;
            $label->save();
        }
        return redirect()->route('labels.index')->with('success', 'Label added.');
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
    public function edit(LabelModel $label)
    {
        // $pages = ['global', 'home'];
        $pages = LabelModel::groupBy('page')->select('page')->get();
        $labels = LabelModel::where('labelid', $label->labelid)->select('id','lang','value')->get()->keyBy('lang');
        return view('label::edit', compact('pages', 'label','labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabelModel $label)
    {
        $this->validate($request, [
            'labelid' => 'required',
            ]);
        foreach($request->value as $key => $value){
        $label->value = $value;
        $label->save();
        }
        return redirect()->route('labels.index')->with('success', 'Label saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabelModel $label)
    {
        if($label && $label->delete()){
            return redirect()->route('labels.index')->with('success', 'Label deleted.');
        }else{
            return redirect()->route('labels.index')->with('error', 'Error while deleting Label.');
        }
    }
}
