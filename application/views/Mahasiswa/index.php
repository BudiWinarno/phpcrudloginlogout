<div class="container mt-3">
    <a href="<?= base_url(); ?>mahasiswa/tambahdataview" class="btn btn-primary">Tambah Data Mahasiswa</a>
 
    <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
            <th scope="row"><?= $mhs['id']; ?></th>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['nim']; ?></td>
            <td><?= $mhs['email']; ?></td>
            <td><?= $mhs['jurusan']; ?></td>
            <td><a href="<?= base_url(); ?>mahasiswa/ubahdataview/<?= $mhs['id']; ?>" class="badge badge-warning">Edit</a></td>
            <td><a href="<?= base_url('mahasiswa/hapus/') ?><?= $mhs['id']; ?>" class="badge badge-danger">Delete</a></td> 
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>