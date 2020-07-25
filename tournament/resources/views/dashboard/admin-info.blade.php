@extends('layouts.Admin-Layout')

@section('title')

    اللاعبين
@stop



@section('content')
   
   <div class="container">

   <div class="row">
    <div class="col-md-6">

         @foreach($admins as $admin)
              <p class="alert alert-success">اسم المدير: <span>{{$admin->name}}</span></p>                             
              <p class="alert alert-success">البريد الإلكتروني: <span>{{$admin->email}}</span></p>  

              @foreach($admin->teams as $adm)                           
              <p class="alert alert-success">رقم الجوال: <span>{{$adm->mobile_number}}</span></p>                             
                @endforeach
    
    </div>

              @foreach($admin->teams as $adm)                           

    <div class="col-md-6">
        <img data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer;" class="img-fluid" src="{{asset('public/images/img/'.$adm->logo)}}">                        
    </div>
    
    @endforeach
   
   </div>
   
 <table id="files_list" class="table table-striped mt-5">
                                                <thead>
                                                <tr>
                                                    <th data-hide="phone"> الفريق</th>
                                                    <th data-hide="phone"> البطولة</th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($admin->teams as $adm)
                                                    <tr>
                                                        
                                                        <td>{{$adm->name}}</td>
                                                        
                                                        @if($adm->tournament)
                                                        <td>{{$adm->tournaments->name}}</td>
                                                        
                                                        @else 
                                                        
                                                        <td></td>
                                                        @endif
                                                 
                                                    </tr>
                                                        @endforeach

                                                </tbody>
                                            </table>

 
    @endforeach   
    </div>                                    
@stop

@section('js')




@stop