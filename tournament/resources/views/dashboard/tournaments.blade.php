@extends('layouts.Admin-Layout')

@section('title')

    البطولات
@stop


@section('content')
 
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة بطولة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-tournament')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم البطولة"
                                                                       name="name" value="{{old('name')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>تاريخ بداية البطولة</label>
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       name="start" value="{{old('email')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>تاريخ نهاية البطولة</label>
                                                                <input type="date" class="form-control"
                                                                       name="end" value="{{old('email')}}" required>
                                                            </div>

                                                                        <div class="form-group">
                                                            <label>لوجو البطولة</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>


  @foreach(auth()->guard('admin')->user()->roles as $rol)
  @if($rol->id == 1)
                                                                <div class="form-group">
                                                        
                                                                        <select name="admin_id"
                                                                                class="form-control">

                                                                            <option disabled selected>اختر المدير
                                                                                
                                                                            </option>
                                                                            
                                                                            @foreach($admins as $admin)
                                                                                <option
                                                                                        value="{{$admin->id}}">{{$admin->name}}
                                                                                </option>

                                                                            @endforeach

                                                                            
                                                                        </select>
                                                                    </div>
@else 

 <div class="form-group">
                                                        
                                                                        <select name="admin_id"
                                                                                class="form-control">
    <label for="">المدير</label>
                                                                            
                                                                                <option
                                                                                        value="{{auth()->guard('admin')->user()->id}}">{{auth()->guard('admin')->user()->name}}
                                                                                </option>


                                                                            
                                                                        </select>
                                                                    </div>

@endif
@endforeach
                                                        


                                                                    

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">وصف البطولة</label>

                                                                    <textarea class="form-control" name="details" cols="30" rows="10" required></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                                        <select name="season_id"
                                                                                class="form-control" required>
                                                                            
                                                                            <option disabled selected value="">اختر الموسم
                                                                                
                                               @foreach($seasons as $season)
                                               @if ($season->status == 1)
                                               </option>

                                                                                <option
                                                                                        value="{{$season->id}}">{{$season->name}}
                                                                                </option>
@endif
                                                                            @endforeach

                                                                        </select>
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
                                           data-target="#myModal-1"> إضافة بطولة</button>
                                           <span><a class="d-block float-left mr-3 mt-3 btn btn-outline-dark" target="_blank" href="{{route('site-index')}}">الصفحة الرئيسية</a></span>
                                        
  @foreach(auth()->guard('admin')->user()->roles as $rol)
  @if($rol->id == 1)

  <!-- filters-->
                                           <form method="get" action="{{route('tournament.filter')}}">
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
                                                     @if($rol->id == 3 )


 <th data-class="expand">الاسم</th>
                                                    <th data-hide="phone"> الحالة</th>

                                                    <th data-hide="phone">تاريخ البداية</th>
                                                    <th data-hide="phone,tablet">تاريخ النهاية</th>
                                                    <th data-hide="phone,tablet">تاريخ الانشاء</th>
                                                    <th data-hide="phone,tablet">مدير البطولة</th>
                                                    <th data-hide="phone,tablet">اللوجو</th>
                                                    <th data-hide="phone,tablet">وصف البطولة</th>
                                                    <th data-hide="phone,tablet">الموسم</th>


                                                     @else  

                                                    <th data-class="expand">الاسم</th>
                                                    <th data-hide="phone"> الحالة</th>

                                                    <th data-hide="phone">تاريخ البداية</th>
                                                    <th data-hide="phone,tablet">تاريخ النهاية</th>
                                                    <th data-hide="phone,tablet">تاريخ الانشاء</th>
                                                    <th data-hide="phone,tablet">مدير البطولة</th>
                                                    <th data-hide="phone,tablet">اللوجو</th>
                                                    <th data-hide="phone,tablet">وصف البطولة</th>

                                                    <th data-hide="phone,tablet">الموسم</th>

                                                    @endif
                                                    @endforeach
                                                    <th data-hide="phone,tablet">اعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($tournaments as $tournament)
                                                    <tr>

                                                     @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                        @if($rol->id == 3 ) 



                                                         <td><a class="text-decoration-none text-primary" href="{{route('teams',['id'=>$tournament->id])}}">{{$tournament->name}}</a></td>
                                                        <td style="border:1px solid #ccc;">
                                                            <select class="form-control stutus" uid="{{$tournament->id}}">
                                                                <option @if($tournament->status) selected
                                                                        @endif value="1">
                                                                    مفعل
                                                                </option>
                                                                <option @if(!$tournament->status) selected
                                                                        @endif value="0">
                                                                     غير مفعل
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td>{{$tournament->start}}</td>
                                                        <td>{{$tournament->end}}</td>
                                                        <td>{{$tournament->created_at}}</td>
                                                        
                                                       

                                                       
                                                        <td>
                                                        @if($tournament->admins != null)
                                                         {{$tournament->admins->name}}
                                                         
                                                         @endif
                                                         </td>
                                                       

                                                        <td><img data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer;" height="70" width="100" src="{{asset('public/images/img/'.$tournament->logo)}}"></td>
                                                        
                                                        <td>
                                                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$tournament->id}}">
  أظهر الوصف
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$tournament->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">الوصف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$tournament->details}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</td>

                                                  

                                                    @if(!empty($tournament->seasons))


                                                   <td>{{$tournament->seasons->name}}</td>
                                                    
                                                    @else 

                                                    <td></td>
                                                    @endif
