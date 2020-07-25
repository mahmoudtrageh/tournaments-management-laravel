@extends('layouts.Admin-Layout')

@section('title')

    اللاعبين
@stop



@section('content')
   
   <div class="container">
    @foreach($players as $player)

    <div class="row mb-5">
        <div class="col-md-6">
            <p class="alert alert-success">اسم اللاعب: <span>{{$player->name}}</span></p>                             
              <p class="alert alert-success">مسجل بنادي: <span>@if($player->club_registered == 0) نعم @else لا @endif</span></p>                             
              @if($player->club_registered == 0)
              <p class="alert alert-success">اسم النادي: <span>{{$player->club_name}}</span></p>                             
              <p class="alert alert-success">الجنسية: <span>{{$player->nationality}}</span></p>   
            <p class="alert alert-success">ملف: <a href="{{asset('public/files/'.$player->file1)}}">{{$player->file1}}</a></p>
        </div>

         <div class="col-md-6">
             <img data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer;" height="350" width="400" src="{{asset('public/images/img/'.$player->img)}}">
        </div>
    </div>
                
                @endif
 <table id="files_list" class="table table-striped mt-5">
                                                <thead>
                                                <tr>
                                                    <th data-hide="phone"> الفريق</th>
                                                    <th data-hide="phone"> البطولة</th>
                                                    <th data-hide="phone">الموسم</th>
                                                </tr>
                                                </thead>
                                                <tbody>



                                                   
                                                    <tr>
                                                      
                                                        <td>{{$player->teams->name}}</td>
                          
                          @if($player->tournaments)
                          
                                                        <td>{{$player->tournaments->name}}</td>
                                                        
                                                        @else 
                                                        
                                                        <td></td>
                                                        @endif
                                                        
                                                        <td>{{$player->seasons->name}}                   </td>

                                                    </tr>

                                                </tbody>
                                            </table>

 
    @endforeach   
    </div>                                    
@stop

@section('js')




@stop