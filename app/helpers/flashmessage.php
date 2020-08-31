<?php
if (isset($_POST['addCategory'])) {
    if (count($errors) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['editCategory'])) {
    if (count($errorsEdit) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorsEdit as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['addProduct'])) {
    if (count($errorsProduct) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorsProduct as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>


<?php
if (isset($_POST['editProduct'])) {
    if (count($errorsEditProduct) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorsEditProduct as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['addSize'])) {
    if (count($errorsAddSizeList) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorsAddSizeList as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['editSize'])) {
    if (count($errorsEditSizeList) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorsEditSizeList as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['register'])) {
    if (count($errorRegister) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorRegister as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['loginAdmin'])) {
    if (count($errorLoginAdmin) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorLoginAdmin as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>


<?php
if (isset($_POST['addProductSize'])) {
    if (count($errorsAddingSizeProduct) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorsAddingSizeProduct as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['registerBackoffice'])) {
    if (count($errorRegisterBack) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorRegisterBack as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['editUserBackoffice'])) {
    if (count($errorEditUser) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorEditUser as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['addToCart'])) {
    if (count($errorAddToCart) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorAddToCart as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['forgot'])) {
    if (count($errorResetPassword) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorResetPassword as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['editCustomer'])) {
    if (count($errorEditCustomer) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorEditCustomer as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>

<?php
if (isset($_POST['cod'])) {
    if (count($errorCheckout) > 0) : ?>

        <div class="alert alert-danger">
            <?php foreach ($errorCheckout as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
<?php endif;
} ?>