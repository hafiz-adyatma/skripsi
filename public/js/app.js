$(document).ready(function () {
    var $sidebarToggle = $("#sidebarToggle");
    var $sidebar = $("#sidebar");
    var $closeSidebar = $("#closeSidebar");

    $sidebarToggle.on("click", function () {
        $sidebar.toggleClass("d-none");
    });

    $closeSidebar.on("click", function () {
        $sidebar.addClass("d-none");
    });

    var $mainNavbar = $("#mainNavbar");

    if ($mainNavbar.hasClass("bg-transparent")) {
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 50) {
                $mainNavbar.removeClass("bg-transparent");
                $mainNavbar.css("background-color", "#F79009");
                $mainNavbar.addClass("scrolled");
            } else {
                $mainNavbar.addClass("bg-transparent");
                $mainNavbar.css("background-color", "transparent");
                $mainNavbar.removeClass("scrolled");
            }
        });
    }

    // $("#checkout-button").on("click", function () {
    //     const $form = $("#shipping-form");
    //     const $checkoutForm = $("#checkout-form");
    //     let isValid = true;
    //     $form.find("input[required]").each(function () {
    //         if (!$(this).val()) {
    //             isValid = false;
    //             $(this).addClass("is-invalid");
    //         } else {
    //             $(this).removeClass("is-invalid");
    //         }
    //     });

    //     if (!isValid) {
    //         alert("Please fill out all required fields.");
    //         return;
    //     }

    //     const formData = $form.serializeArray();
    //     $.each(formData, function (i, field) {
    //         $("<input>")
    //             .attr({
    //                 type: "hidden",
    //                 name: field.name,
    //                 value: field.value,
    //             })
    //             .appendTo($checkoutForm);
    //     });

    //     $checkoutForm.submit();
    // });

    var owl = $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        items: 1,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 3,
            },
        },
    });
    $("#prevButton").on("click", function () {
        owl.trigger("prev.owl.carousel");
    });

    $("#nextButton").on("click", function () {
        owl.trigger("next.owl.carousel");
    });
});

$(document).ready(function () {
    $("#decrease-quantity").click(function () {
        var quantityInput = $("#quantity");
        var currentValue = parseInt(quantityInput.val());

        if (currentValue > 1) {
            quantityInput.val(currentValue - 1);
        }
    });
    $("#increase-quantity").click(function () {
        var quantityInput = $("#quantity");
        var currentValue = parseInt(quantityInput.val());

        quantityInput.val(currentValue + 1);
    });
});

$("#buy-now").click(function () {
    var product = {
        id: $('input[name="id"]').val(),
        name: $('input[name="name"]').val(),
        price: $('input[name="price"]').val(),
        photo: $('input[name="photo"]').val(),
        color: $('input[name="color"]').val(),
        size: $('input[name="size"]:checked').val(),
        quantity: $("#quantity").val(),
    };

    $.ajax({
        url: "/cart/buy",
        method: "POST",
        data: product,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response.status === "success") {
                window.location.href = "/checkout";
            } else {
                alert("Failed to add product to cart");
            }
        },
        error: function (xhr, status, error) {
            alert("An error occurred: " + error);
        },
    });
});

$("#add-cart").on("click", function () {
    var needsSize = $("#cart-form").data("needs-size") === "true";
    var sizeSelected = $('input[name="size"]:checked');

    if (needsSize && sizeSelected.length === 0) {
        Swal.fire({
            icon: "error",
            title: "Ukuran Belum Dipilih",
            text: "Silakan pilih ukuran sebelum menambahkan ke keranjang.",
            showConfirmButton: true,
        });
    } else {
        Swal.fire({
            icon: "success",
            title: "Sukses",
            text: "Barang berhasil ditambahkan kedalam keranjang",
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $("#cart-form").submit();
            }
        });
    }
});

