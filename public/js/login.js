// prevent form resubmission on page refresh
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
// form submission
document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault(); // prevent default form submission
    const formData = new FormData(e.target);
    const data = new URLSearchParams(Object.fromEntries(formData));

    fetch(e.target.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: data,
        })
        .then(res => res.json())
        .then(data => {
            if (data.status == 'success') {
                location.reload();
            }

            // when error occurs
            const invalidFeedback = document.querySelectorAll('.invalid-feedback');
            invalidFeedback.forEach((feedback) => {
                feedback.textContent = '';
            });
            
            for (const [key, value] of Object.entries(data.errors)) {
                const input = document.querySelector(`input[name=${key}]`);
                if (!input) {
                    continue;
                }
                const feedback = input.nextElementSibling;
                input.classList.add('is-invalid');
                feedback.textContent = value;
            }
        })
        .catch(err => console.log(err));
});