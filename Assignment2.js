addRow=function()
{
	const sampleTable = document.getElementById('myTable');
	const NR_ROWS = sampleTable.rows.length;

	const rowX = sampleTable.insertRow(NR_ROWS);
	const cell1 = rowX.insertCell(0);
	const cell2 = rowX.insertCell(1);
  const cell3 = rowX.insertCell(2);
  const cell4 = rowX.insertCell(3);

	cell1.innerHTML = `-`;
	cell2.innerHTML = `-`;
  cell3.innerHTML = `-`;
  cell4.innerHTML = `-`;
  
  cell1.style="text-align:Left";
  cell1.contentEditable='true';
  cell2.style="text-align:Left";
  cell2.contentEditable='true';
  cell3.style="text-align:Right";
  cell3.contentEditable='true';
  cell4.style="text-align:Right";
  cell4.contentEditable='true';
}

addCol=function()
{
	 
   var table = document.getElementById("myTable");
   var rows = table.rows;
   for(var j=0;j<rows.length;j++)
   {
   	 var newCell = table.rows[j].insertCell(3);
     newCell.style="BoxSize";
     newCell.contentEditable='true';
     newCell.innerHTML = `-`;
     newCell.style="text-align:Right";
   }

}
        
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
       rows[i].cells[cells.length-1].innerHTML = "<td>" + Math.round(average) + "</td>";
       rows[i].cells[cells.length-1].style.backgroundColor = "red";
       rows[i].cells[cells.length-1].style.color = "#FFFFFF";
     }
     else
     {
       rows[i].cells[cells.length-1].innerHTML = "<td>" + Math.round(average) + "</td>";
       rows[i].cells[cells.length-1].style.backgroundColor = "white";
       rows[i].cells[cells.length-1].style.color = "black";
    }
     }
     
 }
 var assaignment = 1,
 counter = 2, iteration = 4; 
var defaultC = 2, defaultR = 4;
var colL = localStorage._colLength;
var rowL = localStorage._rowLength;


sortRows = function(){
	while(colL > defaultC){
  	addRow();
  	colL--;
  }

  while(rowL > defaultR){
  	addCol();
  	rowL--;
  }

  defaultC = colL;
  defaultR = rowL;

}

saveTab = function(){
	alert("Your table has been saved as a cookie in your local storage");
  var table = document.getElementById("myTable");
  var colu = table.rows.length;
  var row = table.rows[0].cells.length;
  var table_save = new Array();
  

  localStorage._colLength = colu;
  localStorage._rowLength = row;
 

 
 
  for(var x = 0; x<colu; x++){
  	for(var y = 0; y<row; y++){
    		var newCell = table.rows[x].cells[y].innerText;
        table_save.push(newCell);
			}
		}
   localStorage["table_save"] = JSON.stringify(table_save);
}


loadTab = function(){

  sortRows();

  var table_save = JSON.parse(localStorage["table_save"]);
  
  var table_Load = document.getElementById("myTable");
  var col_Load = table_Load.rows.length;
  var row_Load = table_Load.rows[0].cells.length;
  
  
  

	for(var x = 1; x<col_Load; x++){ 
  		for(var y = 0; y<row_Load; y++){
  			var newCell_Load = table_Load.rows[x].cells[y];
  			newCell_Load.innerText = table_save[iteration];
  			iteration++;
  		}
  	}

}

document.getElementById('myFunction').onclick = myFunction;
document.getElementById('AddRow').onclick = AddRow;
document.getElementById('AddCol').onclick = AddCol;
document.getElementById('saveTab').onclick = saveTab;
document.getElementById('loadTab').onclick = loadTab;