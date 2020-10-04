<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Usuarios</h5>

                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user_data as $user_rec): ?>
                        <tr>
                            <td><?php echo $user_rec->id; ?></td>
                            <td><?php echo $user_rec->name; ?></td>
                            <td><?php echo $user_rec->email; ?></td>
                            <td>
                                <a href="./user/<?php echo $user_rec->id; ?>/editar/">
                                    <i class="fa fa-pencil text-navy"></i>
                                </a>
                                <a href="./user/<?php echo $user_rec->id; ?>/excluir/">
                                    <i class="fa fa-trash text-navy"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>