$(document).ready(function () {
    $("#addExpense").hide();
    $("#addIncome").hide();
  });
  $("#income").click(function () {
    $("#addExpense").hide();
    $("#addIncome").show();
  });
  $("#expense").click(function () {
    $("#addIncome").hide();
    $("#addExpense").show();
  });
  let flag=0;
let income = 0;
let totalExpense = 0;
let remaining = 0;
let expense = 0;
// add Income
$("#addEnteredIncome").click(function () {
  let income = $("#enterIncome").val();
  if (income == "" || income <= 0) {
    $("#error").html("Enter valid income").css("color", "red");
  } else {
    $("#error").html("");
    $.ajax({
      url: "addIncome.php",
      type: "POST",
      data: "income=" + income,
      datatype: "number",
    }).done(function (result) {
      let res = jQuery.parseJSON(result);
      $("#showIncome").val(res["income"]);
      $("#showRemaining").val(res["remaining"]);
      $("#showExpense").val(res["totalExpense"]);
      total();
      display();
    });
  }
  });
  // add expense
  $("#addEnteredExpense").click(function () {
    let expense = $("#enterExpense").val();
  let category = $("#selectExpense").val();
  if (expense == "" || expense <= 0) {
    $("#error").html("Enter valid expense").css("color", "red");
  } else {
    $("#error").html("");
    $.ajax({
      url: "addExpense.php",
      type: "POST",
      data: { Expense: expense, Category: category, flag: flag },
      datatype: "JSON",
    }).done(function (result) {
      let res = jQuery.parseJSON(result);
      $("#showIncome").val(res["income"]);
      $("#showRemaining").val(res["remaining"]);
      $("#showExpense").val(res["totalExpense"]);
      $("#addEnteredExpense").html("Add");
      flag = 0;
      total();
      display();
    });
  }
     
  });
  // function to display 
  function display() {
    $.ajax({
      url: "display.php",
      type: "POST",
    }).done(function (result) {
      $("#tbody").html(result);
    });
  }
  // function to delete expence
  function deleteExpense(id) {
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: "id=" + id,
    }).done(function () {
      display();
    });
  }
  // function to edit expense
  function editExpense(id) {
    flag = 1;
    $.ajax({
      url: "edit.php",
      type: "POST",
      data: "id=" + id,
    }).done(function (result) {
      let res = jQuery.parseJSON(result);
      $("#enterExpense").val(res["value"]);
      $("#selectExpense").val(res["key"]);
      $("#addEnteredExpense").html("Update");
      total();
      display();
    });
  }
  // function to show category wise totalamount spent
  function total() {
    $.ajax({
      url: "category.php",
    }).done(function (result) {
      $("#categorytbody").html(result);
    });
  }
