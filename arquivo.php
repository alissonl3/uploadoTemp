
<?php 
    require_once './componentes/topo_arquivo.php';
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
            <p>Arquivos ativos: <span class="w3-badge w3-red">6</span></p>
        </div>
        
        <div class="w3-container w3-green" id="succes">
            <h3>Sucesso!</h3>
            <p>Clique em "Baixar" para iniciar o download do seu arquivo, ou utilize a URL.</p>
        </div>
        
        <div class="w3-container w3-red" id="error" ng-show="false">
            <h3>Erro!</h3>
            <p>Lamentamos. Houve um erro no momento do upload, por favor tente mais tarde.</p>
        </div>
        
        <center>
            <div class="w3-xxxlarge w3-wide w3-animate-zoom" style="color: graytext; margin-top: 40px;">BAIXAR O ARQUIVO</div>
        </center>
        <br />
        <hr />
        <br />
        <div class="w3-half">
        <center>
            <div class="w3-xxlarge w3-wide" style="color: graytext; margin-top: 30px;">ARQUIVO</div>
            <br />
            <br />
            <table class="w3-table w3-striped">
            <tr>
              <th>Nome</th>
              <th>Tamanho</th>
              <th>Tipo</th>
            </tr>
            <tr>
              <td>Arquivo 01</td>
              <td>0.9 MB</td>
              <td>.rar</td>
            </tr>
            </table>
            <br />
            <br />
            <a href="#" class="w3-btn w3-teal" >BAIXAR</a>
        </center> 
        </div>
        <div class="w3-half">
        <center>
            <div class="w3-xxlarge w3-wide" style="color: graytext; margin-top: 30px;">URL</div>
            <br />
            <div class="w3-xlarge w3-wide" style="color: graytext; padding: 20px;">Acesse:</div><br />
            <div class="w3-border-left w3-border-right" style="color: graytext;">
            <p>
            https:\\www.google.com
            </p>
            </div>
            <br />
            <a href="#" class="w3-btn w3-red" >ACESSAR</a>
        </center>
        </div>
        
       
    </div>
    <br />
    
    
    
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