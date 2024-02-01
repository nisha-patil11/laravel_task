@extends('layouts.app')

@section('content')
    <h1>Employee List</h1>

    <a href="{{ route('employee.create') }}" class="btn btn-success">Add Employee</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                    <input data-id="{{$employee->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $employee->active ? 'checked' : '' }}> 
                    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>  
                </td>
               </tr>
            </tbody>
            @endforeach
         </table>
      </div>
   </body>
</html>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
           $('.toggle-class').change(function() { 
            console.log('in functiom');
           var status = $(this).prop('checked') == true ? 1 : 0;  
           var employee_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/status/update', 
               data: {'status': status, 'employee_id': employee_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
</script>
