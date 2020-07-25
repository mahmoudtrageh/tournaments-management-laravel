<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>تسجيل فريق</title>
    @include('layouts.CSS-Layout')
    
    <style>
    
                /* start footer section */
button {
    background-color:#2e59d9 !important;
    max-width:200px;
    color:#fff !important;
}


.footer {
background-color: #262626;
  clear: both;
    position: relative;
}

 
 .footer p {
  display: inline-block;
       padding: 0 70px 0 0;
       color:#fff;
}

.logo {
        margin: 55px auto;
}

.logo img {
    width:150px !important;
}

@media (max-width: 1024px) { 
    
    .logo h2 {
        font-size:26px;
    }
}

@media (max-width: 768px) { 
    
    .logo h2 {
        text-align:center;
        font-size:22px;
    }
}


@media (max-width: 560px) { 
    
    .logo h2 {
        font-size:20px;
    }
}

nav {
    background-color:#262626;
    padding:10px;
}

nav ul {
    padding:0;
    margin:0;
}

nav li {
    list-style:none;
    display:inline-block;
    padding-left:10px;
}

nav li a {
    color:#fff;
}

nav li a:hover {
    color:#fff;
}
    
/* The message box is shown when the user clicks on the password field */
#message, #message-confirm {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  text-align: right
}


#message h3 {
    font-size: 14px;
}

#message p, #message-confirm p{
  padding: 10px 35px;
  font-size: 14px;
}


/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
    left: 8px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
      left: 8px;
  content: "✖";
}
    
</style>


</head>

@include('errors.errors')


    <body style="direction:rtl;text-align:right;">

    <!-- header -->
    
        <div class="logo">
        <div class="row mx-0">
            <div class="col-sm-6 text-center">
                <img src="{{asset('site/img/logo.jpg')}}" alt="" width="150" height="150" class="img-fluid p-2">
            </div>
            <div class="col-sm-6 align-self-center">
                <h2>منصة الشرقية لكرة القدم</h2>
            </div>
        </div>
        
        <nav>
            <div class="container">
                <ul>
                <li><a href="http://sharqia.football">الرئيسية</a></li>
                                <li><a href="{{route('get.login')}}">دخول</a></li>

                </ul>
            </div>
        </nav>

        </div>
        
        <!-- header -->

<div class="container">

<div class="col-md-5 m-auto">

  <!-- modal start  -->


                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-team-index')}}" method="post" enctype="multipart/form-data">
                                                            @csrf


                @if(isset($all_tournaments))
                                                                @foreach($all_tournaments as $all_tournament)
                                                                
                                                               <input type="hidden" name="tournament_id" value="{{$all_tournament->id}}"/>

                                                               <input type="hidden" name="season_id" value="{{$all_tournament->seasons->id}}"/>

                                                               
                                                            @endforeach
                                                            
                                                            @endif
           

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">اسم الفريق</label>
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="name"
                                                                       name="name" value="{{old('name')}}" required>
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
                                                                       name="manager_name" value="{{old('manager_name')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">البريد الإلكتروني</label>
                                                                <input type="Email" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="البريد الإلكتروني"
                                                                       name="manager_email" value="{{old('manager_email')}}" required>
                                                            </div>
                                                           <div class="form-group">
                                                                
                                                                <input type="password" class="form-control" id="psw" pattern="(?=.*\d)(?=.*[a-z]).{6}" autocomplete="off"
                                                                       placeholder="كلمة المرور" name="password" title="Must contain at least one number and lowercase letters, and at Must be 6 characters and numbers" required>
                                                            </div>
                                                            
            <div id="message">
  <h3>الرقم السري يجب أن يحتوي علي:</h3>
  <p id="letter" class="invalid">a-z <b>حروف</b> صغيرة</p>
  <p id="number" class="invalid">1-9 <b>أرقام</b></p>
  <p id="length" class="invalid">طول الرقم السري 6 خانات فقط</p>
</div>

                                                            <div class="form-group">

