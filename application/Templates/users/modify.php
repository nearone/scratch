<?php include(APPLICATION_PATH . 'Templates/gui/head.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/header.php'); ?>

<div class="container">
    <div class="row">
        <form class="col s8" action="/users/save" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <input id="firstname" name="contact[firstname]" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="lastname" name="lastname" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light red" type="submit" name="action">Submit
            </button>
        </form>
    </div>
</div>

<?php include(APPLICATION_PATH . 'Templates/gui/footer.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/foot.php'); ?>