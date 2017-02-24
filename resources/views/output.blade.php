<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prakerin Siswa</title>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/job1.css">
    <link rel="stylesheet" href="/css/job2.css">
    <link rel="stylesheet" href="/js/job.js">
  </head>
  <body>
    <a href="{{ url('logout') }}"><input type="submit" name="ok" value="Log Out" class="btn btn-danger"></a>
    <center><h2>E-Bimbingan Prakerin</h2></center>
    <hr>
    <form action="" method="post">
    <div class="form-group">
      <table>
        <tr>
          <td>Username</td>
          <td>:</td>
          <td><input type="text" name="username" value=""></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="password" placeholder="Password" name="password" value=""></td>
        </tr>
        <tr>
          <td>Email/Gmail</td>
          <td>:</td>
          <td><input type="text" name="email" value=""></td>
        </tr>
        <tr>
          <td>Hak Akses</td>
          <td>:</td>
          <td><select name="hak_akses">
            <option value="Siswa">Siswa/Siswi SMKN 1 Kota Cirebon</option>
            <option value="Guru">Guru Pembimbing SMKN 1 Kota Cirebon</option>
          </select>
        </td>
          <tr>
        <tr>
          <td><input type="submit" name="ok" value="Simpan" class="btn btn-success"></td>
        </tr>
      </table>
      <br>
      <br>
      <hr>

      @if(Session::has('success_message'))
        <div class="alert alert-success">
          {{ Session::get('success_message') }}
        </div>
      @endif

      <table class="table table-hover" border="1" height="20" width="500" align="center">
          <tr>
            <td>Id</td>
            <td>Username</td>
            <td>Email</td>
            <td>Hak Akses</td>
            <td>Action</td>
          </tr>
          @foreach ($data ['users'] as $key => $ini)
          <tr>
            <td>{{ $ini->id_login }}</td>
            <td>{{ $ini->username }}</td>
            <td>{{ $ini->email }}</td>
            <td>{{ $ini->hak_akses }}</td>
            <td>
            <a href="/delete/{{ $ini->id_login }}" onclick="return confirm('Yakin akan menghapus?')">Delete</a> ||
            <a href="/edit/{{ $ini->id_login }}">Edit</a>
            </td>
          </tr>
        @endforeach

        </table>
      </div>
      {{ csrf_field() }}
    </form>
  </body>
</html>
