
<?php 
    require_once './componentes/topo_arquivo.php';
    
    require_once './conexao/Conexao.php';
    require_once './entidade/Arquivo.php';
    require_once './dao/DaoArquivo.php';
    
    $arquivo = new Arquivo();
    $dao = new DaoArquivo();
    
    $arquivosAtivos = count($dao->buscarTodos());
    $arquivoSelecionado = new Arquivo();
    
    $showBaixarCompleto = false;
    $showBaixarParcial = false;
    $showPainelDownload = false;

       
   
   
    
    if(isset($_GET["upload"]) && isset($_GET["url"]))
    {
        
        if($_GET["upload"] === "ok")
        {
            $showBaixarCompleto = true;
            $arquivoSelecionado = $dao->buscarPorTime($_GET["url"]);
            
        }
        
        if($_GET["upload"] === "parcial")
        {
            $showBaixarParcial = true;
            $arquivoSelecionado = $dao->buscarPorTime($_GET["url"]);
        }
        
  
        
        
    $timezone = new DateTimeZone('America/Sao_Paulo');
       
    $horaAtual = date("H");
    $minutoAtual = date("i");
    $segundoAtual = date("s");
       
       
       
    $horarioArquivo = $arquivoSelecionado->getTempo();
    $horarioFalta = date("H:i:s",strtotime($horarioArquivo." - ".$horaAtual." hours - ".$minutoAtual." minutes - ".$segundoAtual." seconds"));

    $restante = explode(":", $horarioFalta);

    $horas = reset($restante);
    $minutos = next($restante);
    $segundos = end($restante);

        
        if($arquivoSelecionado->getId() != 0)
        {    
            if($horas > 0 && $minutos > 10)
            {
               $dao->deletar($arquivoSelecionado->getId()); 
            }
            else
            {
                $showPainelDownload = true; 
            }

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
    
    <div class="w3-container w3-white"  style="padding: 20px;" ng-show="<?php echo $showPainelDownload; ?>">
        
        <div class="w3-left" style="color: graytext;">
            <p>Arquivos ativos: <span class="w3-badge w3-red"><?php echo $arquivosAtivos; ?></span></p>
        </div> 
        
        <div style="clear: both;"></div>
        
        <div class="w3-container w3-green w3-animate-left" ng-show="<?php echo $showBaixarCompleto; ?>">
            <h3>Sucesso!</h3>
            <p>Arquivo enviado! Clique em "Mostrar" para visualizar a URL para download.</p>
        </div>
        
        <div class="w3-container w3-green w3-animate-left" ng-show="<?php echo $showBaixarParcial; ?>" >
            <h3>Sucesso!</h3>
            <p>Arquivo enviado parcialmente! Clique em "Mostrar" para visualizar a URL para download.</p>
        </div>
        
        <div class="w3-container w3-red" id="error" ng-show="false">
            <h3>Erro!</h3>
            <p>Lamentamos. Houve um erro no momento do upload, por favor tente mais tarde.</p>
        </div>
        <br />             
        <br />
        <hr />
        <br />  
        
            <script type="text/javascript">

                var digital = new Date(); // crio um objeto date do javascript
                //digital.setHours(15,59,56); // caso não queira testar com o php, comente a linha abaixo e descomente essa
                digital.setHours(<?php echo $horas; ?>); // seto a hora usando a hora do servidor
                digital.setMinutes(<?php echo $minutos; ?>);
                digital.setSeconds(<?php echo $segundos; ?>)
                
                var contar = true;
                var mostrar = true;
                <!--
                function clock() {
                
                
                
                var minutes = digital.getMinutes();
                var seconds = digital.getSeconds();
                
                if(minutes == 0 && seconds == 0)
                {
                    window.location.href = "http://localhost/uploadoTemp/arquivo.php";
                }
                
                
                digital.setSeconds(seconds-1 ); // aquin que faz a mágica
                // acrescento zero
                if (minutes <= 9) minutes = "0" + minutes;
                if (seconds <= 9) seconds = "0" + seconds;

                dispTime =  minutes + ":" + seconds;
                document.getElementById("clock").innerHTML = dispTime; // coloquei este div apenas para exemplo
                setTimeout("clock()", 1000); // chamo a função a cada 1 segundo

                }

                window.onload = clock;
                //-->

            </script>
            
            <p><span class="w3-tag w3-teal">Atenção!</span> O arquivo será deletado automáticamente após o zeramento do tempo</p>
            <br />
            
                <div class="w3-xlarge w3-wide w3-text-teal w3-center"><div id="clock"></div></div>


        
        <div class="w3-half">
        <center>
            <div class="w3-xxlarge w3-wide" style="color: graytext; margin-top: 30px;">ARQUIVO</div>
            <br />
            <div class="w3-xlarge w3-wide" style="color: graytext; padding: 20px;">Detalhes do arquivo</div><br />
            <br />
            <table class="w3-table w3-striped">
            <tr>
              <th>Nome</th>
              <th>Tamanho</th>
              <th>Tipo</th>
            </tr>
            <tr>
                <td><?php  echo $arquivoSelecionado->getNome(); ?></td>
                <td><?php  echo $arquivoSelecionado->getTamanho(); ?> Bytes</td>
                <td><?php    echo $arquivoSelecionado->getTipo(); ?></td>
            </tr>
            </table>
        </center> 
        </div>
        <div class="w3-half">
        <center>
            <div class="w3-xxlarge w3-wide" style="color: graytext; margin-top: 30px;">URL</div>
            <br />
            <div class="w3-xlarge w3-wide" style="color: graytext; padding: 20px;">Para visuazilar a URL clique em "Mostrar" abaixo.</div><br />

            <center>
                <button class="w3-btn w3-red" onclick="document.getElementById('id01').style.display='block'" type="button">MOSTRAR</button>
            </center>
            <br />

        </center>
        </div>
                
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">×</span>
      <p><?php echo $arquivoSelecionado->getCaminho(); ?></p>
    </div>
  </div>
</div>
        
       
    </div>
    <br />
    <div class="w3-container w3-white"  style="padding: 20px; min-height: 80%;" ng-show="<?php echo !$showPainelDownload; ?>">
        <center>
            <div class="w3-jumbo w3-wide w3-animate-zoom" style="color: graytext; margin-top: 40px;">ARQUIVO NÃO LOCALIZADO</div>
            <br />
            <hr />
            <br />
            <div class="w3-xxlarge w3-wide w3-animate-left" style="color: graytext; margin-top: 40px;">NO MOMENTO HÁ <span class="w3-badge w3-red"><?php echo $arquivosAtivos; ?></span> ARQUIVOS ATIVOS</div>
        </center>
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