@if (count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-warning text-center" role="alert">{{ $error }}</div>
    @endforeach
@endif