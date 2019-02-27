function myFunction() {
   var table = document.getElementById("myTable");
   var rows = table.rows;
   
   for (var i = 1; i < rows.length; i++) {
     var cells = rows[i].cells;
     var sum = 0;
		 var numbers = 0;
     for (var x = 2; x < (cells.length -1); x++) {
       var cell = cells[x];
       var addme = parseInt(cell.innerHTML);
       if(!isNaN(addme)) {       
          sum += addme;
          numbers++;
       }
     }
     var average = sum / numbers;
     if(average<=40)
     {	
       rows[i].cells[7].innerHTML = "<td>" + Math.round(average) + "</td>";
       rows[i].cells[7].style.backgroundColor = "red";
       rows[i].cells[7].style.color = "#FFFFFF";
     }
     else
     {
       rows[i].cells[7].innerHTML = "<td>" + Math.round(average) + "</td>";
     }
     
   }
 }

document.getElementById('myFunction').onclick = myFunction;