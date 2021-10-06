<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students =Student::orderBy('created_at','DESC')->get();
        return view('backend.student.student_index',compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=Student::all();
        $departments=Department::all();
        return view('backend.student.student_create',compact('students','departments'));
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
            'name'=>'required|min:2|unique:students',
            'mobile_no'=>'required|min:2|unique:students',
            'email'=>'required|min:2|unique:students',
            
        ]);
        $student = new Student();
        $student->department_id = $request->department_id;
        $student->name = $request->name;
        $student->mobile_no= $request->mobile_no;
        $student->email = $request->email;
        $student->save();
        return redirect()->route('student.index');
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
        
        $data['editStudent']=Student::findOrfail($id);
        $data['departments']=Department::all();
         return view('backend.student.student_edit',$data);
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
                'name'=> 'required|unique:students,name,'.$id,
                'mobile_no'=> 'required|unique:students,mobile_no,'.$id,
                'email'=> 'required|unique:students,email,'.$id,
            ]);
            $student = Student::findOrFail($id);
            $student->name = $request->name;
            $student->mobile_no=$request->mobile_no; 
            $student->email = $request->email;
            $student->save();
            return  redirect()->route('student.index')->with('success','student updated successful');
        } catch (Exception $e) {
            return  redirect()->route('student.index')->with('error',$e->getMessage());
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
        $Student=Student::find($id);
        $Student->delete();
        return redirect()->back();
        
    }
}
