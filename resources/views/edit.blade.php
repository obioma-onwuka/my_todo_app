<x-layout>

    <div class="container py-md-5 container--narrow">
        <h2>Update Todo!</h2>
        <form action="/update-todo/{{$todo->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title:</small></label>
                <input name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" value = "{{$todo->title}}" />

                @error('title')
                    <div class="text-danger" role="alert">
                        <small>
                            {{ $message }}
                        </small>
                    </div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="post-body" class="text-muted mb-1"><small>Description:</small></label>
                <textarea name="description" id="post-body" class="body-content tall-textarea form-control" type="text" cols="30" rows="10">{{$todo->description}}</textarea>

                @error('description')
                    <div class="text-danger" role="alert">
                        <small>
                            {{ $message }}
                        </small>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="todo-status" class="text-muted mb-1">Status:</label>
                <select class="form-control form-control-lg form-control-title" id="status" name="status">
                    <option value="pending" @if ($todo->status == 'pending') selected @endif>Pending</option>
                    <option value="completed" @if ($todo->status == 'completed') selected @endif>Completed</option>
                </select>
            </div>
            <button class="btn btn-primary" style = "background: #222; border: none; border-radius: 25px; padding: 10px">Save Changes</button>
        </form>
    </div>

</x-layout>