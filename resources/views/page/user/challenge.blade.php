<x-layout.user>
    <title>LEGICOMP | Challenges</title>

    <h1 class="text-center mb-3">Challenge</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="d-flex flex-wrap justify-content-start mb-5">
            @foreach ($solveChallenges as $solveChallenge)
                @if ($solveChallenge->challenge->category->name == $category->name)
                    <div class="card bg-success text-white my-3 me-3" style="width: 20rem;" data-bs-toggle="modal"
                        data-bs-target="#modal{{ $solveChallenge->challenge->id }}">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $solveChallenge->challenge->name }}</h4>
                            <h4 class="card-subtitle text-center mt-3">{{ $solveChallenge->challenge->value }}</h4>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $solveChallenge->challenge->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4>{{ $solveChallenge->challenge->name }}</h4>
                                        <h4>{{ $solveChallenge->challenge->value }}</h4>
                                    </div>
                                    <div class="mx-3">
                                        <p>
                                            {!! $solveChallenge->challenge->message !!}
                                        </p>
                                    </div>
                                    <form action="submitFlag/{{ $solveChallenge->challenge->id }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Flag" name="flag"
                                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="submit"
                                                id="button-addon2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($unsolveChallenges as $unsolveChallenge)
                @if ($unsolveChallenge->category->name == $category->name)
                    <div class="card my-3 me-3" style="width: 20rem;" data-bs-toggle="modal"
                        data-bs-target="#modal{{ $unsolveChallenge->id }}">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $unsolveChallenge->name }}</h4>
                            <h4 class="card-subtitle text-center mt-3">{{ $unsolveChallenge->value }}</h4>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $unsolveChallenge->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4>{{ $unsolveChallenge->name }}</h4>
                                        <h4>{{ $unsolveChallenge->value }}</h4>
                                    </div>
                                    <div class="mx-3">
                                        <p>
                                            {!! $unsolveChallenge->message !!}
                                        </p>
                                    </div>
                                    <form action="submitFlag/{{ $unsolveChallenge->id }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Flag" name="flag"
                                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="submit"
                                                id="button-addon2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</x-layout.user>
