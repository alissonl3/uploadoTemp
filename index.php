
<?php 
    require_once './componentes/topo.php';
    
    require_once './conexao/Conexao.php';
    require_once './entidade/Arquivo.php';
    require_once './dao/DaoArquivo.php';
    
    $arquivo = new Arquivo();
    $dao = new DaoArquivo();
    
    $arquivosAtivos = count($dao->buscarTodos());
    
    
    $showErroTamanho = false;
    $showErroTipo = false;
    $showErroEnviar = false;
    $showErroUpload = false;
    $showErroCaptcha = false;
    
    if(isset($_GET['erro']))
    {
        if($_GET['erro'] == "tamanho")
        {
            $showErroTamanho = true;
        }
        
        if($_GET['erro'] == "tipo")
        {
            $showErroTipo = true;
        }
        
        if($_GET['erro'] == "enviar")
        {
            $showErroEnviar = true;
        }
        
        if($_GET['erro'] == "captcha")
        {
            $showErroCaptcha = true;
        }
        
        
    }

    
?>

<script type="text/javascript">
    // Use jQuery com a variavel $j(...)
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
    $j("#btnVoltarTopo").hide();
    $j(function () {
    $j(window).scroll(function () {
    if ($j(this).scrollTop() > 500) {
    $j('#btnVoltarTopo').fadeIn();
      } else {
    $j('#btnVoltarTopo').fadeOut();
    }
    });
    $j('#btnVoltarTopo').click(function() {
    $j('body,html').animate({scrollTop:0},600);
    }); 
    });});
</script>

