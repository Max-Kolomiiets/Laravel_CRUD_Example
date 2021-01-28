<form method="POST" action="{{ route($route, $company) }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete</button>
</form>