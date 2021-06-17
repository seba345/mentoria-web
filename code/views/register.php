<h1>Register</h1>


<?php $form = \app\core\widgets\Form::begin('','POST')  ?>
<?= $form->field($model,'firstname') ?>
<?= $form->field($model,'lasttname') ?>
<?= $form->field($model,'email') ?>
<?= $form->field($model,'password') ?>
<?= $form->field($model,'confirmPassword') ?>
<?= \app\core\widgets\Form::end('')  ?>


<form method="POST">
  <div class="mb-3">
    <label  class="form-label">Firstname</label>
    <input type="text" name="firstname" value = "<?= $model->firstname ?>"
     class="form-control <?= $model->haError('firstname') ? 'is-invalid' : '' ?>" >
     <div class="invalid-feedback">
     <?= $model->getFirstError('firstname') ?>
     </div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Lastname</label>
    <input type="text" name="lastname" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="text" name="email" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Confirm Password</label>
    <input type="password" name="confirmPassword" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">save</button>
</form>