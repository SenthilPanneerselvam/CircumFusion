<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php if ($saved) { ?>
<h1 style="color:green; border: 1px solid green; background-color: yellow;">
    Manufacturer saved successfully.
</h1>
<?php } ?>
<?php $form = ActiveForm::begin(); ?>
    <table>
        <tr>
            <td cellpadding="2" cellspacing="2">
                <?= $form->field($model, 'name') ?>
            </td>
            <td>
                <?= $form->field($model, 'GST') ?>
            </td>
        </tr>
        <tr>
            <td cellpadding="2" cellspacing="2">
                <?= $form->field($model, 'fax') ?>
            </td>
            <td>
                <?= $form->field($model, 'phone') ?>
            </td>
        </tr>
        <tr>
            <td cellpadding="2" cellspacing="2">
                <?= $form->field($model, 'website') ?>
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <th cellpadding="2" cellspacing="2">
                Address
            </th>
            <th>
                
            </th>
        </tr>
        <tr>
            <td cellpadding="2" cellspacing="2">
                <?= $form->field($addressModel, 'line1') ?>
            </td>
            <td>
                <?= $form->field($addressModel, 'line2') ?>
            </td>
        </tr>
        <tr>
            <td cellpadding="2" cellspacing="2">
                <?= $form->field($addressModel, 'city') ?>
            </td>
            <td>
                <?= $form->field($addressModel, 'state') ?>
            </td>
        </tr>
        <tr>
            <td cellpadding="2" cellspacing="2">
                <?= $form->field($addressModel, 'pincode') ?>
            </td>
            <td>
                
            </td>
        </tr>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>