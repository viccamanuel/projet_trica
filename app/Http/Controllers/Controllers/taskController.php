<?php

namespace App\Http\Controllers;

use App\Task;
use App\Liste;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Auth ;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task');
    }

    public function getTask()
    {
        return view('task');
    }

    public function postTask(Request $request)
    {
        if (Auth::user())
    {
        $id= Auth::user()->id;
        $tache=new Task();
        $tache->user_id=$id;
        $tache->name =$request->input('tache');
        $tache->descriptionTache =$request->input('description');
        $tache->fini="0";
        $tache->save();
        return redirect('/')->with('flash_message','Ajouté avec succés');

    }

    }

    public function delete($id)
    {//permet de suprimer la liste de tache avec les taches associées
        //verifie que la sous tache appartient bien a cet utilisateur
        $user = Auth::user()->id;
        $tache = Task::where('id',$id)->where('user_id',$user)->get();


        if(!$tache->isEmpty())
        {

            $tache=new Task();
            $soustache=new Liste();
            $tache = Task::find($id);
            $soustache=Liste::where('task_id',$id)->where('user_id',$user);
            $soustache->delete();
            $tache->delete();
            return redirect('/list')->with('flash_message','Suprimé avec succés');

        }
        else
        {
            return redirect('/list')->with('flash_message_bad',"Erreur vous avez modifié l'id");
        }

       }



    public function edit(Request $request,$id)
    { //$tache=new Task();
        //$tache=Task::all()->where('user_id',$id);
        $user = Auth::user()->id;
        $tache = Task::where('id',$id)->where('user_id',$user)->get();


        if(!$tache->isEmpty())
        {
            //ici écriture dans la BDD de ma form tache
            $input = $request->all();
            $tache=new Task();
            $tache = Task::find($id);
            $tache->user_id=$user;
            $tache->name =$request->input('tache');
            $tache->descriptionTache =$request->input('description');
           // $tache->fini="0";
            $tache->update();
            return redirect('/list')->with('flash_message','Modifié avec succés');
        }
        else
        {
            return redirect('/list')->with('flash_message_bad',"Erreur vous avez modifié l'id");
        }

    }

    public function viewEdit($id)
    {  $id=$id;
        $user = Auth::user()->id;
        $tache = Task::where('id',$id)->where('user_id',$user)->get();


        if($tache->isEmpty())
        {

            return redirect('/list')->with('flash_message_bad','Ceci n\'est pas votre tache');
        }
        else
        {
            return view('/update',compact('id'));
        }


        if ($id==0 || $id=="")
        {
            return view('errorUrl');
        }
    }


}
