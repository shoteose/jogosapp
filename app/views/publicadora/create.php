<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Publicadora</title>
    <link rel="stylesheet" href="<?php echo $url_alias; ?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="form-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-holder">
                    <div class="form-content p-4">
                        <div class="form-items">
                            <h2 class="text-center">Criar Novo Publicadora</h2>
                            <form action="<?php echo $url_alias; ?>/publicadora/create" method="POST" enctype="multipart/form-data">

                                <div class="col-md-12 mb-3">
                                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome da Publicadora">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input class="form-control" type="text" id="pais" name="pais" placeholder="País da Publicadora">
                                </div>

                                <div class="form-button mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Criar Publicadora</button>
                                    <a href="<?php echo $url_alias; ?>/publicadora" class="btn btn-secondary">Voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>