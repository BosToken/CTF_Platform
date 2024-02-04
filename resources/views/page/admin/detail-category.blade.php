<x-layout.admin>
    <title>Detail Category</title>
    <h1 class="text-center mb-3">Detail Category</h1>

    <form action="/admin/category/update/{{$category->id}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$category->name}}" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required>{{$category->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/category/delete/{{ $category->id }}" class="btn btn-danger">Delete</a>
    </form>
</x-layout.admin>
