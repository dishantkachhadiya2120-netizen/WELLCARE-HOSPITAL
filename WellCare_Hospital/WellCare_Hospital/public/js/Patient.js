function getProfile() {
    $.ajax({
        url: "index.php?page=patient-profile", // ✅ API endpoint
        method: "GET",
        xhrFields: { withCredentials: true },
        dataType: "json",
        success: function (data) {
            if (data.status) {
                $("#full_name").val(data.user.full_name || "");
                $("#email").val(data.user.email || "");
                $("#phone").val(data.user.phone || "");
                $("#dob").val(data.user.dob || "");
                $("#age").val(data.user.age || "");
                const gender = (data.user.gender || "").toLowerCase().trim();
                $("#gender").val(gender);
            } else {
                alert("Failed: " + data.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            alert("Error fetching profile");
        }
    });
}


// Call the function when page loads
$(document).ready(function () {
    getProfile();
});

function toggleEditMode(editing) {
    const inputs = document.querySelectorAll(".profile-input");
    const editBtn = document.getElementById("editBtn");
    const actionBtns = document.getElementById("actionBtns");

    inputs.forEach(input => {
        input.readOnly = !editing;
        input.classList.toggle("bg-gray-200", !editing);
        input.classList.toggle("bg-white", editing);
    });

    editBtn.classList.toggle("hidden", editing);
    actionBtns.classList.toggle("hidden", !editing);
}

function saveProfile(event) {
    event.preventDefault();

    // Collect form data
    const fullName = document.getElementById("full_name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const dob = document.getElementById("dob").value;
    const age = document.getElementById("age").value;
    const gender = document.getElementById("gender").value;

    // AJAX call to update-profile API
    $.ajax({
        url: "index.php?page=update-profile",  // ✅ API endpoint
        method: "POST",
        data: {
            full_name: fullName,
            email: email,
            phone: phone,
            dob: dob,
            age: age,
            gender: gender
        },
        xhrFields: { withCredentials: true },
        dataType: "json",
        success: function (data) {
            if (data.status) {
                alert("✅ Profile updated successfully!");
                toggleEditMode(false);
                getProfile(); // Refresh form with latest data
            } else {
                alert("❌ Failed to update: " + data.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            alert("⚠️ Error updating profile");
        }
    });
}

function cancelEdit(event) {
    event.preventDefault();
    toggleEditMode(false);
}