<div id="voltarTopo"></div>
<div class="w3-row" style="width: 100%;" ng-app="">
    
    <div class="w3-container w3-white"  style="padding: 20px;">
        <div style="color: graytext;">
            <p>Arquivos ativos: <span class="w3-badge w3-red"><?php echo $arquivosAtivos; ?></span></p>
        </div>
        
        
        <center>
            <div class="w3-xxxlarge w3-wide w3-animate-zoom" style="color: graytext; margin-top: 40px;">SELECIONE UM ARQUIVO</div>
        </center>
        <br />
        <hr />
        <br />
        <div class="w3-half">
        <center>
            <div class="w3-xxlarge w3-wide" style="color: graytext; margin-top: 30px;">ARQUIVO</div>
            <br />
            <div class="w3-xlarge w3-wide" style="color: graytext; padding: 20px;">Os tipos de arquivos 
            suportados são zip, rar, jpg, png, gif, txt, xlsx, apk e não deve exceder o tamanho de 2 MB.</div>
            <br />
            <a href="#" onclick="$j('html,body').animate({scrollTop: $j('#comousar').offset().top}, 1000);" class="w3-btn w3-teal" >MAIS</a>
        </center> 
        </div>
        <div class="w3-half">
            <form class="w3-container w3-card-4" action="index.php" method="POST" enctype="multipart/form-data">                 
            <input type="hidden" name="acao" value="upload" />
            <h2 class="w3-text-teal">PREENCHA OS CAMPOS</h2>
            
            <p style="color: red;" ng-show="<?php echo $showErroTamanho; ?>">O arquivo enviado é muito grande, por favor envie arquivos de até 2Mb.</p>
            <p style="color: red;" ng-show="<?php echo $showErroTipo; ?>">Por favor, envie arquivos com as seguintes extensões: zip, rar, jpg, png, gif, txt, xlsx ou apk.</p>
            <p style="color: red;" ng-show="<?php echo $showErroEnviar; ?>">Lamentamos, não foi possivel enviar o arquivo. Tente mais tarde.</p>
            <p style="color: red;" ng-show="<?php echo $showErroCaptcha; ?>">Por favor, confirme o captcha.</p>
            
                               
            
            <p>      
            <label class="w3-text-teal"><b>Arquivo:</b> (rar, zip, jpg, png, gif e txt)</label>
            <input required class="w3-input w3-border" name="arquivo" type="file"></p>

            <p>      
            <label class="w3-text-teal"><b>Tempo:</b> (min)</label>
            <input required max="10" class="w3-input w3-border" name="tempoUp" type="number"></p>
            
            
            
            <div class="g-recaptcha" data-sitekey="6LcYxxcTAAAAAMPVR1NLXt0LSaAO7Ned3vSqmGQ9"></div>
            <br />
            
            <center>
                <button class="w3-btn w3-red" type="submit">UPLOAD</button></center>
            <br />

            </form>
        </div>
        
       
    </div>
    <br />
    <br />
    <br />
    <div class="w3-card-4 w3-center  w3-wide" style="padding-top: 20px;" id="comousar"  >
            <div class="w3-large w3-wide" style="color: graytext;">COMO USAR?</div>
    </div>

    <div class="w3-container w3-white w3-animate-left" style=" padding: 20px;" >
        <div class="w3-half" style="padding: 20px;">
        <br>
            <div class="w3-tag w3-large w3-padding w3-round-large w3-red w3-center w3-wide" style="color: graytext;">UPLOAD</div>
        <br/>
        <br />
        <ul class="w3-ul">
            <li>
                <div class="w3-large w3-wide" style="color: graytext;">
                    1 - Selecione o arquivo que queria fazer o upload. OBS: Selecione um arquivo menor que o tamanho permitido.
                </div>
            </li>
            <li>
                <div class="w3-large w3-wide" style="color: graytext;">
                    2 - Informe o tempo que queira que ele permaneca ativo para download. OBS: O tempo deve ser informado
                    em minutos e menor que 10 minutos.
                </div>
            </li>
        </ul>
        </div>
        <div class="w3-half" style="padding: 20px;">
        <br />
            <div class="w3-tag w3-large w3-padding w3-round-large w3-red w3-center w3-wide" style="color: graytext;">DOWNLOAD</div>
        <br/>
        <br />
        <ul class="w3-ul">
            <li>
                <div class="w3-large w3-wide" style="color: graytext;">
                    1 - Após o upload será disponibilizado uma url.
                </div>
            </li>
            <li>
                <div class="w3-large w3-wide" style="color: graytext;">
                    2 - Acessando a url o download iniciára automáticamente dependendo do tipo de arquivo.
                </div>
            </li>
        </ul>
        </div>
    </div>
    <br />
    <div class="w3-card-4 w3-center  w3-wide" style="padding-top: 20px;" id="sobre"  >
            <div class="w3-large w3-wide" style="color: graytext;">SOBRE</div>
    </div>   
    <div class="w3-container w3-white w3-animate-left" style=" padding: 20px;">
        <center>
            <div class="w3-xlarge w3-wide" style="color: graytext;">SIMPLICIDADE. PRATICIDADE.</div>
        </center>
        <br />
        <div class="w3-container w3-pale-blue w3-leftbar w3-border-blue">
            <p>"Quem já não quis enviar um arquivo e foi impedido? Quem já não quis upar um arquivo para somente baixar e logo após deletar ele."</p>
        </div>
        <br />
        <div class="w3-large w3-wide" style="color: graytext;">
            <p> O TempUp foi criado com o intuito de upar arquivos temporariamente, onde apenas pessoas que possuem a url do arquivo possa baixa-lo.</p>
            <p> O TempUP não exige um login, permitindo que qualquer pessoa possa upar seu arquivo no formato .zip e .rar.</p>
            <p>Criado em XX/XX/XXX utilizando PHP, MySQL, AngularJS e W3C.css</p>
        </div>
    </div>
    <br />
    <div class="w3-card-4 w3-center  w3-wide" style="padding-top: 20px;" id="contato"  >
            <div class="w3-large w3-wide" style="color: graytext;">CONTATO</div>
    </div> 
    <div class="w3-container w3-white w3-animate-left" style=" padding: 20px;">
        
        <div class="w3-half" style="padding: 20px;">
            <center>
                <img src="resources/img/alisson.jpg" class="w3-circle" />
                <br />
                <div class="w3-large w3-wide" style="color: graytext;">Alisson Lopes</div>
            </center>
            <hr />
            <p  class="w3-medium w3-wide" style="color: graytext;">
                Formado em técnico em informática pelo Instituto Federal Campus Paranavaí e atualmente atua com Java e C#. 
                Possui conhecimento em: JavaScript, MySQL, PHP, ArgularJS, JQuery, Android, Java, C#, HTML, BootStrap.
                Ama tecnologia e vive em busca de novidades referente a essa área.
            </p>
            
        </div>
        <div class="w3-half" style="padding: 20px;">
            <form class="w3-container w3-card-4" action="#">

            <h2 class="w3-text-teal">ENTRE EM CONTATO</h2>
            
            <p>      
            <label class="w3-text-teal"><b>Nome:</b></label>
            <input class="w3-input w3-border" name="nome" type="text"></p>

            <p>      
            <label class="w3-text-teal"><b>Email:</b></label>
            <input  class="w3-input w3-border" name="email" type="email"></p>

            <p>      
            <label class="w3-text-teal"><b>Assunto:</b></label>
            <input class="w3-input w3-border" name="assunto" type="text"></p>
            
            <p>      
            <label class="w3-text-teal"><b>Menssagem:</b></label>
            <textarea class="w3-input w3-border" name="tempo"></textarea></p>

            <center>
            <button class="w3-btn w3-red">ENVIAR</button></center>
            <br />

            </form>
            
        </div>
        
        
    </div>
    
    
