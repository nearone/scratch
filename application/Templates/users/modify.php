<?php include(APPLICATION_PATH . 'Templates/gui/head.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/header.php'); ?>

<div class="container">
    <div class="row">
        <form class="col s8" action="/users/save" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <input id="firstname" name="contact[firstname]" type="text" class="validate" value='<?php echo isset($aVars['aUser']['contact']['firstname']) ? $aVars['aUser']['contact']['firstname'] : ''; ?>'>
                    <label for="first_name">First Name</label>
                    <?php echo isset($aVars['aErrors']['contact']['firstname']) ? '<em>' . implode(', ', $aVars['aErrors']['contact']['firstname']) . '</em>' : ''; ?>
                </div>
                <div class="input-field col s6">
                    <input id="lastname" name="lastname" type="text" class="validate" value='<?php echo isset($aVars['aUser']['lastname']) ? $aVars['aUser']['lastname'] : ''; ?>'>
                    <label for="last_name">Last Name</label>
                    <?php echo isset($aVars['aErrors']['lastname']) ? '<em>' . implode(', ', $aVars['aErrors']['lastname']) . '</em>' : ''; ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" value='<?php echo isset($aVars['aUser']['email']) ? $aVars['aUser']['email'] : ''; ?>'>
                    <label for="email">Email</label>
                    <?php echo isset($aVars['aErrors']['email']) ? '<em>' . implode(', ', $aVars['aErrors']['email']) . '</em>' : ''; ?>
                </div>
            </div>
            <button class="btn waves-effect waves-light red" type="submit" name="action">Submit
            </button>
        </form>
    </div>
</div>

<?php include(APPLICATION_PATH . 'Templates/gui/footer.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/foot.php'); ?>