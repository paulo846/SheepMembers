<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transmitir Vídeo do YouTube para TV</title>

    <style>
        .cast-button {
            width: 100px;
        }
    </style>
</head>

<body>
    <!-- Adicione o botão de lançamento do Google Cast com a classe "cast-button" -->
    <div class="cast-button">
        <google-cast-launcher></google-cast-launcher>
    </div>

    <script>
        // Função de inicialização da API do Google Cast
        window.addEventListener('DOMContentLoaded', function() {
            window['__onGCastApiAvailable'] = function(isAvailable) {
                if (isAvailable) {
                    console.log("Inicializando a API do Google Cast...");
                    initializeCastApi();
                }
            };
        });

        // Função para inicializar a API do Google Cast
        function initializeCastApi() {
            const applicationId = '67B3FE8B'; // ID do aplicativo Google Cast

            // Configurar as opções do Google Cast
            const castOptions = new cast.framework.CastOptions();
            castOptions.receiverApplicationId = applicationId;

            const context = cast.framework.CastContext.getInstance();
            context.setOptions(castOptions);

            // Adicionar lógica para iniciar a transmissão
            const castButton = document.querySelector('.cast-button');

            castButton.addEventListener('caststatechanged', function(event) {
                if (event.castState === cast.framework.CastState.CONNECTED) {
                    console.log("Tentando conectar a um dispositivo Google Cast...");

                    // Conectado ao dispositivo, inicie a transmissão
                    const castSession = context.getCurrentSession();

                    if (castSession) { // Verifique se há uma sessão ativa
                        console.log("Tentando transmitir o vídeo...");

                        const mediaInfo = new chrome.cast.media.MediaInfo('https://rl.vinhaonline.com/testeapi', 'text/html');
                        const request = new chrome.cast.media.LoadRequest(mediaInfo);

                        castSession.loadMedia(request).then(
                            function() {
                                console.log("Transmissão iniciada com sucesso.");
                            },
                            function(errorCode) {
                                console.error("Ocorreu um erro ao iniciar a transmissão: " + errorCode);
                            }
                        );
                    } else {
                        console.error("Não há sessão ativa para iniciar a transmissão.");
                    }
                }
            });
        }
    </script>


    <!-- Inclua a biblioteca Cast Sender -->
    <script src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1" async></script>
</body>

</html>