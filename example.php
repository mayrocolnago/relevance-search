<?php
$lista = array("Material 1","Material 3","CORDOALHA DE ACO 7 FIOS","FIO DE ESPINAR","Material 2","Teste P","Material 4","Roteador Tp Link Wifi Dual Band Ac1350 Archer C60 5 Antenas","hAP lite TC","MIKROTIK RB HEX LITE 850MHZ 64MB","TP-LINK ROUTER TL-WR840N","TP-LINK ROUTER TL-WR940N(BR) 450MBPS","CABO REDE PATCH CORD 10\/100MBP","UBIQUITI UNIFI","CABO DROP\/FLAT FIBRA","UBIQUITI SWITCH US-24-BR 24P RJ45 + 2P SFP 1.25GB UNIFI","Martelo","Purificador de \u00c1gua IBBL","BRAVO BOTINA BI.DENS PVC - 39","BRAVO BOTINA BI.DENS PVC - 40");

?><!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>

    <input id="nome" type="text" onkeyup="verificaselect();">&nbsp;&nbsp;&nbsp;
    <select id="lista">
      <option>Nenhum</option>
      <option><?=implode('</option><option>',$lista);?></option>
    </select>
    
    <script>
      function relevantenalista(nome,lista) {
        //criterio 
        var porcentagem = 50;
        var strnaoencontr = "Nenhum";

        if(lista.length < 1) return;
        function inArray(needle, haystack) { var length = haystack.length;
          for(var i = 0; i < length; i++) 
            if(haystack[i].toLowerCase() == needle.toLowerCase()) return true;
          return false; }
        var hist = []; var pontos = 0; var a2 = null;
        var a1 = nome.replace('-',' ').split(' ');
        $(lista).each(function(x1,l){
          pontos = 0;
          a2 = l.replace('-',' ').split(' ');
          $(a2).each(function(x2,a){
            if(inArray(a,a1)) if(a.length > 1) pontos++; });
          hist.push([l,pontos]);
        }); var choose = [strnaoencontr,-1];
        $(hist).each(function(x3,h){
          if(h[1] > parseInt( ((a1.length + h[0].split(' ').length) / 2) * porcentagem / 100 ))
            if(h[1] > choose[1]) choose = h;
        }); return choose[0];
      }

      function verificaselect() { 
        if(array.length < 1)
          $('#lista option').each(function(index,item){ array.push($(item).html()); });

        var res = relevantenalista( $('#nome').val() , array );
        $('#lista').val( res ); 
      }

      var array = [];
    </script>
  </body>
</html>