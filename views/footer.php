</div>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#s_btn").click(
            function () {
                sendAjaxForm('s_input', 'index.php?path=send_notes');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        );
        $("#s_input").keydown(function(event){
            if(event.keyCode == 13){
                sendAjaxForm('s_input', 'index.php?path=send_notes');
                document.getElementById('s_input').innerText = '';
            }
        });
    });
    function sendAjaxForm(input_elem, url_action) {
        var note = document.getElementById(input_elem).innerText;
        var time_stamp = new Date().getTime();
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'note': note, 'time_stamp': time_stamp},
            success: function (response) {
                //$('#d_users').html(response);
            },
            error: function (response) {
                $('#d_messages').html('Ошибка. Данные не отправлены.');
            }
        });
    }
</script>
</body>
</html>