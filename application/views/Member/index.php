<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <h5 class="card-header text-center">Login</h5>
                <div class="card-body">
                    <form action="<?= base_url(); ?>member/index" method="post">
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                    <hr>
                    <hr>
                    
                    </form>

                    <div class="text-center">
                        <a href="<?= base_url(); ?>member/register">Create Account</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
