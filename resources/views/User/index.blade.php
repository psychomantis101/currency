<h1>USERS</h1>

<h2><a href="{{route('user.create')}}">Create New User</a></h2>

<ul>
    @foreach($users as $user)
        <li> <a href="{{route('user.show', $user->id)}}">{{$user->name}}</a></li>
    @endforeach
</ul>
