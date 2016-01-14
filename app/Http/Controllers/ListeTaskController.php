<?php

namespace App\Http\Controllers;

use App\Liste;
use Illuminate\Http\Request;
use Auth ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class ListeTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ($id==0 || $id=="")
        {
            return view('errorUrl');
        }
        else
        {
            $tasks= Task::find($id);
                    if (is_null($tasks))
                {
                    return view('errorUrl');
                }
        }
    }

    public function SeeSousTask($id)
    {
        $id=$id;
        $user = Auth::user()->id;
        $tache = Task::where('id',$id)->where('user_id',$user)->get();
        if($tache->isEmpty())
        {
            return redirect('/list')->with('flash_message_bad','Ceci n\'est pas votre tache');
        }
        else
        {
            $lists= Liste::where('task_id',$id)->get();

            return view('listeSousTache',compact('lists'));
        }
        if ($id==0 || $id=="") {
            return view('errorUrl');
        }
        $lists= Liste::where('task_id',$id)->get();

        return view('listeSousTache',compact('lists'));
    }

    public function SousTacheFini (Request $request,$id)
    {
        //verifie que la sous tache appartient bien a cet utilisateur
        $user = Auth::user()->id;
        $tache = Liste::where('id',$id)->where('user_id',$user)->get();


        if(!$tache->isEmpty())
        {
            //ici écriture dans la BDD de ma form tache
            $tache=new Liste();
            $tache = Liste::find($id);
            $tache->Accompli="1";
            $tache->update();
            return redirect('/list')->with('flash_message','Modifié avec succés');
        }
        else
        {
            return redirect('/list')->with('flash_message_bad',"Erreur vous avez modifié l'id");
        }

    }

    public function liste()
    {
        if (Auth::user())
    {
        $id= Auth::user()->id;
    }
        $tasks= Task::all()->where('user_id',$id);
        $lists=Liste::all()->where('user_id',$id);
        return view('list',compact('tasks','lists'));
    }

    public function erreur()
    {
        return view('errorUrl');

    }

    public function AddSousTaches(Request $request,$id)
    {
        $id=$id;
        $user = Auth::user()->id;
        $tache = Task::where('id',$id)->where('user_id',$user)->get();


        if($tache->isEmpty())
        {

            return redirect('/list')->with('flash_message_bad','Ceci n\'est pas votre tache');
        }
        else
        {
            return view('NewSousTache',compact('id'));
        }


        if ($id==0 || $id=="")
        {
            return view('errorUrl');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTaches(Request $request,$id)
    {

        //ici écriture dans la BDD de ma form tache
        $input = $request->all();
        $tache=new Liste();
        $tache->task_id=$id;
        $tache->name =$request->input('SousTache');
        $tache->DateCrea =$request->input('dateFin');
        $tache->user_id=Auth::user()->id;
        $tache->Accompli="0";
        $tache->save();
        return redirect('/list')->with('flash_message','Sous-tache ajoutée avec succés');

    }

    public function vieweditSTache(Request $request,$id)
    {
        //verifie que la sous tache appartient bien a cet utilisateur
        $user = Auth::user()->id;
        $tache = Liste::where('id',$id)->where('user_id',$user)->get();


        if($tache->isEmpty())
        {
            return redirect('/list')->with('flash_message_bad','Ceci n\'est pas votre sous-tache');
        }
        else
        {
            return view('/updateSousTache',compact('id'));
        }

    }

    public function deleteStache($id)
    {
        //verifie que la sous tache appartient bien a cet utilisateur
        $user = Auth::user()->id;
        $tache = Liste::where('id',$id)->where('user_id',$user)->get();


        if(!$tache->isEmpty())
        {

            $soustache=new Liste();
            $soustache=Liste::where('id',$id);
            $soustache->delete();
            return redirect('/list')->with('flash_message','Suprimé avec succés');
        }
        else
        {
            return redirect('/list')->with('flash_message_bad',"Erreur vous avez modifié l'id");
        }

    }


    public function editSTache(Request $request,$id)
    {
        //verifie que la sous tache appartient bien a cet utilisateur
        $user = Auth::user()->id;
        $tache = Liste::where('id',$id)->where('user_id',$user)->get();


        if(!$tache->isEmpty())
        {
            //ici écriture dans la BDD de ma form tache
            $tache=new Liste();
            $tache = Liste::find($id);
            $tache->name =$request->input('SousTache');
            $tache->DateCrea =$request->input('dateFin');

            $tache->update();
            return redirect('/list')->with('flash_message','Sous-tache modifiée avec succés');
        }
        else
        {
            return redirect('/list')->with('flash_message_bad',"Erreur vous avez modifié l'id");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
