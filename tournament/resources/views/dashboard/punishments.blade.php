@extends('layouts.Admin-Layout')

@section('title')

    العقوبات
@stop


@section('content')
 
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة عقوبة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-punishment')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                           
                                                            <div class="form-group">
                                                        
                                                                        <select name="player_id"
                                                                                class="form-control">

                                                                            <option disabled selected>اختر اللاعب
                                                                                
                                                                            </option>
                                                                            
                                                                            @foreach($players as $player)
                                                                                <option
                                                                                        value="{{$player->id}}">{{$player->name}}
                                                                                </option>

                                                                            @endforeach

                                                                            
                                                                        </select>
                                                                    </div>

                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="تاريخ العقوبة"
                                                                       name="date" value="{{old('date')}}">
                                                            </div>
                                                          


                                                                <div class="form-group">
                                                            <label for="exampleInputEmail1">نص العقوبة</label>

                                                                    <textarea class="form-control" name="text" cols="30" rows="10" placeholder="نص الخبر">
                                                                    
                                                                    </textarea>
                                                            </div>

                                                          
                                                            <div class="modal-footer" style="margin-top:1rem;">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">إلغاء
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-outline-dark">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                        
                                        <button style=" margin-top: 1rem;" href="javascript:void(0);"
                                           class="btn btn-outline-dark" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة عقوبة</button>
                                           <span><a class="d-block float-left mr-3 mt-3 btn btn-outline-dark" target="_blank" href="{{route('site-index')}}">الصفحة الرئيسية</a></span>
                                        <!-- widget content -->
                                        <div class="main-content table-responsive">

                                                        <table id="files_list" class="table table-striped mt-5">
                                                <thead>
                                                <tr>
                                                    <th data-class="expand">اسم اللاعب</th>
                                                    <th data-hide="phone">تاريخ العقوبة</th>
                                               
                                                    <th data-hide="phone,tablet">وصف العقوبة</th>
                                                  
                                                    <th data-hide="phone,tablet">اعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($punishments as $punishment)
                                                    <tr>
                                                        <td>
                                                        @if($punishment->players != null)

                                                        {{$punishment->players->name}}
                                                        
                                                        @endif
                                                        </td>
                                                       
                                                        <td>{{$punishment->date}}</td>
                                                                                                               
                                                        <td>
                                                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$punishment->id}}">
  أظهر نص الخبر
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$punishment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">الوصف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$punishment->text}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</td>
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$punishment->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$punishment->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- end widget content -->

                                        </div>

                                       
    @foreach($punishments as $punishment)
        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$punishment->id}}" tabindex="-1"
             role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"
                            style="font-weight:bold">تعديل</h5>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"
                         style="text-align:left;">
                        <form action="{{route('edit-punishment',['punishment_id'=>$punishment->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                                        
                                                                        <select name="player_id"
                                                                                class="form-control">

                                                                            <label for="">اللاعب</label>

                                           @if($punishment->players != null)

                                                                             <option disabled selected>{{$punishment->players->name}}
@else 

<option disabled selected>اختر اللاعب

@endif
                                                                            @foreach($players as $player)

                                                                                
                                                                            </option>
                                                                                <option
                                                                                        value="{{$player->id}}">{{$player->name}}
                                                                                </option>

                                                                            @endforeach

                                                                            
                                                                        </select>
                                                                    </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ العقوبة</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="date" value="{{$punishment->date}}">
                            </div>
                          
                          
                                                            <label for="exampleInputEmail1">نص العقوبة</label>

                                                                    <textarea name="text" cols="30" rows="10">
                                                                    {{$punishment->text}}
                                                                    </textarea>
                            <div class="modal-footer"
                                 style="margin-top:1rem;">
                                <button type="button"
                                        class="btn btn-default"
                                        data-dismiss="modal">إلغاء
                                </button>
                                <button type="submit"
                                        class="btn btn-outline-dark">حفظ

                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- Modal to delet supervisor -->
        <div class="modal fade" id="myModal-3{{$punishment->id}}" tabindex="-1"
             role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"
                            style="font-weight:bold">حذف</h5>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"
                         style="text-align:right;">
                      <strong>تأكيد الحذف</strong>
                    </div>
                    <form action="{{route('delete-punishment',['punishment_id'=>$punishment->id])}}" method="post">
                        @csrf
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal">إلغاء
                            </button>
                            <button type="submit"
                                    class="btn btn-outline-dark">حفظ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

@stop

@section('js')


@stop

