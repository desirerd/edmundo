<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Description;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Genero 40 cursos y una vez hecho, descargo las imagenes y los almaceno en la tabla IMAGES */
        $courses = Course::factory(40)->create();
        
        foreach($courses as $course){
            
         Image::factory(1)->create([

            'imageable_id' => $course->id,
            'imageable_type' => 'App\Models\Course'
         ]);



         // Generar Requerimentos

            Requirement::factory(4)->create([

                'course_id' => $course->id
            ]);

            Goal::factory(4)->create([

                'course_id' => $course->id
            ]);

            Audience::factory(4)->create([

                'course_id' => $course->id
            ]);

            $sections = Section::factory(4)->create(['course_id' => $course->id]);

            foreach ($sections as $section){
               $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);
            
                foreach ($lessons as $lesson){

                    Description::factory(1)->create(['lesson_id' => $lesson->id]);
                }
            }
        }
    }
}