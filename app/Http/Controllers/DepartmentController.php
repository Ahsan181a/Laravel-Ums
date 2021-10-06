<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $departments =Department::orderBy('created_at','DESC')->get();
        return view('backend.department.department_index',compact('departments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.department.department_create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'name'=>'required|min:2|unique:departments',
        ]);
        $department = new Department();
        $department->name = $request->name;
        $department->save();
        return redirect()->route('department.index');
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
         $editDept=Department::findOrfail($id);
         return view('backend.department.department_edit',compact('editDept'));
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
         try {
            $this->validate($request,[
                'name'=> 'required|unique:departments,name,'.$id,
            ]);
            $department = Department::findOrFail($id);
            $department->name = $request->name;
            $department->save();
            return  redirect()->route('department.index')->with('success','supplier updated successful');
        } catch (Exception $e) {
            
        }
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $department=Department::find($id);
        $department->delete();
        return redirect()->back();
        
    }
}

