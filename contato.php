
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <title>Malex</title>
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" id="topoFixo">
            <div class="container">
                <a href="#" class="navbar-brand">Malex</a>
                <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
                    aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item "><a href="./index.php" class="link-nav1 nav-link text-white">Home</a></li>
                        <li class="nav-item "><a href="./sobre.php" class="link-nav1 nav-link text-white">Sobre</a></li>
                        <li class="nav-item "><a href="./servicos.php"
                                class="link-nav1 nav-link text-white">Serviços</a></li>
                        <li class="nav-item "><a href="./contato.php" class="link-nav1 nav-link text-white">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="contato">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17865.598346568157!2d-46.48739015007243!3d-23.430616389614183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce8b8f8da04d2b%3A0xbd3cae41fd2cfb3e!2sMalex%20do%20Brasil!5e1!3m2!1spt-BR!2sbr!4v1670433355617!5m2!1spt-BR!2sbr"
            width="100%" height="928" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div>
            <div class="container text-white form-contact">
                <article class="">
                    <form method="post" class="form-contato">
                        <div class="form-nome">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required placeholder="Nome">
                        </div>
                        <div class="form-email">
                            <label for="emailInfo" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" required placeholder="E-Mail">
                        </div>
                        <div class="form-fone">
                            <label for="phoneNumber" class="form-label">Telefone</label>
                            <input type="text" name="fone" class="form-control" required
                                placeholder="+55 (11) 99999-9999">
                        </div>
                        <div class="form-desc">
                            <label for="comments" class="form-label">Mensagem</label>
                            <textarea name="mens" cols="30" rows="10" class="form-control" required
                                minlength="20"></textarea>
                        </div>
                        <div class="form-submit">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <button class="btn btn-danger" type="submit">Resetar</button>
                        </div>
                    </form>
                </article>
                <article class="info-contact">
                    <h5>Malex</h5>
                    <p>Saiba como a Malex proporciona novas experiências para diversos negócios do mundo inteiro.</p>
                </article>
            </div>
        </div>
    </section>

    <script src="./js/animate.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>