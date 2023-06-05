<x-layout>

    
    @auth
        <div class="container py-md-5 container--narrow">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <p>Welcome <strong>{{auth()->user ()->name}}</strong></p>
                    <h2 class="text-center mb-4">My To Do Lists</h2>
                    <table class="table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Task Name</th>
                                <th scope="col">Task Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($todos as $todo)
                                <tr>
                                    <td>{{$todo->title}}</td>
                                    <td>{{$todo->status}}</td>
                                    <td colspan="3" class = 'mb-5'>
                                        <a class = "text-primary" href="/edit-todo/{{$todo->id}}"><i class="fa fa-edit"></i> Edit</a> 
                                        <form action="/delete-todo/{{$todo->id}}" method = "POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style = "border: none; background: transparent; color: #FF0000"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4"><center>No data found</center></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container py-md-5">
            <div class="row align-items-center">
                <div class="col-lg-7 py-3 py-md-5">
                    <h1 class="display-3">Welcome to Star2do</h1>
                    <p class="lead text-muted">What is the use of Star2do app? <br>
                    Star2do.dev offer a way to increase productivity, stopping you from forgetting things, helps prioritise tasks, manage tasks effectively, use time wisely and improve time management as well as workflow.</p>
                </div>
                <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
                    <form action="/register" method="POST" id="registration-form">
                        @csrf
                        <div class="form-group">
                            <label for="name-register" class="text-muted mb-1"><small>Name:</small></label>
                            <input name="name" id="name-register" class="form-control" type="text" placeholder="John Doe" autocomplete="off" value = "{{old('name')}}" />
                            @error('name')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="email-register" class="text-muted mb-1"><small>Email:</small></label>
                            <input name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" value = "{{old('email')}}" />
                            @error('email')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password-register" class="text-muted mb-1"><small>Password:</small></label>
                            <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
                            @error('password')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                            <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
                            @error('password_confirmation')
                                <div class="text-danger" role="alert">
                                    <small>
                                        {{ $message }}
                                    </small>
                                </div>
                            @enderror
                        </div>
        
                        <button type="submit" class="py-3 mt-4 btn btn-dark btn-block text-capitalize" style = "border-radius: 37px">Sign up for Star2do.dev</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth

</x-layout>