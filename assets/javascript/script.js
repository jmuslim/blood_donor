$(document).ready(function() {
    // Load donor list on page load
    loadDonors();

// Load donors function
    function loadDonors() {
        $.ajax({
            url: '../../actions/php/get_donors.php',
            type: 'GET',
            success: function(response) {
                $('#donor-list').html(response);
            }
        });
    }

 // Toggle Add Donor Form
    $('#add-donor-btn').click(function() {
        $('#addDonorModal').modal('show');
    });


// Handle form submission for adding a new donor
        $('#add-donor-form').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: '../../actions/php/create_donor.php',
                method: 'POST',
                data: formData,
                // data: $(this).serialize(),
                success: function(response) {
                    alert(response);
                    $('#addDonorModal').modal('hide'); // Hide the modal
                    $('#add-donor-form')[0].reset(); // Reset form fields
                    loadDonors(); // Reload donor list
                },
                error: function() {
                    alert('An error occurred while adding the donor.');
                }
            });
        });


// Edit donor details
$(document).ready(function() {
    $(document).on('click', '.edit-btn', function() {
        // Get the donor id from the data-id attribute
        let donorId = $(this).data('id');
        let row = $(this).closest('tr');

        // fetching donor data from the row
        let fullName = row.find('td:nth-child(1)').text().trim();
        let age = row.find('td:nth-child(2)').text().trim();
        let gender = row.find('td:nth-child(3)').text().trim();
        let bloodGroup = row.find('td:nth-child(4)').text().trim();
        let contact = row.find('td:nth-child(5)').text().trim();
        let email = row.find('td:nth-child(6)').text().trim();
        let lastDonation = row.find('td:nth-child(7)').text().trim();

        // Populate the modal with the donor's data
        $('#editDonorModal #donor-id').val(donorId);
        $('#editDonorModal #full_name').val(fullName);
        $('#editDonorModal #age').val(age);
        $('#editDonorModal #gender').val(gender);
        $('#editDonorModal #blood_group').val(bloodGroup);
        $('#editDonorModal #contact_number').val(contact);
        $('#editDonorModal #email_address').val(email);
        $('#editDonorModal #last_donation_date').val(lastDonation);

        // Show the modal
        $('#editDonorModal').modal('show');
    });
});




// Handle the form submission for updating donor details
$('#edit-donor-form').submit(function(event) {
    event.preventDefault(); 
    let formData = {
        id: $('#editDonorModal #donor-id').val(),
        full_name: $('#editDonorModal #full_name').val(),
        age: $('#editDonorModal #age').val(),
        gender: $('#editDonorModal #gender').val(),
        blood_group: $('#editDonorModal #blood_group').val(),
        contact_number: $('#editDonorModal #contact_number').val(),
        email_address: $('#editDonorModal #email_address').val(),
        last_donation_date: $('#editDonorModal #last_donation_date').val()
    };
    
//  AJAX request to update the donor details
    $.ajax({
        url: '../../actions/php/update.php', // Your PHP update handler
        type: 'POST',
        data: formData, // The form data to be sent
        dataType: 'json', // Expect a JSON response
        success: function(response) {
            if (response.status === 'success') {
                alert('Donor updated successfully!');
                $('#editDonorModal').modal('hide'); // Hide the modal
                
                // Optionally, update the table row with new donor data
                // You could update the table dynamically without reloading the page
                let row = $('tr[data-id="' + formData.id + '"]'); // Find the row based on donor id
                row.find('.donor-fullname').text(formData.full_name);
                row.find('.donor-age').text(formData.age);
                row.find('.donor-gender').text(formData.gender);
                row.find('.donor-bloodgroup').text(formData.blood_group);
                row.find('.donor-contact').text(formData.contact_number);
                row.find('.donor-email').text(formData.email_address);
                row.find('.donor-lastdonation').text(formData.last_donation_date);

            } else {
                alert('Error updating donor.');
            }
        },
        error: function(xhr, status, error) {
            console.log('AJAX error:', status, error);
            alert('An error occurred while updating the donor.');
        }
    });
});


