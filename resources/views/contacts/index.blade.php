<!DOCTYPE html>
<html>
<head>
  <title>Contacts List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Contacts</h2>
  <a href="{{ route('contacts.create') }}" class="btn btn-success mb-3">Add New</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
        <th>Gender</th><th>Hobbies</th><th>Country</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->gender }}</td>
        <td>{{ $contact->hobbies }}</td>
        <td>{{ $contact->country }}</td>
        <td>
          <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this contact?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
