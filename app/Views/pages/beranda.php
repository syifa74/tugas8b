<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="home" id="home">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>REVIEW BUKU</h1>
                <h1>MARI BERGABUNG BERSAMA KAMI</h1>
                <p style="width: 90%;" class="mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident delectus obcaecati tempora id porro expedita dignissimos ullam, saepe repellendus! Inventore eveniet, qui, cum, quaerat earum rerum consectetur sit blanditiis aut vitae quos! Incidunt tempore, velit quae, quaerat obcaecati optio magni quasi est corporis aspernatur minus eveniet atque praesentium ipsum adipisci?</p>

                <a href="" class="btn">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<section class="about pt-4" id="tentang">
    <h3 class="text-center pt-5 pb-3">Tentang</h3>
    <div class="container text-justify">
        <div class="row">
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil facilis nesciunt neque debitis! Modi, repellendus hic? Quas nostrum quos, sunt eius, perspiciatis modi perferendis aut ratione, eos nam eaque. Illum, totam! Placeat, corporis! Ut, itaque. Assumenda sapiente a impedit amet animi beatae nulla similique dicta ipsum nisi vitae, neque minus?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat cumque laborum alias quos totam nihil veniam, inventore accusantium fugit similique enim nostrum repellendus iure nesciunt assumenda, soluta aut, ut error doloribus cupiditate animi. Asperiores mollitia, cum tempora perferendis illo aut natus quam, deserunt, nobis ratione labore illum. Praesentium, nesciunt dolor.</p>
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dolorum facilis esse beatae qui sapiente praesentium maiores quod! Velit, quidem labore tempora quas culpa dolore necessitatibus, facilis blanditiis mollitia similique praesentium assumenda reiciendis? Nam sint alias maiores esse, in nihil, sequi deserunt ipsam tempora, perferendis beatae blanditiis quia magnam corporis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, asperiores voluptate. Aperiam atque eveniet repudiandae quibusdam, excepturi natus perferendis corrupti voluptatum ex ab earum ad illo, similique rem nulla fugit incidunt ipsum! Dicta, commodi, rerum consectetur odit delectus aspernatur provident debitis velit, aperiam eaque consequuntur laborum eveniet vero sint minus.</p>
            </div>
        </div>
    </div>
</section>

<section class="list pt-4" id="list">
    <h3 class="text-center pt-5 pb-4">List Buku</h3>

    <div class="container">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-primary" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col">
                <div class="bungkus" style="height: 230px;overflow:auto;">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Lihat</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($buku as $k) : ?>
                                <tr>
                                    <td><?= $k['judul']; ?></td>
                                    <td><?= $k['penulis']; ?></td>
                                    <td><a href="/listbuku/<?= $k['slug']; ?>" class="btn btn-warning">Lihat</a></td>
                                    <td>
                                        <form action="/listbuku/<?= $k['id']; ?>" method="post">
                                            <?php csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="/listbuku/create" class="btn btn-info mx-auto d-block mx-auto mt-3" style="width: 200px">+ tambah buku</a>
            </div>

        </div>
    </div>
</section>

<section class="kontak pt-4" id="kontak">
    <h3 class="text-center pt-5">Hubungi Kami</h3>
    <div class="container">
        <div class="row">
            <form class="mx-auto mt-4" style="width: 70%;">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Pesan</label>
                    <textarea name="" id="" class="form-control" rows="3" placeholder="pesan"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Kirim</button>
            </form>
        </div>
    </div>
</section>

<section class="commingsoon">
    <h3 class="text-center">untuk footer</h3>
</section>
<?= $this->endSection(); ?>