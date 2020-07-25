@extends('layouts.Admin-Layout')

@section('title')

    الاعدادات
@stop

<style>
    .admins button {
        float: left;
margin: 13px 0;
padding: 7px 17px;
    }
</style>

@section('content')
<div class="container">
    <div class="sa-content-wrapper">

        <div class="sa-content">
        

        <form action="{{route('edit-details',['admin_id'=>auth()->guard('admin')->user()->id])}}" method="post">
                            @csrf
                           

                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم المدير</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                       placeholder="name" name="name" value="{{auth()->guard('admin')->user()->name}}">
                            </div>

                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">كلمة المرور</label>
                                <input type="password"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="password" value="">
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



        @stop

@section('js')

@stop

