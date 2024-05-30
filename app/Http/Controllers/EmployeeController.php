<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(){
        return view ('employees.index');
    }

    public function show(){
        $employees =  Employee::get();

        return view('employees.show',compact('employees'));
    }

    public function store(Request $request){    
        $request->validate(
            [
            'firstname'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
            'middlename'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
            'lastname'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
            'age'=>'required|max:255|integer',
            'gender'=>'required|max:255|string',
            ],

            [   
                'firstname.required' => 'First name is required',
			    'firstname.regex' => 'Only alphabets are allowed',
                'middlename.required' => 'Middle name is required',
			    'middlename.regex' => 'Only alphabets are allowed',
                'lastname.required' => 'Last name is required',
			    'lastname.regex' => 'Only alphabets are allowed',
            ]
    
    );

        Employee::create([
            'firstname'=>$request['firstname'],
            'middlename'=>$request['middlename'],
            'lastname'=>$request['lastname'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
        ]);

        return redirect('employees')->with('status','Employee Created');
    }

    public function edit(int $id){
        $employees = Employee::findOrFail($id);

        // return $employees;

        return view('employees.edit', compact('employees'));
    }

    public function update(Request $request, int $id){
        $request->validate(
                [
                'firstname'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
                'middlename'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
                'lastname'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
                'age'=>'required|max:255|integer',
                'gender'=>'required|max:255|string',
                ],
    
                [   
                    'firstname.required' => 'First name is required',
                    'firstname.regex' => 'Only alphabets are allowed',
                    'middlename.required' => 'Middle name is required',
                    'middlename.regex' => 'Only alphabets are allowed',
                    'lastname.required' => 'Last name is required',
                    'lastname.regex' => 'Only alphabets are allowed',
                ]
    );

        Employee::findOrFail($id)->update([
            'firstname'=>$request['firstname'],
            'middlename'=>$request['middlename'],
            'lastname'=>$request['lastname'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
        ]);

        return redirect('employees/show');
    }
    
    public function destroy(int $id){
        $employees = Employee::findOrFail($id);
        $employees->delete();

        return redirect('employees/show');
    }
    
}