// // Delete donor
//    $(document).on('click', '.delete-btn', function() {
//     let donorId = $(this).data('id');
//     // if (confirm('Are you sure you want to delete this donor?')) {
//         $.ajax({
//             url: '../../actions/php/delete_donor.php',
//             type: 'POST',
//             data: { id: donorId },
//             success: function(response) {
//                 alert(response);
//                 loadDonors(); // Reload donor list
//             }
//         });
//     // }
// });
//      });

// //  Delete Donor Modal
//      $(document).ready(function() {
//         let deleteDonorId = null; // Variable to store the ID of the donor to be deleted
    
//         // Show confirmation modal when delete button is clicked
//         $(document).on('click', '.delete-btn', function() {
//             deleteDonorId = $(this).data('id'); // Get the donor ID from the button
//             $('#confirmDeleteModal').modal('show'); // Show the confirmation modal
//         });
    
//         // Handle the deletion when confirm button is clicked
//         $('#confirm-delete-btn').click(function() {
//             $.ajax({
//                 url: '../../actions/php/delete.php', // Your PHP delete handler
//                 type: 'POST',
//                 data: { id: deleteDonorId }, // Send the donor ID to delete
//                 dataType: 'json',
//                 success: function(response) {
//                     if (response.status === 'success') {
//                         // alert('Donor deleted successfully!');
//                         $('#confirmDeleteModal').modal('hide'); // Hide the confirmation modal
//                         $('tr[data-id="' + deleteDonorId + '"]').remove(); // Remove the donor row from the table
//                     } else {
//                         alert('Error deleting donor.');
//                     }
//                 },
//                 error: function(xhr, status, error) {
//                     console.log('AJAX error:', status, error);
//                     alert('An error occurred while deleting the donor.');
//                 }
//             });
//         });
//     });
    


// $(document).ready(function() {
//     let deleteDonorId = null; // Variable to store the ID of the donor to be deleted

//     // Show confirmation modal when delete button is clicked
//     $(document).on('click', '.delete-btn', function() {
//         deleteDonorId = $(this).data('id'); // Get the donor ID from the button
//         $('#confirmDeleteModal').modal('show'); // Show the confirmation modal
//     });

//     // Handle the deletion when confirm button is clicked
//     $('#confirm-delete-btn').click(function() {
//         $.ajax({
//             url: '../../actions/php/delete_donor.php', // Your PHP delete handler
//             type: 'POST',
//             data: { id: deleteDonorId }, // Send the donor ID to delete
//             dataType: 'json',
//             success: function(response) {
//                 if (response.status === 'success') {
//                     $('#confirmDeleteModal').modal('hide'); // Hide the confirmation modal
//                     $('tr[data-id="' + deleteDonorId + '"]').remove(); // Remove the donor row from the table
//                 } else {
//                     alert('Error deleting donor.');
//                 }
//             },

//             error: function(xhr, status, error) {
//                 console.log('AJAX error:', status, error);
//                 console.log('Response Text:', xhr.responseText); // Output the response from the server
//                 alert('An error occurred while deleting the donor.');
//             }
//         });
//     });
// });
// });

$(document).ready(function() {
    let deleteDonorId = null;

    // Show confirmation modal
    $(document).on('click', '.delete-btn', function() {
        deleteDonorId = $(this).data('id');
        $('#confirmDeleteModal').modal('show');
    });

    // Handle the deletion when confirm button is clicked
    $('#confirm-delete-btn').click(function() {
        $.ajax({
            url: '../../actions/php/delete_donor.php',
            type: 'POST',
            data: { id: deleteDonorId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#confirmDeleteModal').modal('hide');
                    $('tr[data-id="' + deleteDonorId + '"]').remove();
                } else {
                    alert(response.message); // Show the message from the server response
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', status, error);
                console.log('Response Text:', xhr.responseText);
                alert('An error occurred while deleting the donor.');
            }
        });
    });
});
});
