function AR(){var activexmodes=["Msxml2.XMLHTTP","Microsoft.XMLHTTP"];if(window.ActiveXObject){for(var i=0;i<activexmodes.length;i++)
{try{return new ActiveXObject(activexmodes[i]);}catch(e){}}}else if(window.XMLHttpRequest)return new XMLHttpRequest();else return false;}
function Capcha(E)
{
  C=document.getElementById(E);
  C.style.backgroundColor='#BBB';
  var a=new AR();
  a.onreadystatechange=function()
  {
    if( a.readyState==4 && a.status==200 )
    {
      C.innerHTML=a.responseText;
	  Rules();
      C.style.backgroundColor='transparent';
    }
  };
  a.open("GET","capcha.php?"+new Date().getTime(),true);
  a.send();
} 
function Capcheck(V,F)
{
  V=document.getElementById(V);
  V.style.backgroundColor='#BBB';
  var a=new AR();
  a.onreadystatechange=function()
  {
    if( a.readyState==4 && a.status==200 )
    {
      V.style.backgroundColor='transparent';
      setTimeout(F+'('+Number(a.responseText)+');',1);
    }
  };
  a.open('GET','capcha-check.php?v='+V.value+'&c='+document.getElementById('xxcapchaxx').innerHTML,true);
  a.send();
}
function Rules()
{
  var ii,objRules,RULZ="";
  var mysheet=document.styleSheets[0];
  var objRules=(mysheet.deleteRule)?mysheet.cssRules:mysheet.rules;
  for(ii=0;ii<objRules.length;ii++)if(objRules[ii].selectorText.indexOf('#CAPCHAX')>=0)break;
  if(ii>=objRules.length) // Add new rules...
    if(mysheet.removeRule)
	{ // IE
      mysheet.addRule("#CAPCHAX","background-color:#FFF;line-height:8px;");
      mysheet.addRule("#CAPCHAY","background-color:#000;line-height:8px;");
    }else{ // FF
      mysheet.insertRule("#CAPCHAX{background-color:#FFF;line-height:8px;}");
      mysheet.insertRule("#CAPCHAY{background-color:#000;line-height:8px;}");
    }
  //for(ii=0;ii<objRules.length;ii++)RULZ+=objRules[ii].selectorText+'\n';alert(RULZ);
}