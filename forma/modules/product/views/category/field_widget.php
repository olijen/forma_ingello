
<div id="inpy">
<!--    <label>Значение</label>-->
<!--    <input id="field-value-name" class="form-control inputsss" name="FieldValue[%%%][name]" aria-required="true"-->
<!--           aria-invalid="false" >-->
<!--    <input  id="field-value-is_main" type="checkbox" name="FieldValue[%%%][is_main]">-->
<!--    </br>-->
</div>
<span id="addInput"  onclick="addInput()">+</span>

<script>
    var inputsss = $('.inputsss');
    var iii = "<div id=\"inpy\">" +
        "<label>Значение</label>" +
        "<input id=\"field-value-name\" class=\"form-control inputsss\" name=\"FieldValue[%%%][name]\" aria-required=\"true\"\n" +
        "       aria-invalid=\"false\">" +
        "<input type=\"checkbox\" name=\"FieldValue[%%%][is_main]\" >" +
        " </br>" +
        "</div>";
    console.log(iii);
    function addInput(){
        inputsss[0] = iii;
        inputsss.push(newstr);
        console.log(inputsss);
        var str = "";
        for(var i = 0; i < inputsss.length; i++) {
            var re = /%%%/gi;
            var newstr = iii.replace(re, i);

            console.log(newstr);
            str += inputsss[i];

        }
        $("#inpy").html(str);
    }


</script>