<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taskController extends Controller
{
    public function ShowAllStudent(){

        $students = DB::table('student')
                    ->get();

        return view('welcome',['students'=>$students]);
    }
    public function Remove(Request $request){
        $studentId = $request->productId;
        //$boxId=DB::delete('DELETE FROM item WHERE id='.$boxId);
        DB::table('student')
                ->where('id',$studentId)
                ->delete();
        
        //$studentId = DB::delete('DELETE FROM student WHERE id='.$studentId);
        return response()->json([$studentId]);
    }
    public function edit(Request $request,$studentId){
        //$getbox = DB::select('SELECT * FROM boxes where id='.$boxId);
        //$getStudent=DB::select('SELECT * FROM product');
        $getStudent=DB::table('student')
                        ->where('id',$studentId)
                        ->first();
        //$getbox=DB::select("SELECT * FROM quantity JOIN item on(item.id=quantity.itemId) where item.id=".$boxId." ORDER BY quantity.id DESC LIMIT 1");
        //$getboxes=DB::select("SELECT  * FROM quantity JOIN( item ) on item.id=quantity.itemId WHERE quantity.id IN (SELECT  max(quantity.id) FROM quantity JOIN( item ) on item.id=quantity.itemId GROUP by itemId)");
        
        return view('edit',['student'=>$getStudent]);
    }
    public function Doedit(Request $request,$studentId){
        //$getQuantity = DB::select('SELECT * FROM quantity where itemId='.$boxId.'ORDER BY quantity.id DESC LIMIT 1');
        DB::table('student')
            ->where('id',$studentId)
            ->update(['FullName'=>$request->name,'Email'=>$request->email,'Level'=>$request->level]);

        return redirect('/');
    }
    public function ShowAllCourses(){

        $courses = DB::table('course')
                    ->get();

        return view('courses',['courses'=>$courses]);
    }
    public function RemoveCourse(Request $request){
        $courseId = $request->productId;
        //$boxId=DB::delete('DELETE FROM item WHERE id='.$boxId);
        DB::table('course')
                ->where('id',$courseId)
                ->delete();
        
        //$studentId = DB::delete('DELETE FROM student WHERE id='.$studentId);
        return response()->json([$courseId]);
    }
    public function ShowAllStudentCourse(Request $request,$courseId){

        // $courseStudent = DB::table('student')
        //                     ->select(['student.*','course.*'])
        //                     ->join('gradeitem', 'student.id', '=', 'gradeitem.SID')
        //                     ->join('course', 'course.id', '=', 'gradeItem.CID')
        //                     ->where('course.id',$courseId)
        //                     ->get();
        $courseStudent = DB::table('student')
                            ->select(['*','student.id as studentId'])
                            ->leftjoin('gradeitem', 'student.id', '=', 'gradeitem.SID')
                            ->leftjoin('course', 'course.id', '=', 'gradeItem.CID')
                            ->where('course.id',$courseId)
                            ->groupby('student.id')
                            ->get();
        //$courseStudent=DB::select("SELECT *,student.id as studentId FROM student LEFT JOIN gradeitem ON student.id = gradeitem.SID LEFT JOIN course ON course.id = gradeitem.CID  WHERE CID = 5 GROUP BY studentId");

        $countTypes = DB::table('gradeitem')
                        ->select([DB::raw('COUNT(CID) as types') ,'type'])
                        ->where('CID',$courseId)
                        ->groupby('type')
                        ->get();

        $gradeStudent = DB::table('gradeitem')
                        ->select('gradeitem.*')
                        ->where('CID',$courseId)
                        ->orderby('SID')
                        ->get();

        $types = DB::table('gradeitem')
                        ->select('type')
                        ->distinct()
                        ->where('CID',$courseId)
                        ->get();
        
        
        
        if(count($countTypes) != 0){
            return view('info',['students'=>$courseStudent,'count'=>count($countTypes),'types'=>$types,'gradeStudents'=>$gradeStudent,'courseId'=>$courseId]);
        }
        else{
            return view('info',['students'=>$courseStudent,'count'=>0]);
        }
                        
        
    }
    public function RemoveStudentCourse(Request $request){
        $courseId = $request->productId;
        $studentId = $request->studentId;
        //$boxId=DB::delete('DELETE FROM item WHERE id='.$boxId);
        DB::table('gradeitem')
                ->where('CID',$courseId)
                ->where('SID',$studentId)
                ->delete();
        
        //$studentId = DB::delete('DELETE FROM student WHERE id='.$studentId);
        return response()->json([$courseId]);
    }
    
    public function create(){

        return view('creation');

    }
    
}
