@extends('layouts.Admin-Layout')

@section('title')

    المشرفين
@stop


<!--start password confirmation -->

@foreach($admins as $admin)

<style>

#message_edit{{$admin->id}}, #message_confirm_edit{{$admin->id}} {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  text-align: right
}

#message_edit{{$admin->id}} h3 {
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
                                                            style="font-weight:bold">إضافة مشرف</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-admin')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="الاسم"
                                                                       name="name" value="{{old('name')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="Email" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="البريد الإلكتروني"
                                                                       name="email" value="{{old('email')}}" required>
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
                                                            
                                                            
                                                            
                                                            
                                                            
                                                           <label class="d-block w-100 text-right">الصلاحيات</label>
                        <div class="row">

                            @foreach($roles as $role)
                            <div class="input-group col-sm-6">

                                <input type="checkbox" class="mt-1" value="{{$role->id}}" id="add{{$role->id}}" name="roles[]" aria-label="Checkbox for following text input" 
                                    @if(old( 'roles')) 
                                        @foreach(old( 'roles') as $old_role)
                                            @if($old_role == $role->id)
                                                checked 
                                            @endif 
                                        @endforeach
                                    @endif 
                                >

                                <label for="message-text" class=" pl-2">{{$role->name_ar}}</label>
                            </div>
                            @endforeach

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

                                        <button href="javascript:void(0);"
                                           class="btn btn-outline-dark mt-4 mb-4" data-toggle="modal"
                                           data-target="#myModal-1">إضافة مشرف</button>
                                        <!-- widget content -->
                                               <div class="main-content table-responsive">

                                                        <table id="files_list" class="table table-striped mt-5">

                                                <thead>
                                                <tr>
                                                    <th data-class="expand">الاسم</th>

                                                    <th data-hide="phone">الفريق</th>
                                                    <!-- <th data-hide="phone,tablet">الصلاحيات</th> -->
                                                    <th data-hide="phone,tablet">الاعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($admins as $admin)
                                                
                                                
                                                    <tr>
                                                        <td><a href="{{route('admin-info', ['id'=>$admin->id])}}">{{$admin->name}}</a></td>
                                                        @if(count($admin->teams) != 0)
                                                        @foreach($admin->teams as $adm)
                                                        <td>{{$adm->name}}</td>
                                                        @endforeach
                                                        @else 
                                                        <td></td>
                                                        @endif
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$admin->id}}"
                                                                    ><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$admin->id}}"
                                                                    style="margin-left:10px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        </div>
                                     
     @stop


@section('js')


 @foreach($admins as $admin)

    <!-- Modal  to Edit supervisor-->
    <div class="modal fade" id="myModal-2{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold">تعديل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:left;">
                    <form action="{{route('edit-admin',['admin_id'=>$admin->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">الاسم</label>
                            <input type="text" class="form-control" placeholder="name" name="name" value="{{$admin->name}}">
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="Email" class="form-control" placeholder="email" name="email" value="{{$admin->email}}">
                        </div>
                        
                        <div class="form-group">
    <input type="password" class="form-control" id="psw_edit{{$admin->id}}" pattern="(?=.*\d)(?=.*[a-z]).{6}" autocomplete="off" placeholder="كلمة المرور" name="password" title="Must contain at least one number and lowercase letters, and at Must be 6 characters and numbers">
</div>
                                                            

<div id="message_edit{{$admin->id}}">
  <h3>الرقم السري يجب أن يحتوي علي:</h3>
  <p id="letter_edit{{$admin->id}}" class="invalid">a-z <b>حروف</b> صغيرة</p>
  <p id="number_edit{{$admin->id}}" class="invalid">1-9 <b>أرقام</b></p>
  <p id="length_edit{{$admin->id}}" class="invalid">طول الرقم السري 6 خانات فقط</p>
</div>

                                                            <div class="form-group">

<input type="password" class="form-control" id="psw_confirm_edit{{$admin->id}}" autocomplete="off"
                                                                       placeholder="تأكيد كلمة المرور" name="password">
                                                            </div>
                                                            
                                                            <div id="message_confirm_edit{{$admin->id}}">

  <p id="confirmed_edit{{$admin->id}}" class="invalid">التطابق</p>

