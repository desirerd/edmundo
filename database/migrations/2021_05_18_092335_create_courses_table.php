<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Course;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();


            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status',[Course::BORRADOR, Course::REVISION,Course::PUBLICADO])->default(Course::BORRADOR);
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();

            // Método onDelete cascade, para que si el usuario se da de baja, automaticamente desaparezcan sus cursos.

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Método onDelete set null, para que si el nivel desaparece, el campo nivel se ponga a nulo pero los cursos con ese level no se elimine.
            
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            
            // Método onDelete set null, para que si la categoría desaparece, el campo category_id se ponga a nulo pero los cursos con ese level no se elimine.
            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            
            // Método onDelete set null, para que si el precio desaparece, el campo price_id se ponga a nulo pero los cursos con ese level no se elimine.
            
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
