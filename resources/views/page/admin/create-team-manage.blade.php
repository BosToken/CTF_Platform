<x-layout.admin>
    <title>Create Manage</title>
    <h1 class="text-center mb-3">Create Manage</h1>

    <form action="{{ route('admin-store-team-manage') }}" method="post">
        @csrf

        <label for="exampleFormControlTextarea1" class="form-label">Competition</label>
        <div class="input-group mb-3">
            <select class="form-select" name="information_id" id="inputGroupSelect02">
                @foreach ($informations as $information)
                    <option value="{{ $information->id }}">{{ $information->information }}</option>
                @endforeach
            </select>
        </div>

        
        <label for="exampleFormControlTextarea1" class="form-label">Team</label>
        <div class="input-group mb-3">
            <select class="form-select" name="team_id" id="inputGroupSelect02">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
        <div class="input-group mb-3">
            <select class="form-select" name="user_id" id="inputGroupSelect02">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }} ({{$user->name}})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin>
