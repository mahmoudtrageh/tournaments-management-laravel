@extends('layouts.Site-Layout') @section('title')تسجيل دخول@stop @section('content')


<div class="col-md-5 m-auto">
                                                      
                                        
                                                    <div class="modal-body" style="text-align:left;">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">مرحبًا بك !</h1>
              </div>
              <form action="{{route('add-x-player')}}" class="user" method="post" id="login-form">
              @csrf

                                          <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="رقم الهوية الوطنية"
                                                                       name="national_id" value="{{old('national_id')}}" required>
                                                            </div>

  
             <div class="form-group check-team">
                                                                <input name="code" type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="أدخل رمز الفريق"
                                                                      required >


                                                     <div class="form-group mt-3">

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


                                                            <div class="form-group mt-3">

<label>الموسم</label>
                                                                        <select name="season_id"
                                                                                class="form-control" required>


                                                            
                                                                            </option>

                                                                                                                                                          @foreach($seasons as $season)
                                                                                                                                                          @if($season->status == 1)

                                                                                <option
                                                                                        value="{{$season->id}}">{{$season->name}}
                                                                                </option>
                                                                                
                                                                                @endif

                                                                                @endforeach

                                                                        </select>
                                                                    </div>




                <p>ليس لدي حساب <a href="{{route('player-register')}}">تسجيل لاعب ؟</a></p>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <!-- <label class="custom-control-label" for="customCheck">Remember Me</label> -->
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block mx-auto">
                  تسجيل
                </button>

                <button class="btn btn-primary mt-4 btn-user btn-block mx-auto"><a class="text-white" href="{{url('../tournament')}}">الرئيسية</a></button>
                
              </form>
              

     </div>

     </div>
     </div>

<!--  modal end -->

@stop