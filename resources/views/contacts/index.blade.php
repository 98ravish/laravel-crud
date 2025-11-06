<!DOCTYPE html>
<html>
<head>
  <title>Contacts List</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--  jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <!-- DataTables CSS + JS -->
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>

<body class="container mt-4">
  <h2 class="mb-4">📇 Contacts</h2>
  <a href="{{ route('contacts.create') }}" class="btn btn-success mb-3">➕ Add New</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table id="contactsTable" class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
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

  <script>
  $(document).ready(function() {
      $('#contactsTable').DataTable({
          "pageLength": 5,
          "lengthMenu": [5, 10, 25, 50],
          "ordering": true,
          "language": {
              "search": "🔍 Search Contacts:",
              "lengthMenu": "Show _MENU_ entries per page"
          }
      });
  });
  </script>
</body>
</html>
