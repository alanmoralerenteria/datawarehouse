<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Mail\EmergencyCallReceived;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function send(){

         Mail::raw('Texto de ejemplo', function ($message){
            $message->from('alan.morales@alumnos.udg.mx', 'Nombre de ejemplo');
            $message->to('llalanll@hotmail.com');
            $message->subject('asunto ejemplo');
        });
    }

    public function resultados(){

        try {
            $tbs=explode(',', $_POST['tablas']);
            $campos=explode(',', $_POST['campos']);
            $data=array();

            foreach ($campos as $campo) {
                $data["$campo"]=true;
            }
            foreach ($tbs as $tb) {
                $data["$tb"]=true;
            }


            return view ("res")
            ;
        }
        catch (\Exception $e) {
            return view('home')
            ->with('errores',$e->getMessage())
            ->with('tbs',$tbs)
            ->with('campos',$campos)
            ->with('data',$data);
            ;

        }

    }
}
