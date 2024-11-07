<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogo</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                        <h2 class="text-center">Criar Novo Jogo</h2>
                        <form action="<?php echo $url_alias; ?>/jogo/create" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 mb-3">
                                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome do Jogo">
                            </div>

                            <div class="col-md-12 mb-3">
                                <input class="form-control" type="number" id="ano_lancamento" name="ano_lancamento" placeholder="Ano de Lançamento">
                            </div>

                            <div class="col-md-12 mb-3">
                                <select class="form-select" id="id_publicadora" name="id_publicadora">
                                    <option selected disabled value="">Publicadora</option>
                                    <?php foreach ($data['publicadoras'] as $publicadora) { ?>
                                        <option value="<?php echo $publicadora['id']; ?>"><?php echo $publicadora['nome']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <select class="form-select choices-multiple" id="id_generos" name="id_generos[]" multiple>
                                    <?php foreach ($data['generos'] as $genero) { ?>
                                        <option value="<?php echo $genero['id']; ?>"><?php echo $genero['nome']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <input class="form-control" type="file" id="caminho_imagem" name="caminho_imagem" accept="image/*">
                            </div>

                            <div class="form-button mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Criar Jogo</button>
                                <a href="<?php echo $url_alias; ?>/jogo" class="btn btn-secondary">Voltar</a>
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
