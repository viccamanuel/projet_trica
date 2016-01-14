@extends('template')

@section('titre')
Liste
@endsection
<style>
    .portfolio-item
    {
        margin-bottom: 20px;
        margin-left:auto;
        margin-right: auto;
        max-width: 400px;
    }
    .titre_tache{
      padding-top:2px;
      margin-top:2px;
      margin-bottom: 1px;
      padding-bottom: 2px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      background-color:#222;
      height: 35px;
      text-align: center;
    }
    .lien
    {
        margin-right: -110px;
        text-decoration: none;
        color: #FFF;
    }
    h1
    {
        text-align: center;
    }
    p
    {text-align: center;
        color:#fff;
        margin-top: -15px;
        background: #555;
    }
    .bordure
    {
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

</style>

@section('contenu')
    <h1>Mes tâches</h1>
    <div class="ligne">

    @foreach($tasks as $task)
        <div class="bordure">
            <div class="col-md-4 portfolio-item">
      <h3 class="titre_tache">
              <a class="lien" id="{{$task->id}}">{{$task->name}}</a>

              <a type="button" style="margin-top:2px;float: right;margin-right: 9px;" class="btn btn-primary btn-sm" href="{{URL::to('/update/'.$task->id)}}">Modifier</a>
              <a type="button" style="margin-top:2px;float: right;margin-right: 3px;" class="btn btn-danger btn-sm" href="{{URL::to('/Delete/'.$task->id)}}">Supprimer</a>
      </h3>
       <p>{{$task->descriptionTache}}

           @if($lists->where('task_id',$task->id) )
              <a style="color:#fff;">{{$lists->where('Accompli',1)->where('task_id',$task->id)->where('user_id',Auth::user()->id)->count()}}
                  {{"/".$lists->where('task_id',$task->id)->where('user_id',Auth::user()->id)->count()}}
              </a>  @endif

           <br>
         date : {{$task->created_at}}
           <br>
          <a href="{{URL::to('/SeeSousTask/'.$task->id)}}">Voir les sous-tâches</a>
       </p>
                <a type="button" style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;width:100%;margin-top:-10px;" class="btn btn-primary btn-sm" href="{{URL::to('/NewTask/'.$task->id)}}">Ajout d'une sous-tâche à {{$task->name}}</a>
<br>
                </div>
    @endforeach
    </div>

    </div>
@endsection
