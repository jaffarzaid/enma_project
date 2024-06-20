document.addEventListener('DOMContentLoaded', function() {
    const preparatoryCourseRadio = document.getElementById('preparatory_course');
    const tamkeenRadio = document.getElementById('sponsorship_value_tmk');
    const trainingServiceTypeRadios = document.getElementsByName('training_service_type');

    function updateTamkeenAvailability() {
        // @ts-ignore
        if (preparatoryCourseRadio.checked) {
            // @ts-ignore
            tamkeenRadio.disabled = true;
            // @ts-ignore
            tamkeenRadio.checked = false; // Uncheck if it was checked
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