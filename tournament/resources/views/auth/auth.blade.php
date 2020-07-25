@extends('layouts.Site-Layout') @section('title')تسجيل دخول@stop @section('content')


  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg ">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         
          <div class="col-lg-6 m-auto">
            <div class="p-5">
             
             @if(isset($id))
            
            
                          <form action="{{route('post.login.dash', ['id'=>$id])}}" class="user" method="post" id="login-form">
              @csrf
  
              <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="البريد الإلكتروني...">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="كلمة المرور">
                </div>
              
                <p><a href="{{route('site-forget')}}">نسيت كلمة المرور ؟</a></p>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <!-- <label class="custom-control-label" for="customCheck">Remember Me</label> -->
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  تسجيل الدخول
                </button>
                
                <a class="mt-3 d-block text-left" href="{{route('site-index')}}">الصفحة الرئيسية</a>
                
              </form>
            
             @else 

             
              <form action="{{route('post.login')}}" class="user" method="post" id="login-form">
              @csrf
  
              <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="البريد الإلكتروني...">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="كلمة المرور">
                </div>
              
                <p><a href="{{route('site-forget')}}">نسيت كلمة المرور ؟</a></p>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <!-- <label class="custom-control-label" for="customCheck">Remember Me</label> -->
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  تسجيل الدخول
                </button>
                
                <a class="mt-3 d-block text-left" href="{{route('site-index')}}">الصفحة الرئيسية</a>
                
              </form>
              
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>

@stop

@section('js')

<script>

  setTimeout(fade_out, 5000);

function fade_out() {
    $("#checker").fadeOut().empty();
}

</script>
@stop