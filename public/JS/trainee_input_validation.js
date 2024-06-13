// method check if a trainee has chosen either yes or no for health section: 
function toggleFileUpload() {
    var injuryStatus = document.querySelector(
        'input[name="stu_injury_status"]:checked'
    );
    var emergencyExit = document.querySelector(
        'input[name="emergency_exit"]:checked'
    );
    var fileUploadField = document.getElementById("file_upload_field");

    if (
        // @ts-ignore
        (injuryStatus && injuryStatus.value === "Yes") ||
        // @ts-ignore
        (emergencyExit && emergencyExit.value === "Yes")
    ) {
        // Display file upload field
        // @ts-ignore
        fileUploadField.style.display = "block";
    } else {
        // Hide file upload field
        // @ts-ignore
        fileUploadField.style.display = "none";
    }
}


// Allowing to add other sponsorship 
document.addEventListener('DOMContentLoaded', (event) => {
    const otherRadio = document.getElementById('sponsership_value_others');
    const otherInput = document.getElementById('sponsership_other_input');

    const radioButtons = document.querySelectorAll('input[name="sponsorship_name"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', () => {

            // @ts-ignore
            if (otherRadio.checked) {

                // @ts-ignore
                otherInput.disabled = false;
                // @ts-ignore
                otherInput.focus();
            } else {
                // @ts-ignore
                otherInput.disabled = true;
                // @ts-ignore
                otherInput.value = '';
            }
        });
    });
});
// End of Allowing to add other sponsorship 

