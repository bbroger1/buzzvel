@if ($errors->any())
    <div class="alert alert-danger text-center"
         role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
