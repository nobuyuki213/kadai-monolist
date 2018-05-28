@if (count($errors) > 0)
    @foreach($errors as $error)
        <div class="alert aleat-waning" role="aleat">{{ $error }}</div>
    @endforeach
@endif