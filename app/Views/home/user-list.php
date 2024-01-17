<?php $this->layout('layout::main') ?>

<?php $this->start('main-area') ?>

<section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Senarai</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Role</td>
                          
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['id']?></td>
                                <td><?= $user['username']?></td>
                                <td><?= $user['email']?></td>
                                <td><?= $user['role']?></td>
                                <td><a href="/user/<?= $user['id']?>">Tindakan</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php $this->stop() ?>