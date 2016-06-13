<html>
<head><title> Safe &amp; Slim Capcha - LittleRedGhost </title></head>
<script type="text/javascript" src="capcha-inc.js"></script>
<style type="text/css">
  #STATUS { font-style:italic; font:normal 12px arial; color:grey; }
  body    { background-color: white;  font: bold 15px arial; }
  td      { text-align:center; }
  a       { text-decoration:none; line-height:1.5em; padding:3px;
            border-bottom:3px solid transparent; border-right:3px solid transparent; }
  a:hover { border-bottom:3px solid navy; border-right:3px solid navy; }
</style>

<body>
  <h1> Safe &amp; Slim Capcha - by <a href="http://twitter.com/aLittleRedGhost">LittleRedGhost</a></h1>
  <br />  <br />  <br />  <br />

  <table cellpadding="8" cellspacing="0" border="1">
   <tbody>
    <tr>
     <td> Capcha View </td>
     <td> Capcha Text </td>
     <td> &nbsp; </td>
    </tr>
    <tr>
     <td id="CV"> Please<br/>Wait... </td>
     <td> <input id="CT" type="text" value=""/> </td>
     <td> 
       <a href="javascript:Refresh();">Refresh</a> <br/> 
       <a href="javascript:Validate();">Validate</a> 
     </td>
    </tr>
   </tbody>
  </table>

  <br /> <br />
  <div id="STATUS"> (err) </div>
</body>

<script type="text/javascript">
  function Refresh(){ Capcha('CV'); }
  function Validate(){ Capcheck('CT','toDoNext'); }

  function toDoNext(ok){ 
    if(ok)alert('Capcha cool');
    else  alert('Capcha fail'); 
    Refresh();
  }

  Refresh(); // Get first Capcha.

  document.getElementById('STATUS').innerHTML="OK.";
</script>
</html>

