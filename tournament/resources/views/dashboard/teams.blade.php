@extends('layouts.Admin-Layout')

@section('title')

    الفرق
@stop

<!--start password confirmation -->

@foreach($teams as $team)

<style>

#message_edit{{$team->id}}, #message_confirm_edit{{$team->id}} {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  text-align: right
}

#message_edit{{$team->id}} h3 {
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

@endforeach

<!--end password confirmation-->


<style>
    
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


@section('content')
   
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة فريق</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        
                                                        
                                                        
                                                         @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                     @if($rol->id == 2 ) 
                                                     
                                                     <form action="{{route('add-team-inner')}}" method="post">
                                                            @csrf

                                                            


                                                                <select class="form-control stutuss" name="tournament_id">
                                                                    
<option disabled selected>اختر البطولة</option>
@foreach($tournaments as $tournament)

                                                                <option value="{{$tournament->id}}" >{{$tournament->name}}</option>
                                                                
                                                                @endforeach

                                                            </select>
                            
                                                         
           

                                                            <div class="form-group mt-5">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم الفريق"
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


                                                         
                                                          
                                                           

                                                           
                              
                                                            <div class="modal-footer" style="margin-top:1rem;">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">إلغاء
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-outline-dark">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                        
                                                     
                                                     @else 
                                                        
                                                        
                                                        <form id="my_form" class="needs-validation" action="{{route('add-team')}}" method="post" enctype="multipart/form-data">
                                                            @csrf


                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="validationTooltip01" placeholder="اسم الفريق"
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
                                                                <input type="text" class="form-control"
                                                                       id="validationTooltip02" placeholder="اسم المدير"
                                                                       name="manager_name" value="{{old('manager_name')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="Email" class="form-control" id="validationTooltip03" placeholder="البريد الإلكتروني"
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
                                                               
                                                                <input type="number" class="form-control" id="validationTooltip04" autocomplete="off"
                                                                       placeholder="رقم الجوال" name="mobile_number" required>
                                                            </div>


                                                               <div class="form-group">
                                                            <label for="exampleInputEmail1">لوجو الفريق</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>

                                                        

                                                                     <div class="form-group">
                                                                <input type="text" class="form-control" id="validationTooltip05" placeholder="المدينة"
                                                                       name="city" value="{{old('city')}}" required>
                                                            </div>

                                                             <div class="form-group">
                                                                <input type="text" class="form-control" id="validationTooltip06" placeholder="اسم المدرب"
                                                                       name="trainer" value="{{old('trainer')}}" required>
                                                            </div>

                                                             <div class="form-group">
                                                                        <select name="tournament_id"
                                                                                class="team form-control" id="validationTooltip07">

                                                                            <option disabled selected>اختر
                                                                                البطولة
                                                                            </option>

                                                                        @foreach($tournaments as $tournament)

                                                                                <option
                                                                                        value="{{$tournament->id}}">{{$tournament->name}}
                                                                                </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                

                                                                     <div class="form-group">
                                                                        <select name="season_id"
                                                                                class="team form-control teamm" id="validationTooltip08" required>

                                                                            <option disabled selected value="">اختر
                                                                                الموسم
                                                                            </option>

                                                                        @foreach($seasons as $season)
                                               @if ($season->status == 1)
                                                                                <option
                                                                                        value="{{$season->id}}">{{$season->name}}
                                                                                </option>

@endif
                                                                            @endforeach

     
                                                                        </select>
                                                                    </div>

                                                                    <div class="max_player">
                                                                            
                                                                            </div>
                                                     
                                                     <div class="invalid-tooltip">
                                                من فضلك تأكد من إدخال جميع الحقول.
                                            </div>      
                          
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
                                                        
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                                                         @foreach(auth()->guard('admin')->user()->roles as $rol)

                                              @if($rol->id == 1) 
                                            
                                        <button href="javascript:void(0);"
                                           class="btn btn-outline-dark mt-4 mb-4" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة فريق</button>

@endif
@endforeach
                             @foreach(auth()->guard('admin')->user()->roles as $rol)
  @if($rol->id == 1)            

  <!-- filters-->
                                           <form method="get" action="{{route('team.filter')}}">
                                                <section class="mt-1">
                                                    <div class="row">
                                                           
                                                                    <div class="form-group col-xl-3">
                                                                        <select name="season"
                                                                                class="team form-control">

                                                                            <option disabled selected>اختر
                                                                                الموسم
                                                                            </option>

                                                                            @foreach($seasons as $season)

                                                                                <option
                                                                                        value="{{$season->id}}">{{$season->name}}
                                                                                </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>

            

                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                                class="btn btn-outline-dark btn-min-width mr-1 mb-1 mt-0">
                                                                            <i class="la la-search"></i> بحث
                                                                        </button>
                                                                    </div>
                                                                    
                                                                      <div class="form-group col-xl-2" style="margin-top:15px;">

                                                                    
                                                                       <a class="mt-5 mx-auto" href="{{ URL::previous() }}"><i class="fas fa-sync-alt"></i></a>
                                                                       </div>
                                                                    </div>

                                                                   

                                                                  
                                                </section>
                                            </form>
                                            <!-- #filters-->

