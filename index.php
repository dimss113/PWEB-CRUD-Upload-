<!-- html boilerplate -->
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body>
    <div class="container mx-auto py-8">
      <h2 class="text-2xl font-semibold mb-6">Tabel Data Siswa</h2>
      <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
          <thead class="bg-gray-200">
            <tr>
              <th class="py-2 px-4">Foto</th>
              <th class="py-2 px-4">NIS</th>
              <th class="py-2 px-4">Nama</th>
              <th class="py-2 px-4">Jenis Kelamin</th>
              <th class="py-2 px-4">Telepon</th>
              <th class="py-2 px-4">Alamat</th>
              <th class="py-2 px-4">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php
            include "koneksi.php";

            // query untuk menampilkan semua data siswa
            $sql = $pdo->prepare("SELECT * FROM siswa");
            $sql->execute(); // eksekusi query
            
            while ($data = $sql->fetch()) {

              echo "<tr>";
              echo "<td class='py-2 px-4'><img src='images/" . $data['foto'] . "' alt='Foto Siswa' class='w-12 h-12 rounded-full'></td>";
              echo "<td class='py-2 px-4'>" . $data['nis'] . "</td>";
              echo "<td class='py-2 px-4'>" . $data['nama'] . "</td>";
              echo "<td class='py-2 px-4'>" . $data['jenis_kelamin'] . "</td>";
              echo "<td class='py-2 px-4'>" . $data['telp'] . "</td>";
              echo "<td class='py-2 px-4'>" . $data['alamat'] . "</td>";
              echo "<td class='py-2 px-4'>";
              echo "<a href='form_ubah.php?id=" . $data['id'] . "' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'>Ubah</a>";
              echo "<a href='proses_hapus.php?id=" . $data['id'] . "' class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'>Hapus</a>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </body>

</html>