function closestof(needle,haystack) {
    //criteria
    var percentage = 50;
    var strnotfound = "None";

    if(haystack.length < 1) return;
    function inArray(ne, ha) { var length = ha.length;
      for(var i = 0; i < length; i++) 
        if(ha[i].toLowerCase() == ne.toLowerCase()) return true;
      return false; }
    var hist = []; var points = 0; var a2 = null;
    var a1 = needle.replace('-',' ').split(' ');
    $(haystack).each(function(x1,l){
      points = 0;
      a2 = l.replace('-',' ').split(' ');
      $(a2).each(function(x2,a){
        if(inArray(a,a1)) if(a.length > 1) points++; });
      hist.push([l,points]);
    }); var choose = [strnotfound,-1];
    $(hist).each(function(x3,h){
      if(h[1] > parseInt( ((a1.length + h[0].split(' ').length) / 2) * percentage / 100 ))
        if(h[1] > choose[1]) choose = h;
    }); return choose[0];
}



function verifyselect() { 
    if(array.length < 1)
        $('#list option').each(function(index,item){ array.push($(item).html()); });

    var res = closestof( $('#name').val() , array );
    $('#list').val( res ); 
}

var array = [];

$(document).ready(function(){
    verifyselect();
});