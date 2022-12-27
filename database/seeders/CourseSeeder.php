<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course;
        $course->code = 'M87943';
        $course->name = 'Desarrollo Web';
        $course->description = 'Desarrollo web es un término que define la creación de sitios web para Internet o una intranet. Para conseguirlo se hace uso de tecnologías de software del lado del servidor y del cliente.';
        $course->classroom = 'M8-206';
        $course->methodology = 'Presencial';
        $course->save();


        $course = new Course;
        $course->code = '589640';
        $course->name = 'Matematicas Básicas';
        $course->description = 'Este curso busca fortalecer los conocimientos matemáticos adquiridos en la formación básica y potenciar las capacidades operativas y manejo de conceptos matemáticos y sus aplicaciones en las ciencias. Su contenido se caracteriza por el manejo de los números y las funciones reales, principios de álgebra, los fundamentos de la trigonometría y un desarrollo de las secciones cónicas. Así mismo afianza los conocimientos y las técnicas operativas básicas mínimas requeridas para la resolución de problemas en ciencias, y las herramientas básicas generales y específicas que permitan una aproximación a la construcción conceptual ';
        $course->classroom = '12-301';
        $course->methodology = 'Presencial';
        $course->save();
    }
}
