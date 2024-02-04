<x-layout.admin>
    <title>Detail Information</title>
    <h1 class="text-center mb-3">Detail Information</h1>

    <form action="/admin/information/update/{{$information->id}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Category Name" name="information" value="{{$information->information}}" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required>{{$information->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/information/delete/{{ $information->id }}" class="btn btn-danger">Delete</a>
    </form>
</x-layout.admin>