@endif
@endforeach

                                        <!-- widget content -->
                                          <div class="main-content table-responsive">

                                                        <table id="files_list" class="table table-striped mt-5">
                                                <thead>
                                                <tr>
                                                    
                                                    @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                     @if($rol->id == 2 ) 
          
                                                    <th data-class="expand">اسم الفريق</th>
                                                    <th data-hide="phone,tablet">اسم المدير</th>
                                                    <th data-hide="phone,tablet">البريد الإلكتروني</th>
                                                    <th data-hide="phone,tablet">رقم الجوال</th>
                                           

                                    @else 
                                    
                                    <th data-class="expand">اسم الفريق</th>
                                                    <th data-hide="phone,tablet">اسم المدير</th>
                                                    <th data-hide="phone,tablet">البريد الإلكتروني</th>
                                                    <th data-hide="phone,tablet">رقم الجوال</th>
                                                    <th data-hide="phone">الحالة</th>
                                                                                                   <th data-hide="phone,tablet">لوجو الفريق</th>
                                                     <th data-hide="phone,tablet">المدينة</th>
                                                     <th data-hide="phone,tablet">اسم المدرب</th>
                                      @endif

                                    @endforeach
                                    
                                                    <th data-hide="phone,tablet">الاعدادات</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                     
                                                
                                                @foreach($teams as $team)
                                                    <tr>
                                                        
                                                         @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                        @if($rol->id == 2 ) 
                                                        
                                                        <td><a class="text-decoration-none text-primary" href="{{route('players',['id'=>$team->id])}}">{{$team->name}}</a></td>

                                                        <td>{{$team->manager_name}}</td>
                                                        <td>{{$team->manager_email}}</td>
                                                        <td>{{$team->mobile_number}}</td>
                    

                                                    
                                                        
                                                        @else 
                                                        
                                                         <td><a class="text-decoration-none text-primary" href="{{route('players',['id'=>$team->id])}}">{{$team->name}}</a></td>

                                                        <td>{{$team->manager_name}}</td>
                                                        <td>{{$team->manager_email}}</td>
                                                        <td>{{$team->mobile_number}}</td>
                                                        <td style="border:1px solid #ccc;">


                                                            <select class="form-control stutus" uid="{{$team->id}}">

                                                                <option @if($team->status) selected
                                                                         @endif value="1">
                                                                    مفعل
                                                                </option>
                                                                <option @if(!$team->status) selected
                                                                        @endif value="0">
                                                                     غير مفعل
                                                                </option>

                                                            </select>


                                                        </td>
                                                        
                                                         

                                                    <td><img data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer;" height="70" width="100" src="{{asset('public/images/img/'.$team->logo)}}"></td>
                                                        
                                                        
                                                        <td>{{$team->city}}</td>
                                                        <td>{{$team->trainer}}</td>
                                                    @endif
                                                        @endforeach
                                        
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModall{{$team->id}}"
                                                                    ><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3-d{{$team->id}}"
                                                                    style="margin-left:10px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- end widget content -->

                                        </div>

                                      
                                
   
@stop

@section('js')

@foreach($teams as $team)
    

        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModall{{$team->id}}" tabindex="-1"
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
                        
        
                        <form class="needs-validation" action="{{route('edit-team',['team_id'=>$team->id])}}" method="post" enctype="multipart/form-data">

                            @csrf


                                                            <div class="row">
</div>

                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم الفريق</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                       placeholder="name" name="name" value="{{$team->name}}">
                            </div>
                            
                            
                             <div class="form-group">
                                <label
                                        for="exampleInputEmail1">كود الفريق</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                       placeholder="name" name="code" value="{{$team->code}}">
                            </div>

                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم المدير</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="manager_name" value="{{$team->manager_name}}">
                            </div>
                          
<div class="form-group">
    <input type="password" class="form-control" id="psw_edit{{$team->id}}" pattern="(?=.*\d)(?=.*[a-z]).{6}" autocomplete="off" placeholder="كلمة المرور" name="password" title="Must contain at least one number and lowercase letters, and at Must be 6 characters and numbers">
</div>
                                                            

<div id="message_edit{{$team->id}}">
  <h3>الرقم السري يجب أن يحتوي علي:</h3>
  <p id="letter_edit{{$team->id}}" class="invalid">a-z <b>حروف</b> صغيرة</p>
  <p id="number_edit{{$team->id}}" class="invalid">1-9 <b>أرقام</b></p>
  <p id="length_edit{{$team->id}}" class="invalid">طول الرقم السري 6 خانات فقط</p>
</div>

                                                            <div class="form-group">

