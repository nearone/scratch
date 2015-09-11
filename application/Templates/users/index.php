<?php include(APPLICATION_PATH . 'Templates/gui/head.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/header.php'); ?>

<div class="container">
    <table class='table table-striped table-hover table-bordered'>
        <thead>
            <tr>
                <th data-field="id">Name</th>
                <th data-field="name">Item Name</th>
                <th data-field="price">Item Price</th>
                <th data-field="plus"></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Alvin</td>
                <td>Eclair</td>
                <td>$0.87</td>
                <td><a class="btn btn-default" href="/users/modify">Detail</a></td>
            </tr>
            <tr>
                <td>Alan</td>
                <td>Jellybean</td>
                <td>$3.76</td>
                <td><a class="btn btn-default" href="/users/modify">Detail</a></td>
            </tr>
            <tr>
                <td>Jonathan</td>
                <td>Lollipop</td>
                <td>$7.00</td>
                <td><a class="btn btn-default" href="/users/modify">Detail</a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include(APPLICATION_PATH . 'Templates/gui/footer.php'); ?>
<?php include(APPLICATION_PATH . 'Templates/gui/foot.php'); ?>
