<x-layout>

    <div class="container py-md-5 container--narrow">
        <h2>Create new todo!</h2>
        <form action="/create-todo" method="POST">
            @csrf
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title:</small></label>
                <input name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />

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
                <textarea name="description" id="post-body" class="body-content tall-textarea form-control" type="text"></textarea>

                @error('description')
                    <div class="text-danger" role="alert">
                        <small>
                            {{ $message }}
                        </small>
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" style = "background: #222; border: none; border-radius: 25px; padding: 5px">Save Todo</button>
        </form>
    </div>

</x-layout>