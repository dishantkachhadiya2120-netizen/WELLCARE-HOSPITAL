// public/js/auth.js
$(document).ready(function () {

  // ================== REGISTER ==================
  $("#registerForm").on("submit", function (e) {
    e.preventDefault();
    const form = this;

    const formData = {
      full_name: $(form).find("[name='full_name']").val().trim(),
      email: $(form).find("[name='email']").val().trim(),
      phone: $(form).find("[name='phone']").val().trim(),
      dob: $(form).find("[name='dob']").val(),
      age: $(form).find("[name='age']").val(),
      gender: $(form).find("[name='gender']").val(),
      password: $(form).find("[name='password']").val().trim(),
      confirm_password: $(form).find("[name='confirm_password']").val().trim()
    };

    // Basic validations
    if (!formData.full_name || !formData.email || !formData.phone || !formData.dob ||
      !formData.age || !formData.gender || !formData.password || !formData.confirm_password) {
      showMessage(form, "error", "Please fill in all required fields.");
      return;
    }

    if (formData.password !== formData.confirm_password) {
      showMessage(form, "error", "Passwords do not match.");
      return;
    }

    $.ajax({
      url: "index.php?page=register",
      type: "POST",
      data: JSON.stringify(formData),
      contentType: "application/json",
      processData: false,
      dataType: "json",
      success: function (response) {
        console.log("Register Response:", response);

        if (response.status) {
          showMessage(form, "success", response.message || "Registration successful!");
          $(form).find(".error-message").remove();
          form.reset();

          // ✅ Save user to sessionStorage
          const sessionData = {
            user_type: response.user.user_type,
            token: response.token,
          };
          sessionStorage.setItem("user", JSON.stringify(sessionData));

          if (window.location.href === "index.php?page=patient_dashboard") {
            updateNavbar(); // ✅ update navbar immediately  
          }

          setTimeout(() => {
            // Redirect directly to patient dashboard
            window.location.href = "index.php?page=patient_dashboard";
          }, 1500);
        } else {
          showMessage(form, "error", response.message || "Registration failed.");
          if (response.errors) showFieldErrors(form, response.errors);
        }
      },
      error: function () {
        showMessage(form, "error", "Something went wrong during registration.");
      }
    });
  });

  // ================== LOGIN ==================
  // $("#loginForm").on("submit", function (e) {
  //   e.preventDefault();
  //   const form = this;

  //   const formData = {
  //     email: $("#email").val().trim(),
  //     password: $("#password").val().trim(),
  //     user_type: $("#user_type").val()
  //   };

  //   if (!formData.user_type) {
  //     showMessage(form, "error", "Please select a user type.");
  //     return;
  //   }

  //   $.ajax({
  //     url: "index.php?page=login",
  //     type: "POST",
  //     data: JSON.stringify(formData),
  //     contentType: "application/json",
  //     processData: false,
  //     dataType: "json",
  //     success: function (response) {
  //       console.log("Login AJAX Success:", response);

  //       try {
  //         if (response.status) {
  //           showMessage(form, "success", response.message);
  //           $(form).find(".error-message").remove();

  //           // ✅ Store session details on frontend
  //           const sessionData = {
  //             user_type: response.user.user_type,
  //             token: response.token,
  //           };

  //           sessionStorage.setItem("user", JSON.stringify(sessionData));

  //           setTimeout(() => {
  //             switch (response.user.user_type) {
  //               case "patient":
  //                 window.location.href = "index.php?page=patient_dashboard";
  //                 break;
  //               case "doctor":
  //                 window.location.href = "index.php?page=doctor_dashboard";
  //                 break;
  //               case "admin":
  //                 window.location.href = "index.php?page=admin_dashboard";
  //                 break;
  //               default:
  //                 showMessage(form, "error", "Unknown user type");
  //             }
  //           }, 1000);
  //           if (window.location.href === "index.php?page=patient_dashboard") {
  //             updateNavbar(); // ✅ update navbar immediately  
  //           }

  //         } else {
  //           showMessage(form, "error", response.message || "Login failed.");
  //           if (response.errors) showFieldErrors(form, response.errors);
  //         }
  //       } catch (err) {
  //         console.error("Login Parse Error:", err);
  //         showMessage(form, "error", "Invalid response from server.");
  //       }
  //     },
  //     error: function () {
  //       showMessage(form, "error", "Something went wrong during login.");
  //     }
  //   });
  // });
  $("#loginForm").on("submit", function (e) {
    e.preventDefault();
    const form = this;

    const formData = {
      email: $("#email").val().trim(),
      password: $("#password").val().trim(),
      user_type: $("#user_type").val()
    };

    if (!formData.user_type) {
      showMessage(form, "error", "Please select a user type.");
      return;
    }

    // 🔹 Decide API endpoint based on user_type
    let apiUrl = "index.php?page=login"; // default
    if (formData.user_type === "doctor") {
      apiUrl = "index.php?page=doctor-login";
    }

    $.ajax({
      url: apiUrl,
      type: "POST",
      data: JSON.stringify(formData),
      contentType: "application/json",
      processData: false,
      dataType: "json",
      success: function (response) {
        console.log("Login AJAX Success:", response);

        try {
          if (response.success || response.status) { // doctor returns "success", patient/admin maybe "status"
            showMessage(form, "success", response.message || "Login successful");
            $(form).find(".error-message").remove();

            // ✅ Store session details on frontend
            const sessionData = {
              user_type: response.user?.user_type || formData.user_type,
              token: response.token,
            };
            sessionStorage.setItem("user", JSON.stringify(sessionData));

            setTimeout(() => {
              switch (sessionData.user_type) {
                case "patient":
                  window.location.href = "index.php?page=patient_dashboard";
                  break;
                case "doctor":
                  window.location.href = "index.php?page=doctor";
                  break;
                case "admin":
                  window.location.href = "index.php?page=admin_dashboard";
                  break;
                default:
                  showMessage(form, "error", "Unknown user type");
              }
            }, 1000);

            if (window.location.href === "index.php?page=patient_dashboard") {
              updateNavbar(); // ✅ update navbar immediately  
            }

          } else {
            showMessage(form, "error", response.message || "Login failed.");
            if (response.errors) showFieldErrors(form, response.errors);
          }
        } catch (err) {
          console.error("Login Parse Error:", err);
          showMessage(form, "error", "Invalid response from server.");
        }
      },
      error: function () {
        showMessage(form, "error", "Something went wrong during login.");
      }
    });
  });

  // ================== HELPER FUNCTIONS ==================
  function showMessage(form, type, message) {
    let msgBox = $(form).find(".form-message");
    if (!msgBox.length) {
      msgBox = $('<div class="form-message mt-2 text-sm"></div>');
      $(form).prepend(msgBox);
    }
    msgBox.removeClass("text-green-600 text-red-600")
      .addClass(type === "success" ? "text-green-600" : "text-red-600")
      .text(message);
  }

  function showFieldErrors(form, errors) {
    $(form).find(".error-message").remove();
    for (const field in errors) {
      const input = $(form).find(`[name="${field}"]`);
      input.after(`<div class="error-message text-red-600 text-sm">${errors[field]}</div>`);
    }
  }

  // ✅ NAVBAR HANDLER
  function updateNavbar() {
    const user = JSON.parse(sessionStorage.getItem("user"));

    // Hide all sections first
    $("#guestLinks, #patientLinks, #doctorLinks, #adminLinks").addClass("hidden");

    if (!user) {
      // Guest
      $("#guestLinks").removeClass("hidden");
    } else {
      switch (user.user_type) {
        case "patient":
          $("#patientLinks").removeClass("hidden");
          break;
        case "doctor":
          $("#doctorLinks").removeClass("hidden");
          break;
        case "admin":
          $("#adminLinks").removeClass("hidden");
          break;
        default:
          $("#guestLinks").removeClass("hidden");
      }
    }
  }

  // ✅ Logout button
  $(document).on("click", "#logoutBtn", function (e) {
    e.preventDefault();
    sessionStorage.clear(); // clear frontend session
    updateNavbar();
    window.location.href = "index.php?page=home";
  });

  // ✅ Call once on page load (important!)
  updateNavbar();



});