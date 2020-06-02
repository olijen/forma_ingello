
<div id="inpy">
    <label>Значение 1</label>
    <input id="field-value-name" class="form-control inputsss" name="FieldValue[0][name]" aria-required="true"
           aria-invalid="false">
    <input id="field-value-is_main" type="checkbox" class='checkeddd' name="FieldValue[0][is_main]">
    </br>
</div>
<span id="addInput" onclick="addInput()">+</span>

<script>
    var inputsss = $('.inputsss');
    var inputValue = [];
    var inputChecked = [];
    var iii = "<div id=\"inpy\">" +
        "<label>Значение %number%</label>" +
        "<input id=\"field-value-name\" class=\"form-control inputsss\" name=\"FieldValue[%fieldId%][name]\" aria-required=\"true\"\n" +
        "       aria-invalid=\"false\" value='%inputValue%'>" +
        "<input type=\"checkbox\" name=\"FieldValue[%fieldId%][is_main]\" class='checkeddd' %checked% value='1'>" +
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
        for (var i = 0; i < inputsss.length; i++) {
            var re = /%fieldId%/gi;
            var re1 = /%inputValue%/gi;
            var re2 = /%checked%/gi;
            var re3 = /%number%/gi;
            var newstr = iii.replace(re, i);
             newstr = newstr.replace(re3, i+1);
            if (i != inputsss.length - 1) {
                inputValue[i] = getInputsss[i].value;
                inputChecked[i] = getChechedd[i].checked;

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
