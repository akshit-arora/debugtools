<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Debug Tools - DBLog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Debug Tools
            </h1>
            <p class="subtitle">
                DBLog
            </p>
            <div class="block">
                <label class="checkbox">
                    <input type="checkbox" id="enable_dblog" value="1">
                    Enable DBLog
                </label>
            </div>
            <div class="block dblog_enabled">
                <button class="button is-success">Refresh Log</button>
                <button class="button is-danger">Clean Log</button>
            </div>
            <div class="block dblog_enabled">
                <label class="checkbox">
                    <input type="checkbox">
                    Auto Refresh
                </label>
                <div class="control">
                    <input class="input" type="text" placeholder="in seconds">
                </div>
            </div>
            <div class="block dblog_enabled">
                <div class="box">
                    Waiting for DBLog...
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
var dblog_enabled = false;
toggleDbLog();
$('#enable_dblog').on('change', function(){

    $.ajax({
        url: '{{ route('dblog.enable') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            enable: $(this).is(':checked') ? 1 : 0
        },
        success: function(data){
            dblog_enabled = data.enable;

            toggleDbLog();
        }
    });
});

function toggleDbLog(){
    if(dblog_enabled){
        $('.dblog_enabled').show();
    } else {
        $('.dblog_enabled').hide();
    }
}
</script>
</body>
</html>
