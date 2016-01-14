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
       text-align: center;
        margin-right: -50px;
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
#row
{
    margin-left:0;
    margin-right:0;
}
</style>
@section('contenu')

    <h1>Sous tache(s)</h1>
    <div class="row" id="row" style="margin-left:0;margin-right:0;" >

        @foreach($lists->where('user_id',Auth::user()->id) as $list)
            <div class="bordure">
                <div class="col-md-4 portfolio-item">
<h3 class="titre_tache">
    <a class="lien">{{$list->name}}</a>
    @if($list->Accompli==0)
    <a type="button" style="margin-top:2px;float: right;margin-right: 3px;" class="btn btn-info btn-sm" href="{{URL::to('/SousTacheFin/'.$list->id)}}">Finie</a>
@endif


</h3>
      <p style="height:35px;">Date de fin: {{$list->DateCrea}}
          <a type="button" style="margin-top:2px;float: right;margin-right: 3px;" class="btn btn-primary btn-sm" href="{{URL::to('/vieweditSTache/'.$list->id)}}">edit</a>
          <a type="button" style="margin-top:2px;float: right;margin-right: 3px;" class="btn btn-danger btn-sm" href="{{URL::to('/deleteStache/'.$list->id)}}">Delete</a>

      </p>
                </div>
                @endforeach
            </div>

    </div>
@endsection