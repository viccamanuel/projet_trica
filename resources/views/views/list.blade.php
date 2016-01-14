@extends('template')

@section('titre')
    Liste
@endsection
<style>
    .portfolio-item {
        margin-bottom: 20px;
        margin-left:auto;
        margin-right: auto;
        max-width: 400px;
    }
    .titre_tache{
        padding-bottom: 2px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background-color: dodgerblue;
        margin-bottom: 0;
        height: 35px;
        text-align: center;
    }
    .lien{
        margin-right: -110px;
        text-decoration: none;
        color: black;
    }
    h1
    {
        text-align: center;
    }
    p{text-align: center;
        margin-top: -15px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        background: #46b8da;
    }
    .bordure
    {
        margin-left: auto;
        margin-right: auto;
        max-width: 1200px;
    }
</style>

@section('contenu')
    <h1>Mes listes de taches</h1>
    <div class="row">

        @foreach($tasks as $task)
            <div class="bordure">
                <div class="col-md-4 portfolio-item">
                    <h3 class="titre_tache">
                        <a class="lien" id="{{$task->id}}">{{$task->name}}</a>

                        <a type="button" style="margin-top:2px;float: right;margin-right: 10px;" class="btn btn-primary btn-sm" href="{{URL::to('/update/'.$task->id)}}">Edit</a>
                        <a type="button" style="margin-top:2px;float: right;margin-right: 3px;" class="btn btn-danger btn-sm" href="{{URL::to('/Delete/'.$task->id)}}">Delete</a>
                    </h3>
                    <p>{{$task->descriptionTache}}

                        @if($lists->where('task_id',$task->id) )
                            <a style="color:red;">{{$lists->where('Accompli',1)->where('task_id',$task->id)->count()}}
                                {{"/".$lists->where('task_id',$task->id)->where('user_id',Auth::user()->id)->count()}}
                            </a>  @endif

                        <br>
                        Créé le:  {{$task->created_at}}
                        <br>
                        <a href="{{URL::to('/SeeSousTask/'.$task->id)}}">Voir vos sous-taches</a>
                    </p>
                    <a type="button" style="border-radius:10px;width:100%;margin-top:-10px;" class="btn btn-primary btn-sm" href="{{URL::to('/NewTask/'.$task->id)}}">Ajouter une sous-tache à {{$task->name}}</a>
                    <br>
                </div>
                @endforeach
            </div>

    </div>
@endsection