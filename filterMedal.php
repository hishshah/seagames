<script type="text/javascript">
  Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
  };

  checkedMedal = ["0", "1", "2", "3"];
  $(document).on('click','#medal-0',function(e) {
    console.log(checkedMedal);
    if ($(this).prop('checked')) {
      $('#medal-0').prop('checked', true);
      $('#medal-1').prop('checked', true);
      $('#medal-2').prop('checked', true);
      $('#medal-3').prop('checked', true);

      checkedMedal.indexOf("0") === -1 ? checkedMedal.push("0") : ""
      checkedMedal.indexOf("1") === -1 ? checkedMedal.push("1") : ""
      checkedMedal.indexOf("2") === -1 ? checkedMedal.push("2") : ""
      checkedMedal.indexOf("3") === -1 ? checkedMedal.push("3") : ""
    } else {
      $('#medal-0').prop('checked', false);
      $('#medal-2').prop('checked', false);
      $('#medal-3').prop('checked', false);
      checkedMedal.remove("0");
      checkedMedal.remove("2");
      checkedMedal.remove("3");
    }
  });

  $(document).on('click','#medal-1',function(e) {
    console.log(checkedMedal);
    if ($(this).prop('checked')) {
      if (checkedMedal.includes("2") && checkedMedal.includes("3") && !checkedMedal.includes("0")) {
        $('#medal-0').prop('checked', true);
        checkedMedal.indexOf("0") === -1 ? checkedMedal.push("0") : ""
      }
      checkedMedal.indexOf("1") === -1 ? checkedMedal.push("1") : ""
    } else {
      if (checkedMedal.includes("0")) {
        $('#medal-0').prop('checked', false);
        checkedMedal.remove("0");
      }
      checkedMedal.remove("1");
    }
  });

  $(document).on('click','#medal-2',function(e) {
    console.log(checkedMedal);
    if ($(this).prop('checked')) {
      if (checkedMedal.includes("1") && checkedMedal.includes("3") && !checkedMedal.includes("0")) {
        $('#medal-0').prop('checked', true);
        checkedMedal.indexOf("0") === -1 ? checkedMedal.push("0") : ""
      }
      checkedMedal.indexOf("2") === -1 ? checkedMedal.push("2") : ""
    } else {
      if (checkedMedal.includes("0")) {
        $('#medal-0').prop('checked', false);
        checkedMedal.remove("0");
      }
      checkedMedal.remove("2");
    }
  });

  $(document).on('click','#medal-3',function(e) {
    console.log(checkedMedal);
    if ($(this).prop('checked')) {
      if (checkedMedal.includes("2") && checkedMedal.includes("1") && !checkedMedal.includes("0")) {
        $('#medal-0').prop('checked', true);
        checkedMedal.indexOf("0") === -1 ? checkedMedal.push("0") : ""
      }
      checkedMedal.indexOf("3") === -1 ? checkedMedal.push("3") : ""
    } else {
      if (checkedMedal.includes("0")) {
        $('#medal-0').prop('checked', false);
        checkedMedal.remove("0");
      }
      checkedMedal.remove("3");
    }
  });

  function getMedalFilterValue() {
    return checkedMedal;
  }
</script>
