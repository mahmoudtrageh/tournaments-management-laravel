@extends('layouts.Site-Layout') @section('title')تسجيل فريق@stop @section('content')


<div class="col-md-5 m-auto">

  <!-- modal start  -->

@foreach($all_tournaments as $all_tournament)


 <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-team-index')}}" method="post">
                                                            @csrf

                                                            <input type="hidden" name="tournament_id" value="{{$all_tournament->id}}"/>

                                                                @if(count($all_tournament->groups) > 1)


                                                                <label
                                                                    for="exampleInputPassword1 pt-4" class="w-100 text-right mb-4 d-block"> المجموعات</label>
                                                            <div class="row mb-4">

                                                            @foreach($all_tournament->groups as $group)
                                                            
                                            <div class="input-group col-sm-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" value="{{$group->id}}" id="add{{$group->id}}"
                                                               name="groups[]"
                                                               aria-label="Checkbox for following text input"
                                                               @if(old('groups'))
                                                               @foreach(old('groups') as $old_group)
                                                               @if($old_group == $group->id)
                                                               checked
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                        >
                                                    </div>
                                                </div>
                                                <label for="message-text" class="col-form-label pl-2">{{$group->name}}</label>
                                            </div>
                                        @endforeach

                                                            </div>

                                                            @else 


                                                          
                                                            <div class="row mb-4">

                                                            @foreach($all_tournament->groups as $group)
                                            <div class="input-group col-sm-6">
                                                        <input type="hidden" value="{{$group->id}}" id="add{{$group->id}}"
                                                               name="group_id"
                                                              
                                                        >
                                            </div>
                                        @endforeach

                                                            </div>


                                                            @endif
           

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">اسم الفريق</label>
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="name"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>

                                            <div class="input-group col-sm-4">
                                                <div class="input-group-prepend">
                                                        <input type="hidden" value="2"
                                                               name="roles[]"
                                                               aria-label="Checkbox for following text input"
                                                              
                                                        >

                                                </div>

                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">اسم المدير</label>
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم المدير"
                                                                       name="manager_name" value="{{old('manager_name')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">البريد الإلكتروني</label>
                                                                <input type="Email" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="البريد الإلكتروني"
                                                                       name="manager_email" value="{{old('manager_email')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                        for="exampleInputPassword1">كلمة المرور</label>
                                                                <input type="password" class="form-control"
                                                                       id="exampleInputPassword1" autocomplete="off"
                                                                       placeholder="password" name="password">
                                                            </div>

                                                            <div class="form-group">
                                                                <label
                                                                        for="exampleInputPassword1">رقم الموبايل</label>
                                                                <input type="number" class="form-control"
                                                                       id="exampleInputPassword1" autocomplete="off"
                                                                       placeholder="رقم الموبايل" name="mobile_number">
                                                            </div>
                                                           
                          
                                                </div>
                              
                                                            <div class="modal-footer" style="margin-top:1rem;">
                                                                                                                                <button class="btn btn-primary"><a class="text-white" href="{{route('site-index')}}">الرئيسية</a></button>

                                                                <button type="submit"
                                                                        class="btn btn-primary">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

<!--  modal end -->

@endforeach

</div>

</div>


@stop
