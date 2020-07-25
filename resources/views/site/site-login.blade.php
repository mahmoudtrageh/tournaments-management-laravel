@extends('layouts.Site-Layout') @section('title')تسجيل دخول@stop @section('content')


<div class="col-md-5 m-auto">
                                                      
                                        
                                                   
                                                     <div class="modal-body" style="text-align:left;">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">مرحبًا بك !</h1>
              </div>
              <form action="{{route('post.login')}}" class="user" method="post" id="login-form">
              @csrf
  
              <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="البريد الإلكتروني...">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="كلمة المرور">
                </div>

                <p>ليس لدي حساب <a href="{{route('team-register', ['id'=>$id])}}">تسجيل فريق ؟</a></p>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <!-- <label class="custom-control-label" for="customCheck">Remember Me</label> -->
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block mx-auto">
                  تسجيل الدخول
                </button>

                                <button class="btn btn-primary mt-4 btn-user btn-block mx-auto"><a class="text-white" href="{{route('site-index')}}">الرئيسية</a></button>

                
              </form>
              
    </div>

                                                   </div>

     </div>
@stop
