<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\ActualizarCursoRequest;
use App\Http\Requests\Admin\Course\ActualizarSesionesRequest;
use App\Http\Requests\Admin\Course\GuardarCursoRequest;
use App\Http\Requests\Admin\Course\GuardarSesionesRequest;
use App\Models\Benefit;
use App\Models\Course;
use App\Models\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(['benefit', 'session'])->get();
        //dd($courses->toArray());
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
            Alert::toast('Curso creado correctamente', 'success');
        } else { 
            Alert::toast('Oops... No se ha podido guardar el curso', 'error');
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
            Alert::toast('Curso actualizado correctamente', 'success');    
        } else {
            Alert::toast('Oops... No se ha podido actualizar el curso', 'error');
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
            Alert::toast('Curso eliminado correctamente', 'success');
        } else {
            Alert::toast('Oops... No se ha podido eliminar el curso', 'error');    
        }
        return redirect()->route('admin.course.index');
    }
    public function createSessions($course_id) {
        return view('admin.cursos.sessions-create', compact('course_id'));
    }
    public function storeSessions(GuardarSesionesRequest $request) {
        foreach ($request->date as $key => $value) {
            Session::insert([
                'date' => $request->date[$key],
                'startHour' => $request->startHour[$key],
                'endHour' => $request->endHour[$key],
                'course_id' => $request->course_id,
            ]);
        }
        Course::where('id', $request->course_id)->update(array('active' => 1));
        Alert::toast('Agenda guardada correctamente', 'success');
        return redirect()->route('admin.course.index');
    }
    public function editSessions($course_id) {
        return view('admin.cursos.sessions-edit', compact('course_id'));
    }
    public function updateSessions(ActualizarSesionesRequest $request) {
        Session::where('course_id', $request->course_id)->delete();

        foreach ($request->date as $key => $value) {
            Session::insert([
                'date' => $request->date[$key],
                'startHour' => $request->startHour[$key],
                'endHour' => $request->endHour[$key],
                'course_id' => $request->course_id,
            ]);
        }
        Alert::toast('Agenda Actualizada correctamente', 'success');
        return redirect()->route('admin.course.index');
    }
    public function getSessions($id) {
        $sessions = Session::where('course_id', $id)->get();
        return response(compact('sessions'));
    }
}
