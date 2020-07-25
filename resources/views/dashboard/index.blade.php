@extends('layouts.Admin-Layout') @section('title') لوحة التحكم @stop @section('content')

<div class="container statics">

    <div class="row">


        <div class="col-xs-12 col-md-6 col-lg-4 mb-2">

            <div class="badge badge-primary p-5 w-100 tournaments">
                عدد البطولات <span class="badge badge-light">{{count($tournaments)}}</span>
            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-4 mb-2">

            <div class="badge badge-primary p-5 w-100 teams">
                            عدد الفرق <span class="badge badge-light">{{count($teams)}}</span>

            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-4 mb-2">

            <div class="badge badge-primary p-5 w-100 players">
                            عدد الاعبين <span class="badge badge-light">{{count($players)}}</span>
           
            </div>

        </div>
  
    </div>
    <!-- end row -->
    </div>
    <!-- end container -->

    <!-- video stream start-->

    <!-- video stream end -->

@stop @section('js')

 @stop