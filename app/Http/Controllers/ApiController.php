<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Province;
use App\Models\People;
use App\Http\Requests\StoreCurriculumRequest;
use App\Services\CurriculumService;
use Illuminate\Http\Request;

class ApiController extends Controller
{   

    public function teste(){
       return 'api funcionamento 100%';
    }


    /*
    =============================================    CREATES   ==========================================
    */
    //StoreCurriculumRequest $request, CurriculumService $curriculumService
    public function createCurriculum(StoreCurriculumRequest $request, CurriculumService $curriculumService){
        //dd('validei');
       
        return $curriculumService->createCurriculum( $request );
        //$curriculumService->createCurriculum( $request->toDTO() );
    }







    /*
    =============================================    GETS   ==========================================
    */
  
    public function formCreateCurriculum(){
        return view('forms/form-create-curriculum');
    }


    public function crieProvincias(CurriculumService $curriculumService){
        $curriculumService->createProvincesWithCountys();
    }




    public function getPeopleById($people_id){
        $people = People::find($people_id);
        if(!$people){
            return response->json(['error' => 'Erro, people not found!'],404);
        }
        return response->json(['date'=>$people],200);
    }

    public function getCurriculumByIdPeople($people_id){
            $pessoa = Pessoa::with(['experiencies', 'courses', 'formacaos', 'provinces',' counties', 'tecnologies','curriculum'])->find($people_id);
            return response()->json($pessoa);
    }

    public function getCurriculumsByNamePeople($name,$criationDate){
        $pessoa = Pessoa::with(['experiencies', 'courses', 'formacaos', 'provinces',' counties', 'tecnologies','curriculum'])->find($name);
        return response()->json($pessoa);
    }

    public function getAllCurriculumsByUser($user_id){
        $curriculum = Curriculum::with(['people','people.province','people.county','people.courses','people.experiencies','people.formacaos','people.tecnologies'])
        ->where('user_id',$user_id)
        ->get();
        return json($curriculum);
    }

    public function getAllCurriculums(){

        $curriculum = Curriculum::with(['people','people.province','people.county','people.courses','people.experiencies','people.formacaos','people.tecnologies']);
        return json($curriculum);
    }

    public function getAllProvincies(){
        $provinces = Province::with('counties')->get();
        return response()->json($provinces,200);
    }

    public function getAllCounties(){
        $counties = County::all();
        return response()->json($counties,200);
    }

    /*
    =============================================    UPDATES ==========================================
    */
    public function updatePeople(Request $request, $people_id){
        $people = People::find($people_id);
        $people->province_id = $request->province_id;
        $people->county_id = $request->county_id;
        $people->name = $request->name;
        $people->email = $request->email;
        $people->phone = $request->phone;
        $people->save();
        return response()->json(['message'=>'people updated sucessfully', 200]);
    }
    
    public function updateFormations(Request $request, $people_id){
        foreach($request->formations as $formationDate){
            $formation = Formation::where('people_id',$people_id)->find($formationDate['formation_id']);
            if($formation){
                $formation->update($formationDate);
            }
        }
    }

    public function updateCourses(Request $request, $people_id){
        foreach($request->courses as $courseDate){
            $course = Course::where('people_id',$pople_id)->find($courseData['course_id']);
            if($course){
                $course->update($courseDate);
            }
        }
    }

    public function updateExperiences(Request $request, $people_id){
           foreach($request->experiences as $experienceDate){
            $experience = Experience::where('people_id',$people_id)->find($experienceDate['experience_id']);
            if($experience){
                $experience->update($experienceDate);
            }
        }
    }

    public function updateCurriculumByIdPeople(Request $request, $people_id,$curriculum_id){
    

        $validator = Validator::make($request->all(),[
            'who' =>'required',
            'province_id' => 'required',
            'county_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'formations' => 'required|array',
            'courses' => 'required|array',
            'experiences' => 'required|array',
            'tecnologies' => 'required|array',
        ]);
        // verify if the validation is failhed
        if ($validator->fails()){
            return response()->json(['error' => $validator->errors()], 400);
        }

        
        updatePeople( $request , $people_id );//update people
        updateFormations($request, $people_id);//update formations
        updateCourses($request, $people_id);   //update courses
        updateExperiences($request, $people_id); //update experienies
        updateTecnologies($request, $people_id);//update tecnologies
        updateLanguages($request, $people_id);//update languages 

        return response->json(['message'=>'update updated successfully'],201);

        
    }

    /*
    =============================================    DELETES ==========================================
    */

    public function deleteCurriculumByIdPeople($people_id){
        People::find($people_id)->delete();
        return response()->json(['message'=>'curriculum deleted sucessfully'],200);
    }

    
    /*
    =============================================    OTHERS OPERATIONS ==========================================
    */


    
    public function changeModelOfCurriculum(){}   

}
