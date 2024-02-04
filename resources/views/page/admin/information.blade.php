<x-layout.admin>
    <title>Admin Information</title>
    <h1 class="text-center mb-3"><a href="{{ route('admin-create-information') }}">Information</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informations as $key => $information)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="/admin/information/detail/{{ $information->id }}"
                            style="text-decoration: none;">{{ $information->information }}</a></td>
                    <td>{{ $information->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.admin>
