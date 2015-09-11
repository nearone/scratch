<?php include(APPLICATION_PATH . 'Templates/gui/head.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/header.php'); ?>

<div class="container">
    <div class="row">

        <div class="col-md-8">
            <form action="/users/save" method="POST" class='dformservice'>
                <?php if (isset($aVars['aUser']['id'])) { ?>
                    <input type="hidden" value='<?php echo $aVars['aUser']['id']; ?>' />
                <?php } ?>


                <div class="form-group">
                    <input id="firstname" name="contact[firstname]" type="text" class="form-control" value='<?php echo isset($aVars['aUser']['contact']['firstname']) ? $aVars['aUser']['contact']['firstname'] : ''; ?>'>
                    <label for="first_name">First Name</label>
                    <?php echo isset($aVars['aErrors']['contact']['firstname']) ? '<em>' . implode(', ', $aVars['aErrors']['contact']['firstname']) . '</em>' : ''; ?>
                </div>
                <div class="form-group">
                    <input id="lastname" name="lastname" type="text" class="form-control" value='<?php echo isset($aVars['aUser']['lastname']) ? $aVars['aUser']['lastname'] : ''; ?>'>
                    <label for="last_name">Last Name</label>
                    <?php echo isset($aVars['aErrors']['lastname']) ? '<em>' . implode(', ', $aVars['aErrors']['lastname']) . '</em>' : ''; ?>
                </div>
                <div class="form-group">
                    <input id="email" name="email" type="email" class="form-control" value='<?php echo isset($aVars['aUser']['email']) ? $aVars['aUser']['email'] : ''; ?>'>
                    <label for="email">Email</label>
                    <?php echo isset($aVars['aErrors']['email']) ? '<em>' . implode(', ', $aVars['aErrors']['email']) . '</em>' : ''; ?>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include(APPLICATION_PATH . 'Templates/gui/footer.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/foot.php'); ?>