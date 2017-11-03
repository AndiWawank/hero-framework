<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Halo</title>
  </head>
  <body>
    <h1>Daftar Users</h1>
      <table border="1">
        <thead>
          <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php

        foreach ($data['users'] as $user) {
          echo "<tr>
            <td>".$user['id']."</td>
            <td>".$user['username']."</td>
            <td>".$user['password']."</td>
            <td>
            <a href=''>Edit</a>
            <a href=''>Hapus</a>
            </td>
          </tr>";
        }

         ?>
      </table>
  </body>
</html>
