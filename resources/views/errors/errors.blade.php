@if ($errors->any())
    <div id="checker" class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('success'))
    <div id="checker" class="alert alert-success messagesub text-center">
        <ul>
            {{session()->get('success')}}
        </ul>
    </div>
@endif

@if (session()->has('deleted'))
    <div id="checker" class="alert alert-info text-center">
        <ul>
            {{session()->get('deleted')}}
        </ul>
    </div>
@endif

@if (session()->has('error'))
    <div id="checker" class="alert alert-danger text-center">
        <ul>
            {{session()->get('error')}}
        </ul>
    </div>
@endif