<input type="password" class="form-control" id="psw_confirm_edit{{$team->id}}" autocomplete="off"
                                                                       placeholder="تأكيد كلمة المرور" name="password">
                                                            </div>
                                                            
                                                            <div id="message_confirm_edit{{$team->id}}">

  <p id="confirmed_edit{{$team->id}}" class="invalid">التطابق</p>

</div>
                                                   
                          
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">رقم الجوال</label>
                                <input type="number"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="mobile_number" value="{{$team->mobile_number}}">
                            </div>

                             <div class="form-group">
                                                            <label for="exampleInputEmail1">لوجو الفريق</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>

                                                        


                                                                    
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم المدرب</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="trainer" value="{{$team->trainer}}">
                            </div>



                            
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">المدينة</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="city" value="{{$team->city}}">
                            </div>

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
        <div class="modal fade" id="myModal-3-d{{$team->id}}" tabindex="-1"
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
                      <strong> تأكيد حذف الفريق </strong>
                    </div>
                    
                    @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                     @if($rol->id == 2 ) 
                                                     
                                                                         <form action="{{route('delete-team',['team_id'=>$team->id])}}" method="post">

                                                     @else 
                                                     

                    <form action="{{route('delete-team',['team_id'=>$team->id])}}" method="post">



@endif
                                                     
                                                     @endforeach
                                                     
                       
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
        
       

    <script>

        // edit 

// When the user clicks on the password field, show the message box
$('#psw_edit{{$team->id}}').focus(function() {
  document.getElementById("message_edit{{$team->id}}").style.display = "block";
});

// When the user clicks outside of the password field, hide the message box
$('#psw_edit{{$team->id}}').blur(function() {
  document.getElementById("message_edit{{$team->id}}").style.display = "none";
});

// When the user starts to type something inside the password field
$('#psw_edit{{$team->id}}').keyup( function() {
    
    
  // Validate lowercase letters
  var lowerCaseLetters_edit = /[a-z]/g;

  if($('#psw_edit{{$team->id}}').val().match(lowerCaseLetters_edit)) {  
      
      
    $('#letter_edit{{$team->id}}').removeClass("invalid");
    $('#letter_edit{{$team->id}}').addClass("valid");
    
  } else {
      
    $('#letter_edit{{$team->id}}').removeClass("valid");
    $('#letter_edit{{$team->id}}').addClass("invalid");
  }
  

  // Validate numbers
  var numbers_edit = /[0-9]/g;
  if($('#psw_edit{{$team->id}}').val().match(numbers_edit)) {  
    $('#number_edit{{$team->id}}').removeClass("invalid");
    $('#number_edit{{$team->id}}').addClass("valid");
  } else {
    $('#number_edit{{$team->id}}').removeClass("valid");
    $('#number_edit{{$team->id}}').addClass("invalid");
        
      
  }
  
  // Validate length
  if($('#psw_edit{{$team->id}}').val().length == 6) {
     $('#length_edit{{$team->id}}').removeClass("invalid");
     $('#length_edit{{$team->id}}').addClass("valid");
  } else {
     $('#length_edit{{$team->id}}').removeClass("valid");
     $('#length_edit{{$team->id}}').addClass("invalid");
  
  }
});

    

// When the user clicks on the password field, show the message box
$('#psw_confirm_edit{{$team->id}}').focus ( function() {
  document.getElementById("message_confirm_edit{{$team->id}}").style.display = "block";
});

// When the user clicks outside of the password field, hide the message box
$('#psw_confirm_edit{{$team->id}}').blur (function() {
  document.getElementById("message_confirm_edit{{$team->id}}").style.display = "none";
});

// When the user starts to type something inside the password field
$('#psw_confirm_edit{{$team->id}}').keyup ( function() {

  // Validate length
  if($('#psw_confirm_edit{{$team->id}}').val() == $('#psw_edit{{$team->id}}').val()) {
    $('#confirmed_edit{{$team->id}}').removeClass("invalid");
     $('#confirmed_edit{{$team->id}}').addClass("valid");

  } else {
    $('#confirmed_edit{{$team->id}}').removeClass("valid");
     $('#confirmed_edit{{$team->id}}').addClass("invalid");
    

  }
});


    </script>
    
    @endforeach

    
<script>
        $(document).on("change", ".stutus", function () {
            var status = $(this).val();
            var id = $(this).attr("uid");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('team-update-status') }}",
                type: "post",
                dataType: "json",
                data: {status: status, id: id, _token: token},
                success: function (data) {
                   if (data.status == "ok" && data.user.status == 1) {
                       alert("تمت عملية تفعيل الفريق");
                        
                       
                   } else if (data.status == "ok" && data.user.status == 0)
                    
                    alert("تمت عملية تعطيل كود الفريق");
                    else  {
                        alert("خطأ في تفعيل الفريق");
                    }

                },
                error: function () {
                    alert("خطأ");
                }
            })
        })

 $(document).on("change", ".teamm", function (e) {
            e.preventDefault();
            var id = $(this).val();
            var token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('get.max') }}",
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

</script>
    
    


@stop