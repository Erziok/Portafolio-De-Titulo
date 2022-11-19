<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\GuardarConfiguracionRequest;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.web.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarConfiguracionRequest $request)
    {
        if (!fileExists(config_path().'/petsafe-web-config.php')) {
            fopen(config_path().'/petsafe-web-config.php', 'w');
        }
        $file = fopen(config_path().'/petsafe-web-config.php', 'w');
        fwrite($file,'<?php '.PHP_EOL);
        fwrite($file,'return ['.PHP_EOL);
        foreach ($request -> except(['_token']) as $key => $value){
            if(is_null($value)){
                $value = null;
            }   
            fwrite($file,"'".$key."' =>"."'".$value."',".PHP_EOL);
        }
        fwrite($file,'];'.PHP_EOL);
        fclose($file);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
