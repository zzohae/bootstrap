
        function showInput(inputId, checkboxesId) {
            document.getElementById('delivery').classList.add('d-none');
            document.getElementById('b2b').classList.add('d-none');
            document.getElementById('inputCheckboxes').classList.add('d-none');
            document.getElementById(inputId).classList.remove('d-none');
            if (inputId === 'b2b') {
                document.getElementById(checkboxesId).classList.remove('d-none');
            }
        }

        function toggleOtherInput() {
            const otherInput = document.getElementById('otherInput');
            otherInput.classList.toggle('d-none', !document.getElementById('app-others').checked);
        }
