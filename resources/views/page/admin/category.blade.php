<x-layout.admin>
    <title>Admin Challenges</title>
    <h1 class="text-center mb-3"><a href="{{ route('admin-create-category') }}">Category</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="category/detail/{{ $category->id }}"
                            style="text-decoration: none;">{{ $category->name }}</a></td>
                    <td>{{ $category->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.admin>
