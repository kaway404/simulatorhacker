	function horas(){
  camada = document.getElementById('data');
  horasd = document.getElementById('data');
  hoje = new Date();
  hora = hoje.getHours();
  if(hora<=9){
    hora = "0" + hora;
  }
  minuto = hoje.getMinutes();
  if(minuto<=9){
    minuto = "0" + minuto;}
    segundo = hoje.getSeconds();
    if(segundo<=9){
      segundo = "0" + segundo;
    }camada.innerHTML = hora + ":" + minuto ;setTimeout("horas()",1000);
    horasd.innerHTML = hora + ":" + minuto ;setTimeout("horas()",1000);
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var timeValue = "" + (hours)
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timerRunning = true;
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday;
myyear= mydate.getFullYear();
year = myyear
if(myday == 0)
day = " Domingo, "
else if(myday == 1)
day = " Segunda, "
else if(myday == 2)
day = " Terça, "
else if(myday == 3)
day = " Quarta, "
else if(myday == 4)
day = " Quinta, "
else if(myday == 5)
day = " Sexta, "
else if(myday == 6)
day = " Sábado, "
if(mymonth == 0)
month = " de Janeiro"
else if(mymonth ==1)
month = " de Fevereiro"
else if(mymonth ==2)
month = " de Março"
else if(mymonth ==3)
month = " de April"
else if(mymonth ==4)
month = " de Maio"
else if(mymonth ==5)
month = " de Junho"
else if(mymonth ==6)
month = " de Julho"
else if(mymonth ==7)
month = " de Agosto"
else if(mymonth ==8)
month = " de Setembro"
else if(mymonth ==9)
month = " de Outubro"
else if(mymonth ==10)
month = " de Novembro"
else if(mymonth ==11)
month = " de Dezembro"
  }