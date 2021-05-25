<?php ob_start(); ?>
<div class="container-fluid">
    <div class="row">

        <?= $conversation_list_partial ?>

        <div class="col-sm-6 col-md-9 mt-2">
            <div class="row">
                <div class="col-10">
                    <h2><i class="bi-people-fill mx-2"></i>Friends</h2>
                </div>
                <div class="col-2 align-self-center d-flex justify-content-end">
                    <a href="#" class="btn btn-success disabled">Add a Friend</a>
                    </btn>
                </div>
            </div>
            <form method="post">
                <div class="mb-3">
                    <p class="lead">ADD FRIEND</p>
                    <p class="text-muted small">You can add a friend with their Discoding Tag. It's cAsE sEnSitIve!</p>
                    <input type="text" class="form-control" placeholder="Enter a username" id="username" name="username"/>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Send Friend Request</button>
                </div>

                <div>
                    <?= $message ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('base.php'); ?>
