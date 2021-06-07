<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Export Excel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            padding: 20px 50px;
            font-family: sans-serif;
        }
        h4 {
            font-size: 20px;
            font-weight: 500;
        }
        a {
            background: #06c;
            border-color: #06c;
            outline: none;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            border-radius: 3px;
            padding: 10px 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h4>Silahkan Klik tombol di bawah ini untuk mengexport data</h4>
    <a href="<?= base_url('export/export_data'); ?>" target="_blank">Export Data</a>
</body>
</html>