<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <?= form_open_multipart('upload', 'class="card"') ?>
                <div class="card-body">
                    <label for="">TESTE</label>
                    <input type="file" class="form-control" name="imagem" id="">
                    <button type="submit" class="btn btn-success mt-3">ENVIAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>