$("#formContact").submit(function (e) {
    e.preventDefault();

    const name = $("#name").val();
    const email = $("#email").val();
    const message = $("#message").val();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!name) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: "Mohon isi nama terlebih dahulu!",
            showConfirmButton: true,
        });
        $("#name").focus();
        return;
    }

    if (!email) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: "Mohon isi email terlebih dahulu!",
            showConfirmButton: true,
        });
        $("#email").focus();
        return;
    }

    if (!emailRegex.test(email)) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: "Format email tidak valid!",
            showConfirmButton: true,
        });
        return;
    }

    if (!message) {
        Swal.fire({
            icon: "error",
            title: "Gagal",
            text: "Mohon isi pesan terlebih dahulu!",
            showConfirmButton: true,
        });
        $("#message").focus();
        return;
    }

    let formData = $(this).serialize();

    $.ajax({
        url: "{{ url('api/contact') }}",
        type: "POST",
        data: formData,
        beforeSend: function () {
            $("#btnSubmit").attr("disabled", true);
            $("#btnSubmit").text("Mohon tunggu...");
        },
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.message,
                    showConfirmButton: true,
                });
                window.location.href = "/contact-us";
            }
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert("Send message failed: " + xhr.responseText);
        },
    });
});

$(document).ready(function () {
    const sizeButtons = $(".size-btn");

    sizeButtons.on("click", function () {
        console.log("Click");
        sizeButtons.removeClass("size-btn-selected");
        $(this).addClass("size-btn-selected");
    });
});

const cities = {
    "Jawa Barat": ["Bandung", "Bekasi", "Bogor"],
    "Jawa Tengah": ["Semarang", "Solo", "Yogyakarta"],
    "Jawa Timur": ["Surabaya", "Malang", "Kediri"],
};

$("#province").change(function () {
    const province = $(this).val();
    const citySelect = $("#city");

    citySelect.html('<option value="" disabled selected>Pilih Kota</option>');

    if (province in cities) {
        cities[province].forEach((city) => {
            const option = $("<option>").val(city).text(city);
            citySelect.append(option);
        });
    }
});

// $("#checkout-button").click(function (e) {
//     e.preventDefault();
//     const name = $("#name").val();
//     const phone = $("#phone").val();
//     const address = $("#address").val();
//     const province = $("#province").val();
//     const city = $("#city").val();
//     const postal_code = $("#postal_code").val();

//     if (!name || !phone || !address || !province || !city || !postal_code) {
//         Swal.fire({
//             icon: "error",
//             title: "Error",
//             text: "Semua kolom wajib diisi kecuali catatan.",
//         });
//         return false;
//     } else {
//         Swal.fire({
//             icon: "success",
//             title: "Success",
//             text: "Form berhasil diisi.",
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 $("#checkout-form").submit();
//             }
//         });
//     }
// });

$("#checkout-button").on("click", function (e) {
    e.preventDefault();

    const $form = $("#shipping-form");
    const $checkoutForm = $("#checkout-form");
    let isValid = true;

    $form.find("input[required]").each(function () {
        if (!$(this).val()) {
            isValid = false;
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }
    });

    const name = $("#name").val();
    const phone = $("#phone").val();
    const address = $("#address").val();
    const province = $("#province").val();
    const city = $("#city").val();
    const postal_code = $("#postal_code").val();

    if (
        !isValid ||
        !name ||
        !phone ||
        !address ||
        !province ||
        !city ||
        !postal_code
    ) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Semua kolom wajib diisi kecuali catatan.",
        });
        return false;
    } else {
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Form berhasil diisi.",
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = $form.serializeArray();
                $.each(formData, function (i, field) {
                    $("<input>")
                        .attr({
                            type: "hidden",
                            name: field.name,
                            value: field.value,
                        })
                        .appendTo($checkoutForm);
                });

                $checkoutForm.submit();
            }
        });
    }
});

$.ajax({
    url: "/api/provinces",
    method: "GET",
    success: function (data) {
        data.forEach(function (province) {
            $("#province").append(
                `<option value="${province.id}">${province.province_name}</option>`
            );
        });
    },
});

$("#province").on("change", function () {
    const provinceId = $(this).val();

    $("#city")
        .empty()
        .append('<option value="" disabled selected>Pilih Kota</option>'); // Clear previous cities

    $.ajax({
        url: `/api/cities/${provinceId}`,
        method: "GET",
        success: function (data) {
            data.forEach(function (city) {
                $("#city").append(
                    `<option value="${city.id}">${city.city_name}</option>`
                );
            });
        },
    });
});

$(".province").selectpicker();
