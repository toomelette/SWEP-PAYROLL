<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Swep\Services\DepartmentUnitService;
use App\Http\Requests\DepartmentUnitFormRequest;


class DepartmentUnitController extends Controller{


    protected $department_unit;



    public function __construct(DepartmentUnitService $department_unit){

        $this->department_unit = $department_unit;

    }



    
    public function index(Request $request){
        
        return $this->department_unit->fetchAll($request);

    }

    



    public function create(){

        return view('dashboard.department_unit.create');

    }

   



    public function store(DepartmentUnitFormRequest $request){

        return $this->department_unit->store($request);
        
    }

    



    public function show($slug){


        
    }

    


    public function edit($slug){

        return $this->department_unit->edit($slug);
        
    }

    


    public function update(DepartmentUnitFormRequest $request, $slug){

       return $this->department_unit->update($request, $slug);
        
    }

    



    public function destroy($slug){

        return $this->department_unit->destroy($slug);

    }




}