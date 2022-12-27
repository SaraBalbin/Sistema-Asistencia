<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = new Lesson;
        $lesson->number = 1;
        $lesson->topic = 'Introduccion a HTML';
        $lesson->description_topic = 'El Lenguaje de Marcado de Hipertexto (HTML) es el código que se utiliza para estructurar y desplegar una página web y sus contenidos. Por ejemplo, sus contenidos podrían ser párrafos, una lista con viñetas, o imágenes y tablas de datos.';
        $lesson->id_course = '1';
        $lesson->save();

        $lesson = new Lesson;
        $lesson->number = 2;
        $lesson->topic = 'Introduccion a CSS';
        $lesson->description_topic = 'CSS, en español «Hojas de estilo en cascada», es un lenguaje de diseño gráfico para definir y crear la presentación de un documento estructurado escrito en un lenguaje de marcado';
        $lesson->id_course = '1';
        $lesson->save();
    }
}
