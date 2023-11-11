import "./bootstrap";
import "flowbite";

// Hamburger
$("#hamburger").on("click", function (e) {
    $("body").addClass("overflow-hidden");
    $("#bgSideMenu").removeClass("hidden");
    $("#menuIcon").slideToggle("slow");
    $("#closeIcon").slideToggle("slow");
    $("#sideMenu").removeClass("hidden");
});

// User Menu Dropdown
$("#user-menu-button").on("click", function (event) {
    $("#user-dropdown").toggleClass("hidden");
});

// Side Menu
$("#bgSideMenu").on("click", function (e) {
    $("body").removeClass("overflow-hidden");
    $("#bgSideMenu").toggleClass("hidden");
    $("#menuIcon").slideToggle("slow");
    $("#closeIcon").slideToggle("slow");
    $("#sideMenu").addClass("hidden");
});

// Search
$("#search").on("keyup", function () {
    $value = $(this).val;
});

// Check Input field
$(function () {
    if ($("#donesField").children().last().find("input").val() === "") {
        return false;
    }

    if ($("#problemsField").children().last().find("input").val() === "") {
        return false;
    }

    if ($("#follow_UpField").children().last().find("input").val() === "") {
        return false;
    }
});

// Add Dones input field
var i = 0;
$("#addDonesBtn").on("click", function (e) {
    // console.log($("#donesField").children().last().find("input").val());
    if ($("#donesField").children().last().find("input").val() === "") {
        console.log("Input Kosong");
        return false;
    }
    // Add itteration
    i++;
    $("#donesField").append(
        '<div id="donesRow" class="flex space-x-4"><input type="text" class="input-form-1" id="donesInput" name="dones[' +
            i +
            ']" /><div class="flex space-x-1 items-center"><button type="button" class="remove-field-form">-</button></div></div>'
    );
});

$(document).on("click", ".remove-field-form", function () {
    console.log("Hapus Row");
    $(this).parents("#donesRow").remove();
});

// Add Problems input field
var j = 0;
$("#addProblemsBtn").on("click", function (e) {
    // console.log($("#problemsField").children().last().find("input").val());
    if ($("#problemsField").children().last().find("input").val() === "") {
        console.log("Input Kosong");
        return false;
    }
    // Add itteration
    j++;
    $("#problemsField").append(
        '<div id="problemsRow" class="flex space-x-4"><input type="text" class="input-form-1" id="problemsInput" name="problems[' +
            j +
            ']" /><div class="flex space-x-1 items-center"><button type="button" class="remove-field-form">-</button></div></div>'
    );
});

$(document).on("click", ".remove-field-form", function () {
    console.log("Hapus Row");
    $(this).parents("#problemsRow").remove();
});

// Add follow_Up input field
var k = 0;
$("#addFollow_UpBtn").on("click", function (e) {
    // console.log($("#follow_UpField").children().last().find("input").val());
    if ($("#follow_UpField").children().last().find("input").val() === "") {
        console.log("Input Kosong");
        return false;
    }
    // Add itteration
    k++;
    $("#follow_UpField").append(
        '<div id="follow_UpRow" class="flex space-x-4"><input type="text" class="input-form-1" id="follow_UpInput" name="follow_up[' +
            k +
            ']" /><div class="flex space-x-1 items-center"><button type="button" class="remove-field-form">-</button></div></div>'
    );
});

$(document).on("click", ".remove-field-form", function () {
    console.log("Hapus Row");
    $(this).parents("#follow_UpRow").remove();
});

// Add todos input field
var l = 0;
$("#addTodosBtn").on("click", function (e) {
    // console.log($("#todosField").children().last().find("input").val());
    if ($("#todosField").children().last().find("input").val() === "") {
        console.log("Input Kosong");
        return false;
    }
    // Add itteration
    l++;
    $("#todosField").append(
        '<div id="todosRow" class="flex space-x-4"><input type="text" class="input-form-1" id="todosInput" name="todos[' +
            l +
            ']" /><div class="flex space-x-1 items-center"><button type="button" class="remove-field-form">-</button></div></div>'
    );
});

// Remove Todos Row
$(document).on("click", ".remove-field-form", function () {
    console.log("Hapus Row");
    $(this).parents("#todosRow").remove();
});

$("#department_id").on("change", function () {
    var idDepartment = this.value;
    // const formatRupiah = (nominal) => {
    //     return new Intl.NumberFormat("id-ID", {
    //         style: "currency",
    //         currency: "IDR",
    //     }).format(nominal);
    // };

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/app/activities/fetch-budget",
        type: "POST",
        data: {
            department_id: idDepartment,
        },
        dataType: "json",
        success: function (result) {
            $.each(result.budget, function (key, value) {
                console.log(value.budget);
                $("#budget").val(value.budget);
            });
        },
    });
});
