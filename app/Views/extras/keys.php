<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Key</title>
    <style>
        body {
            text-align: center;
            background: #f1f1f1;
        }

        .wrapper {
            padding-top: 60px;
        }

        button.form-control {
            background: #f7f7f7 none repeat scroll 0 0;
            border-color: #ccc;
            box-shadow: 0 1px 0 #ccc;
            color: #555;
            vertical-align: top;
            border-radius: 3px;
            border-style: solid;
            border-width: 1px;
            box-sizing: border-box;
            cursor: pointer;
            display: inline-block;
            font-size: 13px;
            height: 28px;
            line-height: 26px;
            margin: 0;
            padding: 0 10px 1px;
            text-decoration: none;
            white-space: nowrap;
        }

        input.form-control {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
            color: #32373c;
            outline: 0 none;
            transition: border-color 50ms ease-in-out 0s;
            margin: 1px;
            padding: 3px 5px;
            border-radius: 0;
            font-size: 14px;
            font-family: inherit;
            font-weight: inherit;
            box-sizing: border-box;
            color: #444;
            font-family: "Open Sans", sans-serif;
            line-height: 1.4em;
            width: 310px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <button class="form-control" id="keygen">Generate API Key</button>
        <input class="form-control" id="apikey" type="text" value="" placeholder="Click on the button to generate a new API key ..." />
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function generateUUID() {
            var d = new Date().getTime();
            if (window.performance && typeof window.performance.now === "function") {
                d += performance.now();
            }
            var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = (d + Math.random() * 16) % 16 | 0;
                d = Math.floor(d / 16);
                return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
            });
            return uuid;
        }
        
        $('#keygen').on('click', function() {
            $('#apikey').val(generateUUID());
        });
    </script>
</body>

</html>