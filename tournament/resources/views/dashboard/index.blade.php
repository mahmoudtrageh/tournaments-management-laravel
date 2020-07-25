@extends('layouts.Admin-Layout') @section('title') لوحة التحكم @stop @section('content')

<div class="container statics">

 <div class="form-group">
       <select class="form-control season">
            <option disabled selected>اختر الموسم</option>
            @foreach($seasons as $season)
            <option value="{{$season->id}}">
                {{$season->name}}
            </option>
            @endforeach
           
        </select>
    </div>

    <div class="row">

                @foreach($seasons as $key => $season)

    @if($key == 0) 
        <div class="col-xs-12 col-md-6 col-lg-4 mb-2">

            <div class="badge badge-primary p-5 w-100 tournaments">
                عدد البطولات <span class="badge badge-light"></span>
            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-4 mb-2">

            <div class="badge badge-primary p-5 w-100 teams">
                            عدد الفرق <span class="badge badge-light"></span>

            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-4 mb-2">

            <div class="badge badge-primary p-5 w-100 players">
                            عدد الاعبين <span class="badge badge-light"></span>
           
            </div>

        </div>
       @endif
    @endforeach
    </div>
    <!-- end row -->
    </div>
    <!-- end container -->

    <!-- video stream start-->

    <!-- video stream end -->

@stop @section('js')

<script>
 $(document).on("change", ".season", function (e) {
            e.preventDefault();
            var id = $(this).val();
            var token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('get.season') }}",
                type: "post",
                dataType: "json",
                data: {id: id, _token: token},
                success: function (data) {
                        $(".tournaments").html(' عدد البطولات <span class="badge badge-light">'+ data.tournaments.length +'</span>');
                                                $(".teams").html(' عدد الفرق <span class="badge badge-light">'+ data.teams.length +'</span>');

                        $(".players").html(' عدد اللاعبين <span class="badge badge-light">'+ data.players.length +'</span>');

                  

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
 @stop