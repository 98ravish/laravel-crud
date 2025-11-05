<!DOCTYPE html>
<html>
<head>
  <title>Add Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Add Contact</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('contacts.store') }}">
    @csrf
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>

    <div class="mb-3">
      <label>Gender</label><br>
      <input type="radio" name="gender" value="Male"> Male
      <input type="radio" name="gender" value="Female"> Female
    </div>

    <div class="mb-3">
      <label>Hobbies</label><br>
      <input type="checkbox" name="hobbies[]" value="Cricket"> Cricket
      <input type="checkbox" name="hobbies[]" value="Music"> Music
      <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    </div>

    <div class="mb-3">
      <label>Country</label>
      <select name="country" class="form-select">
        <option value="">--Select--</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
      </select>
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
  </form>
</body>
</html>
