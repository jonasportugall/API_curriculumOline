<?php


namespace App\Services;

use App\Models\Curriculum;
use App\Models\People;
use App\Models\Province;
use App\Models\County;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Course;
use App\Models\Tecnologe;
use App\Models\Language;


use App\Http\Requests\StoreCurriculumRequest;




class CurriculumService{

    public function createProvincesWithCountys(){

        $provincesWithCountys = [
            'Bengo' => ['Caxito', 'Dande', 'Nambuangongo'],
            'Benguela' => ['Benguela', 'Catumbela', 'Lobito'],
            'Bié' => ['Kuito', 'Andulo', 'Camacupa'],
            'Cabinda' => ['Cabinda', 'Belize', 'Buco-Zau'],
            'Cunene' => ['Ondjiva', 'Cuanhama', 'Curoca'],
            'Huambo' => ['Huambo', 'Caála', 'Longonjo'],
            'Huíla' => ['Lubango', 'Chibia', 'Matala'],
            'Kuando Kubango' => ['Menongue', 'Cuito Cuanavale', 'Cuchi'],
            'Kwanza Norte' => ['N_dalatando', 'Ambaca', 'Lucala'],
            'Kwanza Sul' => ['Sumbe', 'Porto Amboim', 'Conda'],
            'Luanda' => ['Luanda', 'Cacuaco', 'Viana'],
            'Lunda Norte' => ['Dundo', 'Cambulo', 'Capenda-Camulemba'],
            'Lunda Sul' => ['Saurimo', 'Cacolo', 'Dala'],
            'Malanje' => ['Malanje', 'Cacuso', 'Calandula'],
            'Moxico' => ['Luena', 'Camacupa', 'Léua'],
            'Namibe' => ['Namibe', 'Tômbwa', 'Bibala'],
            'Uíge' => ['Uíge', 'Negage', 'Mucaba'],
            'Zaire' => ['Mbanza Kongo', 'N_zeto', 'Soyo'],
        ];
        

        foreach($provincesWithCountys as $nameProvince => $counties){
            $province = Province::create(['name' => $nameProvince]);
    
            foreach ($counties as $nameCounty){
                $province->counties()->create(['name' => $nameCounty]);
            }
        }

        return response()->json(['message'=>'provinces and couties inserteds sucessfully',201]);
        
    }

    public function createFormation(Request $request, $people_id){
        foreach($request->formations as $formationData){
            $formation = new Formations();
            $formation->course = $formationData['course'];
            $formation->instituition = $formationData['instituition'];
            $formation->level = $formationData['level'];
            $formation->start_date = $formationData['start_date'];
            $formation->end_date = $formationData['end_date'];
            $formation->people_id = $people_id;
            $formation->save();
        }
        return response()->json(['message'=>'formation inserted sucessfully',201]);
    }

    public function createCourses(Request $request, $people_id){
        foreach($request->courses as $courseData){
            $course = new Course();
            $course->name = $courseData['name'];
            $course->instituition = $courseData['instituition'];
            $course->description = $courseData['description'];
            $course->people_id = people_id;
            $course->save();
        }

        return response()->json(['message'=>'course inserted sucessfully',201]);

    }

    public function createExperiencie(Request $request, $people_id){
        foreach($request->experiences as $experienceData){
            $experience = new Experience();
            $experience->name = $experienceData['name'];
            $experience->instituition = $experienceData['instituition'];
            $experience->description = $experienceData['description'];
            $experience->start_date = $experienceData['start_date'];
            $experience->end_date = $experienceData['end_date'];
            $experience->people_id = people_id;
            $experience->save();
        }
    }

    public function createTecnologie(Request $request, $people_id){
        foreach($request->tecnologies as $tecnologieDate){
            $people_tecnologie = new People_Tecnologie();
            $people_tecnologie->people_id = $people_id;
            $people_tecnologie->tecnologie_id = $tecnologieDate['tecnologie_id'];
            $people_tecnologie->save();
        }
        return response()->json(['message'=>'tecnologie created sucessfully', 201]);
    }
    
    //public function createCurriculum(StoreCurriculumDTO $request):Curriculum
    public function createCurriculum(StoreCurriculumRequest $request):Curriculum{
                //crete an people
                
                dd('sim,mmmm');
                
                $people = new People();
                $people->province_id = 1;
                $people->county_id = 2;
                $people->name = $request->name;
                $people->gender = $request->gender;
                $people->telephone = $request->telephone;
                $people->address = $request->address;
                $people->date_of_birth = $request->date_of_birth;
                $people->name = $request->name;
                $people->save();
                $new_people_id = $people->id;
        
                createFormations($request,$new_people_i);

                createCourses($request,$new_people_id);
                
                createExperiencie($request,$new_people_id);
                
                createTecnologie($request,$new_people_id);
        
                $curriculum = new Curriculum();
                $curriculum->user_id = $request->user_id;
                $curriculum->who = $request->who;//the who is to control to who is this curriculum.
                                                //the curriculum can be of the user or of other, 
                                                //but is being created by the user
                
                $curriculum->save();
                return response()->json(['message' => 'Curriculum created succfully!'], 201);
                return $curriculum;
          
    }

}



