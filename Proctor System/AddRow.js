var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = `<div>
    <div id="education_fields">

  </div>
  <div class="form-row">
  <div class="col-md-3 mb-3">
      <input type="text" class="form-control" id="CourseName" name="coursename[]" value="" placeholder="Course name">
  </div>

  <div class="col-md-2 mb-3">
      <input type="number" class="form-control" id="Credits" name="credits[]" value="" placeholder="No of credits">
  </div>

  <div class="col-md-3 mb-3">
      <input type="text" class="form-control" id="Attemptno" name="attemptno[]" value="" placeholder="Attempt number">
  </div>
  <div class="col-md-3 mb-3">
      <input type="text" class="form-control" id="Faculty" name="faculty[]" value="" placeholder="Faculty Handling">
  </div>

<div class="input-group-btn">
<button class="btn btn-danger" type="button" onclick="remove_education_fields(` + room + `);"> <span class="fa fa-minus" aria-hidden="true"></span> </button>
</div>
</div>
 `;

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}