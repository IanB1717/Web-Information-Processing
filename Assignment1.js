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
      if (parseInt(table.rows[i].cells[x].innerHTML) < 0) {
        alert("A number entered is less than 0 , Enter numbers only between 0 - 100 please");
        table.rows[i].cells[x].innerHTML = "-";

      } else if (parseInt(table.rows[i].cells[x].innerHTML) > 100) {
        table.rows[i].cells[x].innerHTML = "-";
        alert("A number enetered is greater than 100 , Enter numbers only between 0 - 100 please");

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
