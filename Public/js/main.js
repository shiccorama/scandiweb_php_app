// display product type form
document.getElementById('productType').addEventListener('change', function () {
    var selectedOption = this.value;

    // Set the value of the hidden input field
    document.getElementById('selectedType').value = selectedOption;

    // Hide all form groups
    var formGroups = document.querySelectorAll('.form-group-choice');
    formGroups.forEach(function (formGroup) {
        formGroup.style.display = 'none';
    });

    // Show the form group for the selected type
    document.getElementById(selectedOption + 'Form').style.display = 'block';
});

// submit button
document.getElementById('saveButton').addEventListener('click', function() {
    document.forms[0].submit();
});