<input type="password" class="form-control" id="psw-confirm" autocomplete="off"
                                                                       placeholder="تأكيد كلمة المرور" name="password" required>
                                                            </div>
                                                            
                                                            <div id="message-confirm">

  <p id="confirmed" class="invalid">التطابق</p>

</div>

                                                            <div class="form-group">
                                                                <label
                                                                        for="exampleInputPassword1">رقم الجوال</label>
                                                                <input type="number" class="form-control"
                                                                       id="exampleInputPassword1" autocomplete="off"
                                                                       placeholder="رقم الجوال" name="mobile_number" required>
                                                            </div>
                                                           
                          
                                              <div class="form-group">
                                                            <label for="exampleInputEmail1">لوجو الفريق</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>

                                        


                                                                    
                            <div class="form-group">
                                
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="trainer" placeholder="اسم المدرب" required> 
                            </div>



                            
                            <div class="form-group">
                               
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="city" placeholder="المدينة" required>
                            </div>
                            
                             <div class="form-group">

<label>الموسم</label>
                                                                        <select name="season_id" 
                                                                                class="form-control teamm" required>

                                                                            

                                                                                 @foreach($seasons as $season)
                                                                                 
                                                                                 @if($season->status == 1)
                                                                                
                                                                                <option value="{{$season->id}}">{{$season->name}}
                                                                                </option>
                                                                                
                                                                                @endif

                                                                                @endforeach

                                                                        </select>
                                                                    </div>
                                                                    
                                                                     <div class="max_player">
                                                                            
                                                                            </div>

                              
                                                            <div class="modal-footer" style="margin-top:1rem;">
                                                                <button class="btn btn-primary"><a class="text-white" href="{{url('../tournament')}}">الرئيسية</a></button>

                                                                <button type="submit"
                                                                        class="btn btn-primary">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

<!--  modal end -->

</div>

</div>

 <!-- start footer section -->
                    <section class="footer border-top text-center mt-5">
                        <!-- start footer padding -->
                        <div class="px-2">
                            <div class="footer-content pt-3 pb-3">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة <a href="{{route('site-index')}}">منصة الشرقية لكرة القدم</a></p>
                               
                            </div>
                        </div>
                        <!-- end footer padding -->
                    </section>
                    <!-- end footer section -->


@include('layouts.JS-Layout')
    
    
    <script>
                    var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;

  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  

  


  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
         
      
  }
  
  // Validate length
  if(myInput.value.length == 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  
  }
}

    
        var myConfirmInput = document.getElementById("psw-confirm");
var confirmed = document.getElementById("confirmed");
var letterConfirm = document.getElementById("letter-confirm");
var numberConfirm = document.getElementById("number-confirm");
var lengthConfirm = document.getElementById("length-confirm");
var myInput = document.getElementById("psw");

// When the user clicks on the password field, show the message box
myConfirmInput.onfocus = function() {
  document.getElementById("message-confirm").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myConfirmInput.onblur = function() {
  document.getElementById("message-confirm").style.display = "none";
}

// When the user starts to type something inside the password field
myConfirmInput.onkeyup = function() {

  // Validate length
  if(myConfirmInput.value == myInput.value) {
    confirmed.classList.remove("invalid");
    confirmed.classList.add("valid");

  } else {
    confirmed.classList.remove("valid");
    confirmed.classList.add("invalid");
    

  }
  
}


 $(document).on("change", ".teamm", function (e) {
            e.preventDefault();
            var id = $(this).val();
            var token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('get-max') }}",
                type: "post",
                dataType: "json",
                data: {id: id, _token: token},
                success: function (data) {
                        $(".max_player").html('<div class="text-center">الحد الأقصى للاعبين: &nbsp;&nbsp;<span class="text-danger">'+ data.user.max +'&nbsp;&nbsp;لاعبين</span><input type="hidden" value="'+ data.user.max +'" name="max_player"></div>');
      
                    if (data.status !== "ok") {
                        alert("ERROR");
                    }

                },
                error: function () {
                    alert("ERROR");
                }
            })
        })
        
    </script>
 
    </body>
</html>
