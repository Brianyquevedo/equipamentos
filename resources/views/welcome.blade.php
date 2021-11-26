<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Equipamentos</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-image: url("https://www.ensinonacional.com.br/wp-content/uploads/2017/06/ja-conhece-o-teclado-Digite-melhor-e-mais-rapido-com-um-curso-de-digitac%CC%A7a%CC%83o.jpg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            color: #000000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
            border-radius: 8px;
            flex-direction: column;
            align-items: center;
        }
        .title {
            font-size: 84px;
            background-color: rgba(255,255,255,0.5);
            border-radius: 8px;
        }
        .links>a {
            background-color: rgba(255,255,255,0.5);
            border-radius: 18px;
            color: #000000;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links>a:hover {
            opacity: 1;
            right: 10px;
            color: #000000;
            background-color: rgb(207, 207, 207);
        }
        .m-b-md {
            margin-bottom: 15px;
        }
        .pg-box {
            background-color: rgba(255,255,255,0.5);
            border-radius: 8px;
            width: 100px;
            padding: 20px;
            margin-bottom: 15px;
            margin-left: 40%;
            align-items: center;
        }
    </style>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function btn_info() {
          Swal.fire({
              title: 'Conteúdo Indisponível!',
              text: 'Tente novamente mais tarde!',
              showClass: {
              popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
              }
          })
        }
    </script>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registre-se</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                Equipamentos de Informática
            </div>
            <div class="links">
                <a href="#" onclick="btn_info();">Equipamentos</a>
                <a href="#" onclick="btn_info();">Blog</a>
                <a href="#" onclick="btn_info();">Sobre</a>
                <a href="#" onclick="btn_info();">Contato</a>
            </div>
        </div>
    </div>
</body>

</html>