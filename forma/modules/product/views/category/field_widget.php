<div id="inpy" style="margin-top: 12px">
    <label>Значение <?php if (isset($fieldItem)){
        echo $fieldItem+1;
        }else{
        echo 1;
        } ?>
    </label>
    <?php use forma\modules\product\components\SystemWidget;

    if (isset($nameWidgetField) && $nameWidgetField == 'widgetDropDownList' || $nameWidgetField == 'widgetTypeahead'): ?>
        <input id="field-value-name" class="form-control FieldValueInput" name="<?= isset($fieldItem) ? 'FieldValueNew' : 'FieldValue' ?>[0][name]" aria-required="true"
               aria-invalid="false">
        <input id="field-value-is_main" type="radio" class='FieldValueChecked' name="FieldValueRadioButton" value='0'>
        </br>
    <?php elseif (isset($nameWidgetField) && $nameWidgetField == 'widgetMultiSelect'): ?>
        <input id="field-value-name" class="form-control FieldValueInput" name="<?= isset($fieldItem) ? 'FieldValueNew' : 'FieldValue' ?>[0][name]" aria-required="true"
               aria-invalid="false">
        <input id="field-value-is_main" type="checkbox" class='FieldValueChecked' name="<?= isset($fieldItem) ? 'FieldValueNew' : 'FieldValue' ?>[%checked%][is_main]">
        </br>
    <?php endif; ?>
</div>

<button type="button" onclick="addInput()" class="btn btn-primary">
    +
</button>

<script>
    var FieldValueInput = $('.FieldValueInput');
    var inputValue = [];
    var inputChecked = [];
    <?php if (isset($nameWidgetField) && SystemWidget::oneIsMainValue($nameWidgetField)): ?>
    var iii = "<div id=\"inpy\">" +
        "<label>Значение %number%</label>" +
        "<input id=\"field-value-name\" class=\"form-control FieldValueInput\" name=\"<?= isset($fieldItem) ? 'FieldValueNew' : 'FieldValue' ?>[%fieldId%][name]\" aria-required=\"true\"\n" +
        "       aria-invalid=\"false\" value='%inputValue%'>" +
        "<input type=\"radio\" name=\"FieldValueRadioButton\" class='FieldValueChecked' %checked% value='%radioInput%'>" +
        " </br>" +
        "</div>";
    <?php elseif (isset($nameWidgetField) && SystemWidget::manyIsMainValue($nameWidgetField)): ?>
    var iii = "<div id=\"inpy\">" +
        "<label>Значение %number%</label>" +
        "<input id=\"field-value-name\" class=\"form-control FieldValueInput\" name=\"<?= isset($fieldItem) ? 'FieldValueNew' : 'FieldValue' ?>[%fieldId%][name]\" aria-required=\"true\"\n" +
        "       aria-invalid=\"false\" value='%inputValue%'>" +
        "<input type=\"checkbox\" name=\"<?= isset($fieldItem) ? 'FieldValueNew' : 'FieldValue' ?>[%fieldId%][is_main]\" class='FieldValueChecked' %checked% value='1'>" +
        " </br>" +
        "</div>";
    <?php endif; ?>
    console.log(iii);

    function addInput() {
        FieldValueInput[0] = iii;
        FieldValueInput.push(iii);
        console.log(FieldValueInput);
        var str = "";
        var getFieldValueInput = $('.FieldValueInput');
        var getFieldValueChecked = $('.FieldValueChecked');
        <?php if (isset($fieldItem)): ?>
        var y = <?= $fieldItem?>;
        <?php endif; ?>
        for (var i = 0; i < FieldValueInput.length; i++) {
            <?php if (isset($fieldItem)): ?>
            y++;
            <?php endif; ?>
            var reFieldId = /%fieldId%/gi;
            var reInputValue = /%inputValue%/gi;
            var reChecked = /%checked%/gi;
            var reNumber = /%number%/gi;
            var reRadioInput = /%radioInput%/gi;
            var newstr = iii.replace(reFieldId, i);
            <?php if (isset($nameWidgetField) && SystemWidget::oneIsMainValue($nameWidgetField)): ?>
            newstr = newstr.replace(reRadioInput, i);
            <?php endif; ?>
            <?php if (isset($fieldItem)): ?>
            newstr = newstr.replace(reNumber, y);
            <?php else: ?>
            newstr = newstr.replace(reNumber, i + 1);
            <?php endif; ?>

            if (i != FieldValueInput.length - 1) {
                inputValue[i] = getFieldValueInput[i].value;
                inputChecked[i] = getFieldValueChecked[i].checked;

                newstr = newstr.replace(reChecked, inputChecked[i] ? 'checked' : "");
                newstr = newstr.replace(reInputValue, inputValue[i]);
            } else {
                newstr = newstr.replace(reInputValue, "");
                newstr = newstr.replace(reChecked, "");
            }

            console.log(newstr);
            str += newstr;

        }
        $("#inpy").html(str);
    }


</script>
