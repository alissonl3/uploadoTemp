
<?php 
    require_once './componentes/topo.php';
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
<div class="w3-row" style="width: 100%;">
    
    <div class="w3-container w3-white"  style="padding: 20px;">
        
        <div style="color: graytext;">
            <p>Arquivos ativos: <span class="w3-badge w3-red">6</span></p>
        </div>
        
        <form method="post" action="controle/recebe_upload.php" enctype="multipart/form-data">
            <label>Arquivo</label>
            <input type="file" name="arquivo" />

            <input type="submit" value="Enviar" />
        </form>
        
        <center>
            <div class="w3-xxxlarge w3-wide w3-animate-zoom" style="color: graytext; margin-top: 40px;">SELECIONE O ARQUIVO</div>
        </center>
        <br />
        <hr />
        <br />
        <div class="w3-half">
        <center>
            <div class="w3-xxlarge w3-wide" style="color: graytext; margin-top: 30px;">ARQUIVO</div>
            <br />
            <div class="w3-xlarge w3-wide" style="color: graytext; padding: 20px;">Os tipos de arquivos 
            suportados são .zip e .rar e não deve exceder o tamanho de 2 MB.</div>
            <br />
            <a href="#comousar" class="w3-btn w3-teal" >MAIS</a>
        </center> 
        </div>
        <div class="w3-half">
            <form class="w3-container w3-card-4" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
            <input type="hidden" name="acao" value="upload" />
            <h2 class="w3-text-teal">PREENCHA OS CAMPOS</h2>

            <p>      
            <label class="w3-text-teal"><b>Arquivo:</b> (.rar;.zip)</label>
            <input  class="w3-input w3-border" name="arquivo" type="file"></p>

            <p>      
            <label class="w3-text-teal"><b>Tempo:</b> (Hora:Min)</label>
            <input class="w3-input w3-border" name="tempo" type="time"></p>
            
            <p>      
            <label class="w3-text-teal"><b>Email:</b></label>
            <input class="w3-input w3-border" name="email" type="email"></p>
            
            <p>      
            <label class="w3-text-teal"><b>Senha:</b> (Hora:Min)</label>
            <input class="w3-input w3-border" name="senha" type="password"></p>

            <center>
            <button class="w3-btn w3-red">UPLOAD</button></center>
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
                    no seguinte formato: Hora:Min.
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
                    2 - Acessando a url o download iniciára automáticamente.
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
            <p>"Quem já não quis enviar um arquivo para seu colega e foi impedido? Quem já não quis upar um arquivo para que somente seu colega baixasse para deletar ele."</p>
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
            
        }
        
        //VERIFICA SE A AÇÃO É EMAIL
        if($_POST['acao'] == "email")
        {
            
        }
        
        
}

?>