
<div id="inpy">
        <label>Значение <?= $i+1?></label>
        <input id="field-value-name" class="form-control inputsss" name="FieldValueNew[0][name]" aria-required="true"
               aria-invalid="false">
        <input id="field-value-is_main" type="checkbox" class='checkeddd' name="FieldValueNew[0][is_main]">
        </br>
    </div>
    <button type="button" onclick="addInput()" class="btn btn-primary">
+
    </button>

    <script>

        var inputsss = $('.inputsss');
        var inputValue = [];
        var inputChecked = [];
        var iii = "<div id=\"inpy\">" +
    "<label>Значение %number%</label>" +
    "<input id=\"field-value-name\" class=\"form-control inputsss\" name=\"FieldValueNew[%fieldId%][name]\" aria-required=\"true\"\n" +
    "       aria-invalid=\"false\" value='%inputValue%'>" +
    "<input type=\"checkbox\" name=\"FieldValueNew[%fieldId%][is_main]\" class='checkeddd' %checked% value='1'>" +
    " </br>" +
    "</div>";
        console.log(iii);

        function addInput() {
            inputsss[0] = iii;
            inputsss.push(iii);
            console.log(inputsss);
            var str = "";
            var getInputsss = $('.inputsss');
            var getChechedd = $('.checkeddd');
            var y = <?= $i?>;
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

