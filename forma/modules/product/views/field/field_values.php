
<div id="inpy">
        <label>Значение <?= $fieldItem+1?></label>
    <?php if (isset($nameWidgetField) && $nameWidgetField == 'widgetDropDownList' || $nameWidgetField == 'widgetTypeahead'): ?>
        <input id="field-value-name" class="form-control inputsss" name="FieldValueNew[0][name]" aria-required="true"
               aria-invalid="false">
        <input id="field-value-is_main" type="radio" class='checkeddd' name="FieldValueRadioButton">
        </br>
    <?php elseif (isset($nameWidgetField) && $nameWidgetField == 'widgetMultiSelect'): ?>
        <input id="field-value-name" class="form-control inputsss" name="FieldValueNew[0][name]" aria-required="true"
               aria-invalid="false">
        <input id="field-value-is_main" type="checkbox" class='checkeddd' name="FieldValueNew[%checked%][is_main]">
        </br>
    <?php endif; ?>
    </div>
    <button type="button" onclick="addInput()" class="btn btn-primary">
+
    </button>

    <script>

        var inputsss = $('.inputsss');
        var inputValue = [];
        var inputChecked = [];
        <?php if (isset($nameWidgetField) && $nameWidgetField == 'widgetDropDownList' || $nameWidgetField == 'widgetTypeahead'): ?>
        var iii = "<div id=\"inpy\">" +
            "<label>Значение %number%</label>" +
            "<input id=\"field-value-name\" class=\"form-control inputsss\" name=\"FieldValueNew[%fieldId%][name]\" aria-required=\"true\"\n" +
            "       aria-invalid=\"false\" value='%inputValue%'>" +
            "<input type=\"radio\" name=\"FieldValueRadioButton\" class='checkeddd' %checked% value='%radioInput%''>" +
            " </br>" +
            "</div>";
        <?php elseif (isset($nameWidgetField) && $nameWidgetField == 'widgetMultiSelect'): ?>
        var iii = "<div id=\"inpy\">" +
            "<label>Значение %number%</label>" +
            "<input id=\"field-value-name\" class=\"form-control inputsss\" name=\"FieldValueNew[%fieldId%][name]\" aria-required=\"true\"\n" +
            "       aria-invalid=\"false\" value='%inputValue%'>" +
            "<input type=\"checkbox\" name=\"FieldValueNew[%fieldId%][is_main]\" class='checkeddd' %checked% value='1'>" +
            " </br>" +
            "</div>";
        <?php endif; ?>
        console.log(iii);

        function addInput() {
            inputsss[0] = iii;
            inputsss.push(iii);
            console.log(inputsss);
            var str = "";
            var getInputsss = $('.inputsss');
            var getChechedd = $('.checkeddd');
            var y = <?= $fieldItem?>;
            for (var i = 0; i < inputsss.length; i++) {
                y++;
                var reFieldId = /%fieldId%/gi;
                var reInputValue = /%inputValue%/gi;
                var reChecked = /%checked%/gi;
                var reNumber = /%number%/gi;
                var reRadioInput = /%radioInput%/gi;
                var newstr = iii.replace(reFieldId, i);
                <?php if (isset($nameWidgetField) && $nameWidgetField == 'widgetDropDownList' || $nameWidgetField == 'widgetTypeahead'): ?>
                newstr = newstr.replace(reRadioInput, i);
                <?php endif; ?>
                newstr = newstr.replace(reNumber, y);

                if (i != inputsss.length - 1) {
                    inputValue[i] = getInputsss[i].value;
                    inputChecked[i] = getChechedd[i].checked;
                    // console.log(inputValue[i]);

                    newstr = newstr.replace(reChecked, inputChecked[i]?'checked':"");
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

