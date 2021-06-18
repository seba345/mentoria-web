<h1>Register</h1>

<?php $form = \app\core\widgets\Form::begin('', 'POST') ?>
<div class="row">
<div class="col">
<?= $form->field($model, 'firstName') ?>
</div>
<div class="col">
<?= $form->field($model, 'lastName') ?>
</div>
</div>
<?= $form->field($model, 'email')->mailField() ?>
<?= $form->field($model, 'password')->passwordField() ?>
<?= $form->field($model, 'confirmPassword')->passwordField() ?>
<button type="submit" class="btn btn-primary">Save</button>
<?= \app\core\widgets\Form::end() ?>