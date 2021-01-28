<form method="POST" action="{{ route($route, $employee) }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete</button>
</form>