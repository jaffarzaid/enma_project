// method check if a trainee has chosen either yes or no for health section:
function toggleFileUpload() {
    var injuryStatus = document.querySelector('input[name="stu_injury_status"]:checked');
    var emergencyExit = document.querySelector('input[name="emergency_exit"]:checked');
    var fileUploadField = document.getElementById("file_upload_field");

    // @ts-ignore
    if (injuryStatus && injuryStatus.value === "Yes") {
        // @ts-ignore
        fileUploadField.style.display = "block";
        // @ts-ignore
        document.getElementById("file_upload").setAttribute("required", "required");
        // @ts-ignore
    } else if (emergencyExit && emergencyExit.value === "Yes") {
        // @ts-ignore
        fileUploadField.style.display = "block";
        // @ts-ignore
        document.getElementById("file_upload").removeAttribute("required");
    } else {
        // @ts-ignore
        fileUploadField.style.display = "none";
        // @ts-ignore
        document.getElementById("file_upload").removeAttribute("required");
    }
}


// Allowing to add other sponsorship
document.addEventListener("DOMContentLoaded", (event) => {
    const otherRadio = document.getElementById("sponsership_value_others");
    const otherInput = document.getElementById("sponsership_other_input");

    const sponsorshipRadios = document.querySelectorAll('input[name="sponsorship_name"]');
    
    // Event listener for "Other" radio button
    // @ts-ignore
    otherRadio.addEventListener("change", () => {
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
            otherInput.value = "";
        }
    });

    // Event listener for main sponsorship options
    sponsorshipRadios.forEach(radio => {
        radio.addEventListener("change", () => {
            // @ts-ignore
            if (!otherRadio.checked) {
                // @ts-ignore
                otherInput.disabled = true;
                // @ts-ignore
                otherInput.value = "";
            }
        });
    });

    // Initialize state based on initial radio button state
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
        otherInput.value = "";
    }
});
// End of Allowing to add other sponsorship

// Hiding radio button of Tamkeen when nationality is not Bahraini:
function toggleTamkeen() {
    // @ts-ignore
    var nationality = document.getElementById("nationality").value;
    var tamkeenRadio = document.getElementById("sponsorship_value_tmk");

    if (nationality != "Bahraini") {
        // @ts-ignore
        tamkeenRadio.disabled = true;
    } else {
        // @ts-ignore
        tamkeenRadio.disabled = false;
    }
}

// Disable Tamkeen option when a trainee selects preparatory course for registration: 
document.addEventListener('DOMContentLoaded', function() {
    // @ts-ignore
    var nationality = document.getElementById("nationality").value;
    const preparatoryCourseRadio = document.getElementById('preparatory_course');
    const tamkeenRadio = document.getElementById('sponsorship_value_tmk');
    const trainingServiceTypeRadios = document.getElementsByName('training_service_type');

    function updateTamkeenAvailability() {
        // @ts-ignore
        var nationality = document.getElementById("nationality").value; // Update nationality value
        
        // Check if preparatory course radio is checked
        // @ts-ignore
        var preparatoryCourseChecked = preparatoryCourseRadio.checked;

        // Check if any training service type radio is checked
        var anyTrainingServiceTypeChecked = false;
        trainingServiceTypeRadios.forEach(function(radio) {
            // @ts-ignore
            if (radio.checked) {
                anyTrainingServiceTypeChecked = true;
            }
        });

        // Update tamkeen radio availability based on conditions
        if (nationality !== 'Bahraini' || preparatoryCourseChecked || !anyTrainingServiceTypeChecked) {
            // @ts-ignore
            tamkeenRadio.disabled = true;
            // @ts-ignore
            tamkeenRadio.checked = false; 
        } else {
            // @ts-ignore
            tamkeenRadio.disabled = false;
        }
    }

    // Add event listeners to all training service type radio buttons
    trainingServiceTypeRadios.forEach(function(radio) {
        radio.addEventListener('change', updateTamkeenAvailability);
    });

    // Initial check in case a radio button is pre-selected
    updateTamkeenAvailability();
});



