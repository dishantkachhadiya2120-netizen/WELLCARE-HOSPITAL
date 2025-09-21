$(document).ready(function () {
  $('#appointmentForm').submit(function (e) {
    e.preventDefault();

    // Collect form data
    let formData = {};
    $(this).serializeArray().forEach(item => {
      formData[item.name] = item.value;
    });

    // Convert DD-MM-YYYY → YYYY-MM-DD
    if (formData.date) {
      let parts = formData.date.split("-");
      if (parts.length === 3) {
        formData.date = parts[2] + "-" + parts[1] + "-" + parts[0];
      }
    }

    // Convert HH:MM → HH:MM:SS
    if (formData.time && formData.time.length === 5) {
      formData.time += ":00";
    }

    // Determine if it's an edit or new appointment
    let isEdit = formData.appointment_id && formData.appointment_id.trim() !== "";
    let url = isEdit ? 'index.php?page=edit-appointment&id=' + formData.appointment_id : 'index.php?page=book-appointment';
    let type = isEdit ? 'PUT' : 'POST';

    $.ajax({
      url: url,
      type: type,
      data: JSON.stringify(formData),
      contentType: "application/json",
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          $('#appointmentMessage').text(isEdit ? 'Appointment updated!' : 'Appointment booked!').css('color', 'green');
          $('#appointmentForm')[0].reset();
          $('#appointment_id').val(''); // reset hidden id
          loadAppointments(); // refresh table
        } else {
          $('#appointmentMessage').text('Failed: ' + JSON.stringify(response.errors ?? response.message)).css('color', 'red');
        }
      },
      error: function (xhr, status, error) {
        $('#appointmentMessage').text('Error: ' + error).css('color', 'red');
      }
    });
  });

  function loadAppointments() {
    $.ajax({
      url: 'index.php?page=get-appointments',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        if (response.success && response.appointments) {
          let rows = '';
          response.appointments.forEach(appt => {
            let formattedTime = appt.time;
            if (formattedTime && formattedTime.length === 8) {
              let [hh, mm] = formattedTime.split(":");
              let suffix = hh >= 12 ? "PM" : "AM";
              hh = ((hh % 12) || 12);
              formattedTime = hh + ":" + mm + " " + suffix;
            }

            rows += `
              <tr class="border-b border-white/30">
                <td class="py-3 px-4">${appt.doctor}</td>
                <td class="py-3 px-4">${appt.date}</td>
                <td class="py-3 px-4">${formattedTime}</td>
                <td class="py-3 px-4">
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded mr-2 edit-btn" 
                          data-id="${appt.id}" 
                          data-doctor="${appt.doctor}" 
                          data-date="${appt.date}" 
                          data-time="${appt.time}">Edit</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded delete-btn" data-id="${appt.id}">Delete</button>
                </td>
              </tr>
            `;
          });
          $('#appointmentsTable tbody').html(rows);
        } else {
          $('#appointmentsTable tbody').html(`<tr><td colspan="4" class="py-3 px-4 text-center text-red-400">No appointments found</td></tr>`);
        }
      },
      error: function (xhr, status, error) {
        $('#appointmentsTable tbody').html(`<tr><td colspan="4" class="py-3 px-4 text-center text-red-400">Error: ${error}</td></tr>`);
      }
    });
  }

  // Initial load
  loadAppointments();

  $(document).on("click", ".edit-btn", function () {
    let id = $(this).data("id");
    let doctor = $(this).data("doctor");
    let date = $(this).data("date"); // format: DD-MM-YYYY
    let time = $(this).data("time"); // format: HH:MM:SS

    // Pre-fill form fields
    $("#edit_appointment_id").val(id);
    $("#edit_doctor").val(doctor);

    // Convert DD-MM-YYYY → YYYY-MM-DD for input[type=date]
    let parts = date.split("-");
    if (parts.length === 3) {
      $("#edit_date").val(parts[2] + "-" + parts[1] + "-" + parts[0]);
    }

    // Convert HH:MM:SS → HH:MM for input[type=time]
    if (time && time.length >= 5) {
      $("#edit_time").val(time.substring(0, 5));
    }

    // Show modal
    $("#editAppointmentModal").removeClass("hidden");
  });

  // Cancel button closes modal
  $("#cancelEdit").click(function () {
    $("#editAppointmentModal").addClass("hidden");
  });

  // Submit edited appointment
  $("#editAppointmentForm").submit(function (e) {
    e.preventDefault();

    let formData = {
      appointment_id: $("#edit_appointment_id").val(),
      doctor: $("#edit_doctor").val(),
      date: $("#edit_date").val().split("-").reverse().join("-"), // YYYY-MM-DD → DD-MM-YYYY
      time: $("#edit_time").val() + ":00" // HH:MM → HH:MM:SS
    };

    $.ajax({
      url: 'index.php?page=edit-appointment&id=' + formData.appointment_id,
      type: 'PUT',
      data: JSON.stringify(formData),
      contentType: "application/json",
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          alert("Appointment updated successfully!");
          $("#editAppointmentModal").addClass("hidden");
          loadAppointments();
        } else {
          alert("Failed to update: " + JSON.stringify(response.errors ?? response.message));
        }
      },
      error: function (xhr, status, error) {
        alert("Error updating appointment: " + error);
      }
    });
  });
  
  $(document).on("click", ".delete-btn", function () {
    let id = $(this).data("id"); // get ID from button
    if (confirm("Are you sure you want to delete this appointment?")) {
      $.ajax({
        url: 'index.php?page=delete-appointment',
        type: 'DELETE', // or 'DELETE' if you prefer REST style
        data: JSON.stringify({ id: id }), // send JSON
        contentType: "application/json",   // important!
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            alert("Appointment deleted successfully");
            loadAppointments(); // refresh table
          } else {
            alert("Delete failed: " + (response.message ?? "Unknown error"));
          }
        },
        error: function (xhr, status, error) {
          console.error(xhr, status, error);
          alert("Error deleting appointment: " + error);
        }
      });
    }
  });



});