@else 
                                                        <td><a class="text-decoration-none text-primary" href="{{route('teams',['id'=>$tournament->id])}}">{{$tournament->name}}</a></td>
                                                        <td style="border:1px solid #ccc;">
                                                            <select class="form-control stutus" uid="{{$tournament->id}}">
                                                                <option @if($tournament->status) selected
                                                                        @endif value="1">
                                                                    مفعل
                                                                </option>
                                                                <option @if(!$tournament->status) selected
                                                                        @endif value="0">
                                                                     غير مفعل
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td>{{$tournament->start}}</td>
                                                        <td>{{$tournament->end}}</td>
                                                        <td>{{$tournament->created_at}}</td>

                                                      
                                                        <td>
                                                        @if($tournament->admins != null)
                                                         {{$tournament->admins->name}}
                                                         
                                                         @endif
                                                         </td>
                                                       

                                                        <td><img data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer;" height="70" width="100" src="{{asset('public/images/img/'.$tournament->logo)}}"></td>
                                                        
                                                        <td>
                                                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$tournament->id}}">
  أظهر الوصف
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$tournament->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">الوصف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$tournament->details}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</td>
                     

                                 

                                                    @if(!empty($tournament->seasons))
                                                    
                                                    <td>{{$tournament->seasons->name}}</td>
                                                    
                                                    @else 

                                                    <td></td>
                                                    @endif
@endif
@endforeach
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$tournament->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$tournament->id}}"
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

                                       
    @foreach($tournaments as $tournament)
        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$tournament->id}}" tabindex="-1"
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
                        <form action="{{route('edit-tournament',['tournament_id'=>$tournament->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">الاسم</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="name" value="{{$tournament->name}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ بداية البطولة</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="start" value="{{$tournament->start}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ نهاية البطولة</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="end" value="{{$tournament->end}}">
                            </div>
                           
                            <div class="form-group">
                                                                                                   <label for="">مدير البطولة</label>

                                                                        <select name="admin_id" class="form-control">
                                                                                        
                                           @if($tournament->admins != null)
<option disabled selected>{{$tournament->admins->name}}
@else 
<option disabled selected>اختر المدير

@endif
                                                                            @foreach($admins as $admin)

                                                                             
                                                                                
                                                                            </option>
                                                                                <option
                                                                                        value="{{$admin->id}}">{{$admin->name}}
                                                                                </option>

                                                                            @endforeach

                                                                            
                                                                        </select>
                                                                    </div>

                           <div class="form-group">
                                                            <label for="exampleInputEmail1">لوجو البطولة</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>

                                                        

                                                                    

                                                                    <div class="form-group">
                                                                <label>اختر الموسم</label>

                                                                        <select name="season_id"
                                                                                class="form-control">
                                                                                @if(!empty($tournament->seasons))
                                                                            <option disabled selected>{{$tournament->seasons->name}}
                                                                                @endif
                                                                                @foreach($seasons as $season)
                                                                            </option>

                                                                                <option
                                                                                        value="{{$season->id}}">{{$season->name}}
                                                                                </option>

                                                                             
                                                                                @endforeach

                                                                        </select>
                                                                    </div>

                                                            <label for="exampleInputEmail1">وصف البطولة</label>

                                                                    <textarea name="details" cols="30" rows="10" class="form-control">{{$tournament->details}}</textarea>
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
        <div class="modal fade" id="myModal-3{{$tournament->id}}" tabindex="-1"
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
                    <form action="{{route('delete-tournament',['tournament_id'=>$tournament->id])}}" method="post">
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
<script>
        $(document).on("change", ".stutus", function () {
            var status = $(this).val();
            var id = $(this).attr("uid");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('tournament-update-status') }}",
                type: "post",
                dataType: "json",
                data: {status: status, id: id, _token: token},
                success: function (data) {
                    console.log(data.status);
                    if (data.status == "ok" && data.user.status == 1) {
                        alert("تم تفعيل البطولة بنجاح");
                    } else if(data.user.status == 0 && data.status == "ok") 
                    alert("تم إلغاء تفعيل البطولة بنجاح");
                    
                    else {
                        alert("خطأ في تفعيل البطولة");

                    }

                },
                error: function () {
                    alert("ERROR");
                }
            })
        })


         $('.tour_type').on('change',function(){
        if( $(this).val() == "رابطة"){

        $(".union").removeClass('d-none')
        }
        else{
        $(".union").addClass('d-none')
        }
    });
    </script>

@stop

