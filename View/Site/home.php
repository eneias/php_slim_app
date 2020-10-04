<section id="users_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Usuários cadastrados</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <?php foreach($data as $u): ?>
                <div class="col-sm-4 user-item">
                    <div class="col-sm-3 user-subitem">
                        <i class="fa fa-user" style="font-size: 69px"></i>
                    </div>
                    <div class="col-sm-9 user-subitem">
                        <?php echo $u->id; ?><br>
                        <?php echo $u->name; ?><br>
                        <?php echo $u->email; ?><br>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>