
<div id="inpy">
        <label>Значение <?= $fieldItem+1?></label>
    <?php if (isset($nameWidgetField) && $nameWidgetField == 'widgetMultiSelect' || $nameWidgetField == 'widgetTypeahead'): ?>
        <input id="field-value-name" class="form-control inputsss" name="FieldValueNew[0][name]" aria-required="true"
               aria-invalid="false">
        <input id="field-value-is_main" type="radio" class='checkeddd' name="FieldValueNew[is_main]">
        </br>
    <?php elseif (isset($nameWidgetField) && $nameWidgetField == 'widgetDropDownList'): ?>
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
        <?php if (isset($nameWidgetField) && $nameWidgetField == 'widgetMultiSelect' || $nameWidgetField == 'widgetTypeahead'): ?>
        var iii = "<div id=\"inpy\">" +
            "<label>Значение %number%</label>" +
            "<input id=\"field-value-name\" class=\"form-control inputsss\" name=\"FieldValueNew[%fieldId%][name]\" aria-required=\"true\"\n" +
            "       aria-invalid=\"false\" value='%inputValue%'>" +
            "<input type=\"radio\" name=\"FieldValueNew[is_main]\" class='checkeddd' %checked% value='1'>" +
            " </br>" +
            "</div>";
        <?php elseif (isset($nameWidgetField) && $nameWidgetField == 'widgetDropDownList'): ?>
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
                var re = /%fieldId%/gi;
                var re1 = /%inputValue%/gi;
                var re2 = /%checked%/gi;
                var re3 = /%number%/gi;
                var newstr = iii.replace(re, i);
                newstr = newstr.replace(re3, y);

                if (i != inputsss.length - 1) {
                    inputValue[i] = getInputsss[i].value;
                    inputChecked[i] = getChechedd[i].checked;
                    // console.log(inputValue[i]);

                    newstr = newstr.replace(re2, inputChecked[i]?'checked':"");
                    newstr = newstr.replace(re1, inputValue[i]);
                } else {
                    newstr = newstr.replace(re1, "");
                    newstr = newstr.replace(re2, "");
                }

                console.log(newstr);
                str += newstr;

            }
            $("#inpy").html(str);
        }


    </script>

