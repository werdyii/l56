    <div class="alert alert-success alert-dismissable fade show" role="alert">
        <button type="button" class="close" date-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        Test message status sucess.
    </div>


@if (session('status'))
    <div class="alert alert-success alert-dismissable fade show" role="alert">
        <button class="close" date-dismiss="alert"><span>&times;</span></button>
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
