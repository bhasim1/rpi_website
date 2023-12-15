const div = document.createElement("div");
const table = `
<table>
<thead>
  <tr>
    <td>id</td>
    <td>input</td>
  </tr>
</thead>
<tbody id="allrows"></tbody>
</table>`;

const getallurl = "./savescore/getall.php";

function fetchurl(url) {
  fetch(url)
    .then((res) => res.json())
    .then((out) => {
      return out;
    });
}

function showhighscore() {
  const tablediv = document.createElement("div");
  tablediv.innerHTML = table;
  document.body.innerHTML += tablediv;
  let allrows = fetchurl(getallurl);
  for (let index = 0; index < allrows.length; index++) {
    var table = document.getElementById("allrows");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = allrows[index][0];
    cell2.innerHTML = allrows[index][1];
  }
}

function showform(classname) {
  const formdiv = document.createElement("div");
  formdiv.className = classname;
  formdiv.innerHTML = form;
  document.body.innerHTML += formdiv;
}

const form = `<form method="post" action="./savescore/save.php">
<input type="text" name="username" id="">
<input type="text" name="score">
<input type="submit" name="submit">
</form>`;
