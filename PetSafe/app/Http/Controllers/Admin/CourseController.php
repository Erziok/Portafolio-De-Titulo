<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\ActualizarCursoRequest;
use App\Http\Requests\Admin\Course\GuardarCursoRequest;
use App\Models\Benefit;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('benefit')->get();
        return view('admin.cursos.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $benefits = Benefit::all();
        return view('admin.cursos.create', compact('benefits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarCursoRequest $request)
    {
        if (Course::create($request->validated())) {
            toastr()->success('Curso creado exitosamente', '¡Perfecto!');
        } else { 
            toastr()->error('El Curso no se ha podido guardar', 'Oops...');
        }
        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $benefits = Benefit::all();
        return view('admin.cursos.edit', compact('course', 'benefits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCursoRequest $request, Course $course)
    {
        if ($course->update($request->validated())) {
            toastr()->success('Curso actualizado exitosamente', '¡Perfecto!');    
        } else {
            toastr()->error('El Curso no se ha podido actualizar', 'Oops...');
        }
        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if ($course->delete()) {
            toastr()->success('Curso eliminado exitosamente', '¡Perfecto!');
        } else {
            toastr()->error('El Curso no se ha podido eliminar', 'Oops...');    
        }
        return redirect()->route('admin.user.index');
    }
}