</div>

            <!-- botao voltar topo -->
            <input type="button" id="btnVoltarTopo" class="w3-btn-floating-large w3-red" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
            onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 1000);" value="^" >

<?php 
    require_once './componentes/rodape.php';
?>

<?php

//METODO PARA FAZER O UPLOAD
if(isset($_POST['acao'])){
        
        //VERIFICAÇÃO SE A AÇÃO É UPLOAD
        if($_POST['acao'] == "upload")
        {
            
            
            require_once './controle/recebe_upload.php';
            
            
            
            if (isset($_POST['g-recaptcha-response'])) 
                $captcha_data = $_POST['g-recaptcha-response'];
          
            if($_POST['tempoUp'])
                $arquivo->setTempo($_POST['tempoUp']);
            
            
                $arquivo->setNome($nome_final);
                
                $arquivo->setCaminho($_UP['pasta'] . $nome_final);
                
                $arquivo->setTime($nome_final);
                
                $arquivo->setTamanho($tam);
                
                $arquivo->setTipo($extensao);
                
                $timezone = new DateTimeZone('America/Sao_Paulo');
       
                $horario = date("H:i");
                             
       
                $tempo = date("H:i",strtotime($horario." + ".$arquivo->getTempo()." minutes"));
                
                $arquivo->setTempo($tempo.":".date("s"));
                
            if ($captcha_data) 
            {    
            if($tipoErro === "semErro")
            {
                //GRAVAR O EMAIL
                $dao->inserir($arquivo);
                
                echo "<script type='text/javascript'>";
                        echo "location.href='http://localhost/uploadoTemp/arquivo.php?upload=ok&url=".$nome_final."';";
                echo "</script>";
            }
            else if($tipoErro === "tamanhoPHP" || $tipoErro === "tamanhoHTML" || $tipoErro === "tamanho")
            {
                echo "<script type='text/javascript'>";
                        echo "location.href='http://localhost/uploadoTemp/index.php?erro=tamanho';";
                echo "</script>";
            }
            else if($tipoErro === "uploadParcialmente")
            {
                echo "<script type='text/javascript'>";
                         echo "location.href='http://localhost/uploadoTemp/arquivo.php?upload=parcial&url=".$nome_final."';";
                echo "</script>";
                
            }
            else if($tipoErro === "naoUpload" || $tipoErro === "falhaEnviar")
            {
                echo "<script type='text/javascript'>";
                        echo "location.href='http://localhost/uploadoTemp/index.php?erro=enviar';";
                echo "</script>";
            }
            else if($tipoErro === "extensao")
            {
                echo "<script type='text/javascript'>";
                        echo "location.href='http://localhost/uploadoTemp/index.php?erro=tipo';";
                echo "</script>";
            }
            else 
            {
                 echo "<script type='text/javascript'>";
                         echo "location.href='http://localhost/uploadoTemp/arquivo.php?erro=false';";
                echo "</script>";
                
            }
            }
            else 
            {
               echo "<script type='text/javascript'>";
                         echo "location.href='http://localhost/uploadoTemp/index.php?erro=captcha';";
                echo "</script>";               
            }
            
            
        }
        
        //VERIFICA SE A AÇÃO É EMAIL
        if($_POST['acao'] == "email")
        {
            
        }
        
        
}

?>