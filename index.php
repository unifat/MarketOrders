<HTML>
  <HEAD>
    <TITLE>Ajax Test</TITLE>
  </HEAD>
  <BODY BACKGROUND="#000000">
    <H1>Hello World!</H1>
  </BODY>
  <SCRIPT LANGUAGE="JavaScript">
    function call_a(method, req) {
      (t = new XMLHttpRequest).onreadystatechange = function () {
        if (4 === this.t.readyState && 200 === this.t.status) {
          let resp = JSON.parse(this.t.responseText);
          console.log("Received AJAX Response:");
          console.log(resp);
        }
      }.bind({t: t});
      console.log("AJAX Requesting " + method + " " + req);
      t.open(method, req, !0);
      t.send();
    }
    call_a('UPDATE','a.php?regional_market');
  </SCRIPT>
</HTML>
