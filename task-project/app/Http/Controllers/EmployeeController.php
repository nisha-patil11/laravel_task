<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee created successfully');
    }

    public function updateStatus(Request $request)
    {
        $employeeStatus = Employee::find($request->employee_id); 
        $employeeStatus->active = $request->status; 
        $employeeStatus->save(); 
        return response()->json(['success'=>'Status change successfully.']); 
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }
}
