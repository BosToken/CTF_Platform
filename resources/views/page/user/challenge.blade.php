<x-layout.user>
    <title>Challenge</title>

    <h1 class="text-center mb-3">Challenge</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="d-flex justify-content-start">
            @foreach ($challenges as $challenge)
                @if ($category->name == $challenge->category)
                    <div class="card my-3 me-3" style="width: 20rem;" data-bs-toggle="modal"
                        data-bs-target="#modal{{ $challenge->id }}">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $challenge->name }}</h4>
                            <h4 class="card-subtitle text-center mt-3">{{ $challenge->value }}</h4>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $challenge->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4>{{ $challenge->name }}</h4>
                                        <h4>{{ $challenge->value }}</h4>
                                    </div>
                                    <div class="mx-3">
                                        <p>
                                            {!! $challenge->message !!}
                                        </p>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Flag"
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-success" type="button"
                                            id="button-addon2">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</x-layout.user>
