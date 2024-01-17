<!DOCTYPE html>
<html data-bs-theme="light" lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MyApp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>


<body class="pt-5">


    <?=$this->insert('layout::navbar')?>

    <?=$this->section('main-area')?>

    <?=$this->insert('layout::footer')?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?=$this->section('script')?>

</body>


</html>

