/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
(function ($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);



function dangnhap() {
    var u = document.getElementById("username").value;
    var p = document.getElementById("password").value;

    if (u === "") {
        alert("Bạn chưa điền tài khoản");
        return false;
    }
    if (p === "") {
        alert("Bạn chưa điền mật khẩu");
        return false;
    }

    alert("Chào mừng !");
    return true;
}

function dathang() {
    var hvt = document.getElementById("hovaten").value;
    var sdt = document.getElementById("sdt").value;
    var e = document.getElementById("email").value;
    var dc = document.getElementById("diachi").value;

    if (hvt === "") {
        alert("Vui lòng nhập họ và tên");
        return false;
    }
    if (sdt === "") {
        alert("Vui lòng nhập số điện thoại");
        return false;
    }
    if (e === "") {
        alert("Vui lòng nhập email");
        return false;
    }
    if (dc === "") {
        alert("Vui lòng nhập địa chỉ");
        return false;
    }
    alert("Đặt hàng thành công bạn sẽ được liên hệ để xác minh đơn hàng");
    return true;
}

function xoa() {
    var id = document.getElementById("id").value;
    var xoa1 = confirm('Bạn có muốn xóa ' + id);
    if (xoa1 === true) {
        alert("Xóa thành công");
        return true;
    } else {
        alert("Hủy xóa");
        return false;
    }
}

function donhang() {
    var soluong = document.getElementById("soluong").value;

    if (soluong > 10) {
        alert("Chỉ đặt số lượng dưới 10");
        return false;
    }
    if (soluong < 1) {
        alert("Đặt số lượng ít nhất 1");
        return false;
    }

    return true;
}

