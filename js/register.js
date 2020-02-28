$(document).ready(function () {
    $p = 0;
    $("#txtConfirmPwd").focusout(function () {
        if ($('#txtPwd').val() == $('#txtConfirmPwd').val()) {
            $('#error-Msg').html('');
            $p = 0;
        } else {
            $('#error-Msg').html('ការផ្ទៀងផ្ទាត់លេខសម្ងាត់មិនត្រឹមត្រូរទេ').css('color', 'red');
            $p = 1;
        }
    });
    $("#txtConfirmPwd").keydown(function () {
        $('#error-Msg').html('');
        $p = 0;
    });
    $("#register").on("click", function () {
        if ($p == 1) {
            return false;
        }
    });
});