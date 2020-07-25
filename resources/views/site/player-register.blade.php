@extends('layouts.Site-Layout') @section('title')تسجيل لاعب@stop @section('content')


<div class="col-md-5 m-auto">

  <!-- modal start  -->


  <!-- widget div-->
                                    
                                       <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-player-index')}}" method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="form-group check-team">
                                                                <input name="code" type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="أدخل رمز الفريق"
                                                                       >

                                                                                                                                    </div>



                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم اللاعب"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>


                                                            <div class="form-group">
                                                            <label>تاريخ الميلاد</label>
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputText1" placeholder="تاريخ الميلاد"
                                                                       name="birth" value="{{old('birth')}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="رقم الهوية الوطنية"
                                                                       name="national_id" value="{{old('national_id')}}">
                                                            </div>

                                                            

                                                              <div class="form-group">
                                                            <label for="exampleInputEmail1">صورة شخصية</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="img"
                                                            />
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                                <label for="exampleInputEmail1">صورة من اي مستند يثبت تاريخ الميلاد </label>
                                                                <input type="file" class="form-control"
                                                                       id="exampleInputText1" placeholder="صورة من أي مستند يثبت تاريخ الميلاد"
                                                                       name="file1">
                                                            </div>

                                                  
                          
                                                </div>
                              
                                                <div class="modal-footer" style="margin-top:1rem;">
                                                                                                                                <button class="btn btn-primary btn-user"><a class="text-white" href="{{route('site-index')}}">الرئيسية</a></button>

                                                                <button type="submit"
                                                                        class="btn btn-primary">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>


  <!--  modal end -->

</div>

</div>

@stop
