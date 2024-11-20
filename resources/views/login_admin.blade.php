<div>
    {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form> --}}


    <div>
        <h3>These are the registered users</h3>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            @foreach ($userdata as $user_item)
                <tr>
                    <td>{{ $user_item->first_name }}</td>
                    <td>{{ $user_item->last_name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
