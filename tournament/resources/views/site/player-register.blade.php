@extends('layouts.Site-Layout') @section('title')تسجيل لاعب@stop @section('content')

<div class="col-md-5 m-auto">

  <!-- modal start  -->


  <!-- widget div-->
                                    
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-player-index')}}" method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="form-group check-team">
                                                                <input name="code" type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="أدخل رمز الفريق" required>

                                                                                                                                    </div>



                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم اللاعب"
                                                                       name="name" value="{{old('name')}}" required>
                                                            </div>


                                                            <div class="form-group">
                                                            <label>تاريخ الميلاد</label>
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputText1" placeholder="تاريخ الميلاد"
                                                                       name="birth" value="{{old('birth')}}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="رقم الهوية الوطنية"
                                                                       name="national_id" value="{{old('national_id')}}" required>
                                                            </div>

                                                            

                                                              <div class="form-group">
                                                            <label for="exampleInputEmail1">صورة شخصية</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="img"
                                                            />
                                                           
                                                        </div>
                                                    </div>
                                                    

                                                     <div class="form-group">

                                                                        <select name="type"
                                                                                class="form-control" required>

                                                                            <option disabled selected value="">مسجل في نادي ؟
                                                                                
                                                                            </option>

                                                                                <option
                                                                                        value="1">نعم
                                                                                </option>

                                                                                <option
                                                                                        value="0">لا
                                                                                </option>

                                                                        </select>
                                                                    </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم النادي"
                                                                       name="club_name" value="{{old('club_name')}}">
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="الجنسية"
                                                                       name="nationality" value="{{old('nationality')}}" required>
                                                            </div>


                                                    
                                                    <div class="form-group">
                                                                <label for="exampleInputEmail1">صورة من اي مستند يثبت تاريخ الميلاد </label>
                                                                <input type="file" class="form-control"
                                                                       id="exampleInputText1" placeholder="صورة من أي مستند يثبت تاريخ الميلاد"
                                                                       name="file1" required>
                                                            </div>

                            <div class="form-group">

<label>الموسم</label>
    <select name="season_id" class="form-control" required>

                                                                            

                                                                                 @foreach($seasons as $season)
                                                                                 
                                                                                 @if($season->status == 1)
                                                                                
                                                                                <option value="{{$season->id}}">{{$season->name}}
                                                                                </option>
                                                                                
                                                                                @endif

                                                                                @endforeach

                                                                        </select>
                                                                    </div>

                                                  
            



                              
                                                <div class="modal-footer" style="margin-top:1rem;">
                                                                <a href="{{route('player-login')}}"><button type="button"
                                                                        class="btn btn-primary">تسجيل سريع
                                                                </button></a>
                                                                <button type="submit"
                                                                        class="btn btn-primary">حفظ
                                                                </button>
                                                                <button class="btn btn-primary btn-user"><a class="text-white" href="{{url('../tournament')}}">الرئيسية</a></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                     


  <!--  modal end -->

</div>

</div>

@stop
