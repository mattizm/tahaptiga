"use strict";
var KTAuthResetPassword = (function () {
  var t, e, r;
  return {
    init: function () {
      (t = document.querySelector("#kt_password_reset_form")),
        (e = document.querySelector("#kt_password_reset_submit")),
        (r = FormValidation.formValidation(t, {
          fields: {
            email: {
              validators: {
                regexp: {
                  regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                  message:
                    "Masukan alamat email yang valid",
                },
                notEmpty: {
                  message: "Alamat Email wajib di isi",
                },
              },
            },
          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
              rowSelector: ".fv-row",
              eleInvalidClass: "",
              eleValidClass: "",
            }),
          },
        })),
        !(function (t) {
          try {
            return new URL(t), !0;
          } catch (t) {
            return !1;
          }
        })(t.getAttribute("action"))
          ? e.addEventListener("click", function (i) {
            i.preventDefault(),
              r.validate().then(function (r) {
                "Valid" == r
                  ? (e.setAttribute(
                    "data-kt-indicator",
                    "on"
                  ),
                    (e.disabled = !0),
                    setTimeout(function () {
                      e.removeAttribute(
                        "data-kt-indicator"
                      ),
                        (e.disabled = !1),
                        Swal.fire({
                          text: "Kami telah mengirimkan link reset password ke email Anda.",
                          icon: "success",
                          buttonsStyling: !1,
                          confirmButtonText:
                            "Ok, Mengerti!",
                          customClass: {
                            confirmButton:
                              "btn btn-primary",
                          },
                        }).then(function (e) {
                          if (e.isConfirmed) {
                            t.querySelector(
                              '[name="email"]'
                            ).value = "";
                            var r = t.getAttribute(
                              "data-kt-redirect-url"
                            );
                            r &&
                              (location.href = r);
                          }
                        });
                    }, 1500))
                  : Swal.fire({
                    text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                      confirmButton:
                        "btn btn-primary",
                    },
                  });
              });
          })
          : e.addEventListener("click", function (i) {
            i.preventDefault(),
              r.validate().then(function (r) {
                "Valid" == r
                  ? (e.setAttribute(
                    "data-kt-indicator",
                    "on"
                  ),
                    (e.disabled = !0),
                    axios
                      .post(
                        e
                          .closest("form")
                          .getAttribute("action"),
                        new FormData(t)
                      )
                      .then(function (e) {
                        if (e) {
                          t.reset(),
                            Swal.fire({
                              text: "Kami telah mengirimkan link reset password ke email Anda.",
                              icon: "success",
                              buttonsStyling: !1,
                              confirmButtonText:
                                "Ok, Mengerti!",
                              customClass: {
                                confirmButton:
                                  "btn btn-primary",
                              },
                            }).then(function (e) {
                              if (e.isConfirmed) {
                                const e = t.getAttribute("data-kt-redirect-url");
                                e && (location.href = e);
                              }
                            });
                        } else Swal.fire({ text: "Maaf, emailnya salah, silakan coba lagi.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
                      })
                      .catch(function (t) {
                        Swal.fire({
                          text: "Maaf, sepertinya email yang anda masukan salah.",
                          icon: "error",
                          buttonsStyling: !1,
                          confirmButtonText:
                            "Ok, Mengerti!",
                          customClass: {
                            confirmButton:
                              "btn btn-primary",
                          },
                        });
                      })
                      .then(() => {
                        e.removeAttribute(
                          "data-kt-indicator"
                        ),
                          (e.disabled = !1);
                      }))
                  : Swal.fire({
                    text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, Mengerti!",
                    customClass: {
                      confirmButton:
                        "btn btn-primary",
                    },
                  });
              });
          });
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTAuthResetPassword.init();
});
