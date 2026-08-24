/* basicamente aqui voce entra na pagina e tem tiles que dados de musica imbutido nelas. quando voce clica numa, esses dados sao carregados
pra algum lugar do DOM e é executada a faixa de audio. tambem é possivel pausar e dar play na faixa. */
function initMusica() {
    $(function () {

        var audioPlayer = document.getElementById('audioplayer');//armazena a tag audio na variavel
        var loaded = false; //uma variavel pra setar o estado de carregamento de algo (provavelmente de um arquivo)

        var playBtn = document.getElementById('play');//armazena botao de play
        var pauseBtn = document.getElementById('pause');//armazena botao de pause
        var segundoAtual;
        var segundoTotal;
        var progresso;
        var currentTime;

        //configura botao pause
        pauseBtn.addEventListener('click', (e) => {//adiciona um leitor constante de evento no botao de pause. 
            e.preventDefault();//impede a execução de algum evento padrão que o navegador faria nesse caso

            playBtn.style.display = "inline";//mostra o botao de play
            pauseBtn.style.display = "none";//esconde o botao pause
            audioPlayer.pause();//pausa o audio
            return false;
        });

        //configura botao play
        playBtn.addEventListener('click', (e) => {//adiciona um leitor constante de evento no botao de play. 
            e.preventDefault();//impede a execução de algum evento padrão que o navegador faria nesse caso

            playBtn.style.display = "none";//esconde o botao play
            pauseBtn.style.display = "inline";//mostra o botao de pause
            audioPlayer.play();//da play no audio
            return false;
        });

        //faz o carregamento do arquivo de audio conforme conteudo da variavel file, preenchida mais abaixo
        const playSong = (file) => {//a constante playSong recebe a função usando a variavel file como parametro.

            //aqui faz o carregamento instantaneo de um arquivo de audio (é ao clicar na tile, explica mais adiante)
            if (loaded == false) {//se o estado de carregado for igual a falso (e é, como ta la em cima)
                audioPlayer.innerHTML = `<source src="` + file + `" type="audio/mp3" />`;//preenche a tag audio com a fonte, no caso o caminho do arquivo de audio.
                loaded = true;//altera o carregamento pra verdadeiro, impedindo de se repetir a linha acima
            }

            audioPlayer.load();//executa a funcao load da tag audio pra carregar o novo caminho de file quando a playsong for chamada, quando houver um clique na musica

            //troca os botoes de play/pause
            playBtn.style.display = "none";
            pauseBtn.style.display = "inline";
        };

        //aqui ele percorre as divs classe main col, pega os dados delas e acrescenta dinamicamente em outra div pra preencher informações sobre a faixa e então exibi-las e reproduzir a musica
        document.querySelectorAll('.banner-playlist').forEach(item => {//seleciona todos os elemenos '.banner-playlist' (tiles de playlists/musica) e executa um laço de repetição pra cada um deles

            //evento pra quando voce clicar numa tile reproduzir a musica referente a ela
            item.addEventListener('click', event => {//adiciona um leitor de evento de clique no tile em questao
                let image = item.getAttribute('data-image');//armazena na variavel o conteudo do atributo em questao
                let artist = item.getAttribute('data-artist');//armazena na variavel o conteudo do atributo em questao
                let song = item.getAttribute('data-song');//armazena na variavel o conteudo do atributo em questao
                let file = item.getAttribute('data-file');//armazena na variavel o conteudo do atributo em questao

                let playerArtistComponent = document.getElementsByClassName('player__artist');//armazena na variavel o conteudo da classe em questao

                //acrescenta dinamicamente conteudo a div classe 'player_artist' de indice 0 (a primeira)
                playerArtistComponent[0].innerHTML = ` <div><img src="` + image + `" /></div><div><h3>` + song + `<br/></h3><span>` + artist + `</span></div>`;/*adiciona:
        uma imagem (capa do album provavelmente)
        o nome do artista
        o nome da musica
        */
                playSong(file);//executa a função armazenada em playsong usando file como parametro ja tendo preenchido a variavel file com o caminho do arquivo de audio
            });
        });

        audioPlayer.onloadstart = () => {//quando começar um carregamento na faixa de audio
            alert('começou carregar.');//avisa
        };

        audioPlayer.oncanplaythrough = function () {//quando terminar o carregamento da faixa
            alert("Can start playing video");//avisa
            audioPlayer.play();//e da play automaticamente
            alert(audioPlayer.duration);//e avisa quanto tempo tem a musica
            segundoTotal = audioPlayer.duration;
        };

        //um leitor de evento no play do audio pra avisar que começou a tocar
        audioPlayer.addEventListener('play', function () {
            console.log('começou a tocar');
        });

        //um leitor de evento constante pra ler em qual segundo de reprodução a faixa está.
        audioPlayer.addEventListener('timeupdate', (e) => {
            currentTime = audioPlayer.currentTime;//a variavel recebe o segundo exato na qual está a reprodução
            console.log('current time: ' + currentTime);//e exibe no console
            progresso = ((currentTime / segundoTotal) * 100).toFixed(1);//variavel usada pra indicar o percentual de quanto a musica ja foi reproduzida (barra de progresso).
            console.log('progresso: ' + progresso);//e exibe no console
        });

        setInterval(function () {
            $('.reproducao').css('width', progresso + '%')
        }, 100);
    });
}
