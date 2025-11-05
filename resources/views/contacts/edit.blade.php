<!DOCTYPE html>
<html>
<head>
  <title>Edit Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Edit Contact</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $contact->name) }}">
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
    </div>

    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone', $contact->phone) }}">
    </div>

    <div class="mb-3">
      <label>Gender</label><br>
      <input type="radio" name="gender" value="Male" {{ $contact->gender == 'Male' ? 'checked' : '' }}> Male
      <input type="radio" name="gender" value="Female" {{ $contact->gender == 'Female' ? 'checked' : '' }}> Female
    </div>

    @php
      $selectedHobbies = explode(',', $contact->hobbies ?? '');
    @endphp

    <div class="mb-3">
      <label>Hobbies</label><br>
      <input type="checkbox" name="hobbies[]" value="Cricket" {{ in_array('Cricket', $selectedHobbies) ? 'checked' : '' }}> Cricket
      <input type="checkbox" name="hobbies[]" value="Music" {{ in_array('Music', $selectedHobbies) ? 'checked' : '' }}> Music
      <input type="checkbox" name="hobbies[]" value="Reading" {{ in_array('Reading', $selectedHobbies) ? 'checked' : '' }}> Reading
    </div>

    <div class="mb-3">
      <label>Country</label>
      <select name="country" class="form-select">
        <option value="India" {{ $contact->country == 'India' ? 'selected' : '' }}>India</option>
        <option value="USA" {{ $contact->country == 'USA' ? 'selected' : '' }}>USA</option>
        <option value="UK" {{ $contact->country == 'UK' ? 'selected' : '' }}>UK</option>
      </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
  </form>
</body>
</html>
