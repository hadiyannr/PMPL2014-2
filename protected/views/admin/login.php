<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($loginModel,'username'); ?>
		<?php echo $form->textField($loginModel,'username'); ?>
		<?php echo $form->error($loginModel,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loginModel,'password'); ?>
		<?php echo $form->passwordField($loginModel,'password'); ?>
		<?php echo $form->error($loginModel,'password'); ?>		
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($loginModel,'rememberMe'); ?>
		<?php echo $form->label($loginModel,'rememberMe'); ?>
		<?php echo $form->error($loginModel,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