</div>
                        
                        <label class="d-block w-100 text-right">الصلاحيات</label>
                        <div class="row">

                            @foreach($roles as $role)
                            <div class="input-group col-sm-6">
                                <input type="checkbox" class="mt-1" value="{{$role->id}}" name="roles[]" aria-label="Checkbox for following text input" @foreach($admin->roles as $old_role) @if($old_role->id == $role->id) checked @endif @endforeach >
                                <label for="message-text" class="pl-2">{{$role->name_ar}}</label>
                            </div>
                            @endforeach

                        </div>
                        <div class="modal-footer" style="margin-top:1rem;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء
                            </button>
                            <button type="submit" class="btn btn-outline-dark">حفظ

                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- end edit modal -->

    <!-- Modal to delet supervisor -->
    <div class="modal fade" id="myModal-3{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold">حذف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:right;">
                    <strong>تأكيد حذف المشرف ؟</strong>
                </div>
                <form action="{{route('delete-admin',['admin_id'=>$admin->id])}}" method="post">
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء
                        </button>
                        <button type="submit" class="btn btn-outline-dark">حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end modal delete -->



<script>
     // edit 

// When the user clicks on the password field, show the message box
$('#psw_edit{{$admin->id}}').focus(function() {
  document.getElementById("message_edit{{$admin->id}}").style.display = "block";
});

// When the user clicks outside of the password field, hide the message box
$('#psw_edit{{$admin->id}}').blur(function() {
  document.getElementById("message_edit{{$admin->id}}").style.display = "none";
});

// When the user starts to type something inside the password field
$('#psw_edit{{$admin->id}}').keyup( function() {
    
    
  // Validate lowercase letters
  var lowerCaseLetters_edit = /[a-z]/g;

  if($('#psw_edit{{$admin->id}}').val().match(lowerCaseLetters_edit)) {  
      
      
    $('#letter_edit{{$admin->id}}').removeClass("invalid");
    $('#letter_edit{{$admin->id}}').addClass("valid");
    
  } else {
      
    $('#letter_edit{{$admin->id}}').removeClass("valid");
    $('#letter_edit{{$admin->id}}').addClass("invalid");
  }
  

  // Validate numbers
  var numbers_edit = /[0-9]/g;
  if($('#psw_edit{{$admin->id}}').val().match(numbers_edit)) {  
    $('#number_edit{{$admin->id}}').removeClass("invalid");
    $('#number_edit{{$admin->id}}').addClass("valid");
  } else {
    $('#number_edit{{$admin->id}}').removeClass("valid");
    $('#number_edit{{$admin->id}}').addClass("invalid");
        
      
  }
  
  // Validate length
  if($('#psw_edit{{$admin->id}}').val().length == 6) {
     $('#length_edit{{$admin->id}}').removeClass("invalid");
     $('#length_edit{{$admin->id}}').addClass("valid");
  } else {
     $('#length_edit{{$admin->id}}').removeClass("valid");
     $('#length_edit{{$admin->id}}').addClass("invalid");
  
  }
});

    

// When the user clicks on the password field, show the message box
$('#psw_confirm_edit{{$admin->id}}').focus ( function() {
  document.getElementById("message_confirm_edit{{$admin->id}}").style.display = "block";
});

// When the user clicks outside of the password field, hide the message box
$('#psw_confirm_edit{{$admin->id}}').blur (function() {
  document.getElementById("message_confirm_edit{{$admin->id}}").style.display = "none";
});

// When the user starts to type something inside the password field
$('#psw_confirm_edit{{$admin->id}}').keyup ( function() {

  // Validate length
  if($('#psw_confirm_edit{{$admin->id}}').val() == $('#psw_edit{{$admin->id}}').val()) {
    $('#confirmed_edit{{$admin->id}}').removeClass("invalid");
     $('#confirmed_edit{{$admin->id}}').addClass("valid");

  } else {
    $('#confirmed_edit{{$admin->id}}').removeClass("valid");
     $('#confirmed_edit{{$admin->id}}').addClass("invalid");
    

  }
});


    </script>
    
    @endforeach

    
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
</script>


@stop