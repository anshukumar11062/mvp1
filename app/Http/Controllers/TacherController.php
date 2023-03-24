<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TacherController extends Controller
{
    // Test function

    public function addStudent(Request $request)
    {
        try {
            $mStudent = new Student();
            $metaReq=[
                'teacher_id'=>$request->teacherId,
                'student_name'=>$request->studentName
            ];
            $returnData = $mStudent->store($metaReq);
            $message="Successfully Saved";
            return response()->json(["status" => true,"message"=>$message, "data" => $returnData]);
        } catch (Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage(), "data" => ""]);
        }
    }


    public function getAllTeachers(){
       return $response = Http::post('192.168.100.14:82/api/teacher-list', [
        ]);
    }
}
