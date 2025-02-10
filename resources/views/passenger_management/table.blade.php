<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Student ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($passengers as $key => $passenger)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $passenger->fullname }}</td>
                <td>{{ $passenger->email }}</td>
                <td>{{ $passenger->phone }}</td>
                <td>{{ $passenger->student_id }}</td>
                <td>
                    <a href="{{ route('passengers.show', $passenger->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('passengers.edit', $passenger->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('passengers.destroy', $passenger->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
